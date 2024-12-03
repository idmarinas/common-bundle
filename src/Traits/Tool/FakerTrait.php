<?php
/**
 * Copyright 2023-2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/11/24, 13:38
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

	public function populateEntity (object $entity): object
	{
		$reflectionClass = new ReflectionClass($entity);
		$properties = $reflectionClass->getProperties();

		foreach ($properties as $property) {
			$property->setAccessible(true);
			$property->setValue($entity, $this->fakerValueFromProperty($property));
		}

		return $entity;
	}

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

	private function fakerValueForType (ReflectionProperty $property): mixed
	{
		$attribute = $property->getAttributes(Column::class)[0];
		$arguments = $attribute->getArguments();

		return match ($arguments['type']) {
			'text'                 => $this->faker()->text(),
			'integer'              => $this->faker()->randomNumber(327539810),
			'smallint'             => $this->faker()->randomNumber(32760),
			'datetime',
			'datetime_immutable',
			'datetimetz',
			'datetimetz_immutable' => $this->faker()->dateTime(),
			'json', 'array'        => $this->faker()->words(),
			'simple_array'         => implode(',', $this->faker()->words()),
			'decimal'              => $this->faker()->randomFloat(2),
			'uuid'                 => new Uuid($this->faker()->uuid()),
			'date',
			'date_inmutable'       => $this->faker()->date(),
			'time',
			'time_immutable'       => $this->faker()->time(),
			'string'               => $this->faker()->text($arguments['length'] * 0.9),
			default                => $this->faker()->sentence()
		};
	}
}
