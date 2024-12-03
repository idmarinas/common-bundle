<?php
/**
 * Copyright 2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 1/12/24, 21:51
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    AbstractContact.php
 * @date    27/11/2024
 * @time    19:00
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\MappedSuperclass]
abstract class AbstractContact
{
	use UuidTrait;
	use TimestampableEntity;

	// -- Contact name.
	#[ORM\Column(type: Types::STRING, length: 255)]
	#[Assert\NotBlank]
	#[Assert\Length(min: 3, max: 255)]
	protected ?string $name = null;

	// -- Surname of contact.
	#[ORM\Column(type: Types::STRING, length: 255)]
	#[Assert\NotBlank]
	#[Assert\Length(min: 3, max: 255)]
	protected ?string $lastName = null;

	// -- Contact email.
	#[ORM\Column(type: Types::STRING, length: 150)]
	#[Assert\Email]
	protected ?string $email = null;

	// -- Comments/Questions.
	#[ORM\Column(type: Types::TEXT)]
	#[Assert\Length(min: 50, max: 65535)]
	protected string $comment = '';

	#[ORM\Column(type: Types::BOOLEAN)]
	protected bool $consent = false;

	public function getName (): ?string
	{
		return $this->name;
	}

	public function setName (string $name): static
	{
		$this->name = $name;

		return $this;
	}

	public function getLastName (): ?string
	{
		return $this->lastName;
	}

	public function setLastName (string $lastName): static
	{
		$this->lastName = $lastName;

		return $this;
	}

	public function getEmail (): ?string
	{
		return $this->email;
	}

	public function setEmail (string $email): static
	{
		$this->email = $email;

		return $this;
	}

	public function getComment (): string
	{
		return $this->comment;
	}

	public function setComment (string $comment): static
	{
		$this->comment = $comment;

		return $this;
	}

	public function isConsent (): bool
	{
		return $this->consent;
	}

	public function setConsent (bool $consent): static
	{
		$this->consent = $consent;

		return $this;
	}
}
