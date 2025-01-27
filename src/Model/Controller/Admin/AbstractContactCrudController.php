<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/01/2025, 17:42
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    AbstractContactCrudController.php
 * @date    27/01/2025
 * @time    16:49
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Idm\Bundle\Common\Model\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\Option\SearchMode;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use function Symfony\Component\Translation\t;

abstract class AbstractContactCrudController extends AbstractCrudController
{
	public function configureFields (string $pageName): iterable
	{
		$t = fn($message) => t($message, [], 'IdmCommonBundle');

		yield IdField::new('id', $t('admin.crud.contact.id'))
			->onlyOnDetail()
		;

		yield TextField::new('name', $t('admin.crud.contact.name'));
		yield TextField::new('lastName', $t('admin.crud.contact.last_name'));
		yield TextField::new('email', $t('admin.crud.contact.email'));

		yield TextareaField::new('comment', $t('admin.crud.contact.comment'))
			->onlyOnDetail()
		;
		yield BooleanField::new('consent', $t('admin.crud.contact.consent'))
			->renderAsSwitch(false)
		;

		yield DateTimeField::new('createdAt', $t('admin.crud.contact.created_at'));
		yield DateTimeField::new('updatedAt', $t('admin.crud.contact.updated_at'))
			->onlyOnDetail()
		;
	}

	public function configureActions (Actions $actions): Actions
	{
		return parent::configureActions($actions)
			->disable(Action::EDIT, Action::NEW)
		;
	}

	public function configureCrud (Crud $crud): Crud
	{
		$t = fn($message) => t($message, [], 'IdmCommonBundle');

		return parent::configureCrud($crud)
			->setEntityLabelInSingular($t('admin.label.contact.singular'))
			->setEntityLabelInPlural($t('admin.label.contact.plural'))
			->setSearchFields(['name', 'lastName', 'email'])
			->setSearchMode(SearchMode::ANY_TERMS)
			->setDefaultSort(['createdAt' => 'ASC'])
		;
	}

	public function configureFilters (Filters $filters): Filters
	{
		return parent::configureFilters($filters)
			->add('name')
			->add('lastName')
			->add('email')
			->add('consent')
		;
	}
}
