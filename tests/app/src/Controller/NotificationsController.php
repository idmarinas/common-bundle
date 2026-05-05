<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 18:49
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    NotificationsController.php
 * @date    05/05/2026
 * @time    18:02
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

namespace App\Controller;

use Idm\Bundle\Common\Traits\Controller\NotificationsTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NotificationsController extends AbstractController
{
	use NotificationsTrait;

	#[Route('/notifications', name: 'app_notifications')]
	public function index(): Response
	{
		$this->addNotification('error', 'This is an error message');
		$this->addNotification('success', 'This is a success message');
		$this->addNotification('warning', 'This is a warning message');

		return $this->render('pages/notifications/index.html.twig', [
			'controller_name' => 'NotificationsController',
		]);
	}
}
