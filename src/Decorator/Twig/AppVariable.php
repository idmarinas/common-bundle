<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 14:09
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    AppVariable.php
 * @date    04/05/2026
 * @time    24:06
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

namespace Idm\Bundle\Common\Decorator\Twig;

use Idm\Bundle\Common\Bag\NotificationsBagInterface;
use RuntimeException;
use Symfony\Bridge\Twig\AppVariable as AppVariableBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use function is_string;

final readonly class AppVariable
{
	public function __construct(private AppVariableBase $inner) {}

	public function getNotifications(string|array|null $types = null): array
	{
		try {
			$session = $this->getSession();
		} catch (RuntimeException) {
			return [];
		}

		/** @var NotificationsBagInterface $notifications */
		$notifications = $session->getBag('notifications');

		if (null === $types || '' === $types || [] === $types) {
			return $notifications->all();
		}

		if (is_string($types)) {
			return $notifications->get($types);
		}

		$result = [];
		foreach ($types as $type) {
			$result[$type] = $notifications->get($type);
		}

		return $result;
	}

	public function getSession(): ?SessionInterface
	{
		return $this->inner->getSession();
	}

	public function getToken(): ?TokenInterface
	{
		return $this->inner->getToken();
	}

	public function getUser(): ?UserInterface
	{
		return $this->inner->getUser();
	}

	public function getRequest(): ?Request
	{
		return $this->inner->getRequest();
	}

	public function getEnvironment(): string
	{
		return $this->inner->getEnvironment();
	}

	public function getDebug(): bool
	{
		return $this->inner->getDebug();
	}

	public function getLocale(): string
	{
		return $this->inner->getLocale();
	}

	public function getEnabled_locales(): array
	{
		return $this->inner->getEnabled_locales();
	}

	public function getFlashes(string|array|null $types = null): array
	{
		return $this->inner->getFlashes($types);
	}

	public function getCurrent_route(): ?string
	{
		return $this->inner->getCurrent_route();
	}

	public function getCurrent_route_parameters(): array
	{
		return $this->inner->getCurrent_route_parameters();
	}
}
