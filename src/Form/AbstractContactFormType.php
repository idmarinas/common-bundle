<?php
/**
 * Copyright 2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 20/12/23, 12:53
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContactFormType.php
 * @date    27/11/2024
 * @time    19:03
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Form;

use Idm\Bundle\Common\Entity\AbstractContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractContactFormType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'contact.name',
            ])->add('lastName', TextType::class, [
                'label' => 'contact.last_name',
            ])->add('email', EmailType::class, ['label' => 'contact.email'])->add('comment', TextareaType::class, [
                'label' => 'contact.comment',
            ])->add('consent', CheckboxType::class, ['label' => 'contact.consent'])->add(
                'buttonSubmit', SubmitType::class, ['label' => 'contact.button.submit']
            )
        ;
    }

    public function configureOptions (OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'         => AbstractContact::class,
            'translation_domain' => 'form_contact',
        ]);
    }
}
