<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/01/2025, 20:49
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    DashboardController.php
 * @date    27/01/2025
 * @time    20:57
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
	#[Route('/admin', name: 'dashboard')]
	public function index (): Response
	{
		return $this->render('@IdmCommon/dashboard.html.twig');
	}

	public function configureDashboard (): Dashboard
	{
		return Dashboard::new()
			->setTitle('Html')
		;
	}

	public function configureMenuItems (): iterable
	{
		yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
//		yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);
	}
}
