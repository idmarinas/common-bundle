<?php
/**
 * Copyright $originalComment.match("Copyright (\d+)", 1, "-",$today.year)2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 04/05/2026, 24:05
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    NotificationsBag.php
 * @date    04/05/2026
 * @time    24:05
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

namespace Idm\Bundle\Common\Bag;

use Override;

final class NotificationsBag implements NotificationsBagInterface
{
	private string $name = 'notifications';

	private array $notifications = [];

	public function __construct(private readonly string $storageKey = '_fas_notifications') {}

	public function getName(): string
	{
		return $this->name;
	}

	#[Override]
	public function add(string $type, mixed $message): void
	{
		$this->notifications[$type][] = $message;
	}

	#[Override]
	public function set(string $type, array|string $messages): void
	{
		$this->notifications[$type] = (array)$messages;
	}

	#[Override]
	public function peek(string $type, array $default = []): array
	{
		return $this->has($type) ? $this->notifications[$type] : $default;
	}

	#[Override]
	public function peekAll(): array
	{
		return $this->notifications;
	}

	#[Override]
	public function get(string $type, array $default = []): array
	{
		if (!$this->has($type)) {
			return $default;
		}

		$get = $this->notifications[$type];
		unset($this->notifications[$type]);

		return $get;
	}

	#[Override]
	public function all(): array
	{
		$all = $this->peekAll();
		$this->notifications = [];

		return $all;
	}

	#[Override]
	public function setAll(array $messages): void
	{
		$this->notifications = $messages;
	}

	#[Override]
	public function has(string $type): bool
	{
		return array_key_exists($type, $this->notifications) && $this->notifications[$type];
	}

	#[Override]
	public function keys(): array
	{
		return array_keys($this->notifications);
	}

	#[Override]
	public function initialize(array &$array): void
	{
		$this->notifications = &$array;
	}

	#[Override]
	public function getStorageKey(): string
	{
		return $this->storageKey;
	}

	#[Override]
	public function clear(): mixed
	{
		return $this->all();
	}
}
