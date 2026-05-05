<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 14:06
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    SessionFactory.php
 * @date    04/05/2026
 * @time    24:06
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

namespace Idm\Bundle\Common\Decorator\Session;

use Idm\Bundle\Common\Bag\NotificationsBag;
use Symfony\Component\HttpFoundation\Session\SessionFactory as SessionFactoryBase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

final readonly class SessionFactory
{
	public function __construct(private SessionFactoryBase $inner) {}

	public function createSession(): SessionInterface
	{
		$session = $this->inner->createSession();
		$session->registerBag(new NotificationsBag());

		return $session;
	}
}
