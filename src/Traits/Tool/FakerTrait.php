<?php
/**
 * Copyright 2023-2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/12/2024, 14:19
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    FakerTrait.php
 * @date    13/04/2023
 * @time    16:35
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.5.0
 */

namespace Idm\Bundle\Common\Traits\Tool;

use Doctrine\ORM\Mapping\Column;
use Faker\Factory;
use Faker\Generator;
use LogicException;
use ReflectionClass;
use ReflectionException;
use ReflectionProperty;
use Symfony\Component\Uid\Uuid;

trait FakerTrait
{
	private ?Generator $faker = null;

	public function faker (): Generator
	{
		if (!class_exists(Factory::class)) {
			throw new LogicException('Faker PHP missing. Try running "composer require --dev fakerphp/faker".');
		}

		if (!$this->faker instanceof Generator) {
			$this->faker = Factory::create();
		}

		return $this->faker;
	}

	/**
	 * @throws ReflectionException
	 */
	public function populateEntity (object $entity): object
	{
		$reflectionClass = new ReflectionClass($entity);
		$properties = $reflectionClass->getProperties();

		foreach ($properties as $property) {
			$value = $this->fakerValueFromProperty($property);
			if ($value !== 'continue') {
				$property->setValue($entity, $value);
			}
		}

		return $entity;
	}

	/**
	 * @throws ReflectionException
	 */
	private function fakerValueFromProperty (ReflectionProperty $property): mixed
	{
		return match ($property->getName()) {
			'email'       => $this->faker()->email(),
			'name',
			'displayName' => $this->faker()->name(),
			'lastName'    => $this->faker()->lastName(),
			'password'    => $this->faker()->password(),
			'username'    => $this->faker()->userName(),
			'sessionId'   => $this->faker()->sha1(),
			default       => $this->fakerValueForType($property),
		};
	}

	/**
	 * @throws ReflectionException
	 */
	private function fakerValueForType (ReflectionProperty $property): mixed
	{
		$attribute = $property->getAttributes(Column::class)[0] ?? null;
		$arguments = $attribute?->getArguments();

		$type = $arguments['type'] ?? $property->getType()?->getName() ?: $property->getName();
		$length = ($arguments['length'] ?? 10) - 0.9;

		// Check if is a namespace
		if (str_contains($type, '\\')) {
			$ref = new ReflectionClass($type);
			$type = $ref->isAbstract() ? 'continue' : 'object';
			$object = $ref->isAbstract() ?: $ref->newInstance();
		}

		return match ($type) {
			'text'                 => $this->faker()->text(),
			'integer'              => $this->faker()->randomNumber(9),
			'smallint'             => $this->faker()->randomNumber(4),
			'datetime',
			'datetime_immutable',
			'datetimetz',
			'datetimetz_immutable' => $this->faker()->dateTime(),
			'json', 'array'        => $this->faker()->words(),
			'simple_array'         => implode(',', $this->faker()->words()),
			'decimal'              => $this->faker()->randomFloat(2, 0, 30),
			'uuid'                 => new Uuid($this->faker()->uuid()),
			'date',
			'date_inmutable'       => $this->faker()->date(),
			'time',
			'time_immutable'       => $this->faker()->time(),
			'string'               => $this->faker()->text($length),
			'createdFromIp',
			'updatedFromIp'        => $this->faker()->ipv4(),
			'continue'             => 'continue',
			'object'               => $this->populateEntity($object),
			default                => $this->faker()->sentence()
		};
	}
}
