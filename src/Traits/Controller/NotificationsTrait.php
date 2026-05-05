<?php
/**
 * Copyright $originalComment.match("Copyright (\d+)", 1, "-",$today.year)2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 04/05/2026, 20:54
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
use LogicException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Exception\SessionNotFoundException;
use Symfony\Component\HttpFoundation\Session\FlashBagAwareSessionInterface;
use function sprintf;

/**
 * @property ContainerInterface $container
 */
trait NotificationsTrait
{

	protected function addNotification(string $type, mixed $message): void
	{
		try {
			$session = $this->container->get('request_stack')->getSession();
		} catch (SessionNotFoundException $e) {
			throw new LogicException(
				'You cannot use the addFlash method if sessions are disabled. Enable them in "config/packages/framework.yaml".',
				0, $e
			);
		}

		if (!$session instanceof FlashBagAwareSessionInterface) {
			throw new LogicException(
				sprintf(
					'You cannot use the addFlash method because class "%s" doesn\'t implement "%s".',
					get_debug_type($session),
					FlashBagAwareSessionInterface::class
				)
			);
		}

		/** @var NotificationsBag $notification */
		$notification = $session->getBag('notifications');

		$notification->add($type, $message);
	}
}
