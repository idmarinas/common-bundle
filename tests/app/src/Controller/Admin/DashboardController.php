<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 09/01/2026, 19:45
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

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Override;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
final class DashboardController extends AbstractDashboardController
{
	#[Override]
	public function index (): Response
	{
		return $this->render('pages/dashboard.html.twig');
	}

	public function configureDashboard (): Dashboard
	{
		return Dashboard::new()
			->setTitle('Html')
		;
	}

	#[Override]
	public function configureActions (): Actions
	{
		return parent::configureActions()->add(Crud::PAGE_INDEX, Action::DETAIL);
	}

	public function configureMenuItems (): iterable
	{
		yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
		yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);
	}
}
