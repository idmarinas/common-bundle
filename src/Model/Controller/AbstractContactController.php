<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 23/01/2025, 16:12
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    AbstractContactController.php
 * @date    22/01/2025
 * @time    18:59
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Idm\Bundle\Common\Model\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use function Symfony\Component\Translation\t;

abstract class AbstractContactController extends AbstractController
{
	#[Route(path: '/contact', name: 'contact', methods: ['GET', 'POST'])]
	public function index (Request $request, EntityManagerInterface $entityManager): Response
	{
		$form = $this->getContactForm();
		$formEmpty = clone $form;
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$entity = $form->getData();

			$entityManager->persist($entity);
			$entityManager->flush();

			$this->addFlash('success', t('flash.contact.success', [], 'IdmCommonBundle'));

			$form = $formEmpty;
		}

		return $this->render('@IdmCommon/contact/index.html.twig', [
			'form' => $form,
		]);
	}

	/**
	 * Create a Contact form.
	 */
	abstract protected function getContactForm (): FormInterface;
}
