<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 18:48
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    NotificationsTrait.php
 * @date    04/05/2026
 * @time    12:35
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

namespace Idm\Bundle\Common\Traits\Controller;

use Idm\Bundle\Common\Bag\NotificationsBag;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @property ContainerInterface $container
 */
trait NotificationsTrait
{

	protected function addNotification(string $type, mixed $message): void
	{
		$session = $this->container->get('request_stack')->getSession();

		/** @var NotificationsBag $notification */
		$notification = $session->getBag('notifications');

		$notification->add($type, $message);
	}
}
