<?php
/**
 * Copyright 2024-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 24/02/2025, 18:14
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    AbstractContactFormType.php
 * @date    27/11/2024
 * @time    19:03
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Model\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\NoSuspiciousCharacters;

abstract class AbstractContactFormType extends AbstractType
{
	public function buildForm (FormBuilderInterface $builder, array $options): void
	{
		$builder
			->add('name', TextType::class, [
				'label'       => 'form.contact.name',
				'constraints' => [
					new NoSuspiciousCharacters(),
				],
			])
			->add('lastName', TextType::class, [
					'label'       => 'form.contact.last_name',
					'constraints' => [
						new NoSuspiciousCharacters(),
					],
				]
			)
			->add('email', EmailType::class, [
				'label'    => 'form.contact.email.label',
				'help'     => 'form.contact.email.help',
				'required' => false,
			])
			->add('comment', TextareaType::class, ['label' => 'form.contact.comment',])
			->add('consent', CheckboxType::class, [
				'label'       => 'form.contact.consent',
				'constraints' => [
					new IsTrue(),
				],
			])
			->add('buttonSubmit', SubmitType::class, ['label' => 'form.contact.button.submit'])
		;
	}

	public function configureOptions (OptionsResolver $resolver): void
	{
		$resolver->setDefaults([
			'translation_domain' => 'IdmCommonBundle',
		]);
	}
}
