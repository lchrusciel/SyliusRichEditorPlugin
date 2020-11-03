<?php

/*
 * This file is part of Monsieur Biz' Rich Editor plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusRichEditorPlugin\Form\Type\UiElement;

use MonsieurBiz\SyliusRichEditorPlugin\Form\Constraints\RichEditorConstraints;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType as FormTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @deprecated
 */
class DoubleImageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_image', FileType::class, [
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.double_image.field.first_image',
                'data_class' => null, // @TODO check to have the File original data class, and remove this line
                'required' => true,
                'constraints' => RichEditorConstraints::getImageConstraints($options['data'] ?? null, 'image'),
                'attr' => ['data-image' => 'true'],
            ])
            ->add('first_alt', FormTextType::class, [
                'required' => true,
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.double_image.field.first_alt',
                'constraints' => [
                    new Assert\NotBlank([]),
                ],
            ])
            ->add('first_title', FormTextType::class, [
                'required' => true,
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.double_image.field.first_title',
                'constraints' => [
                    new Assert\NotBlank([]),
                ],
            ])
            ->add('first_link', FormTextType::class, [
                'required' => false,
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.double_image.field.first_link',
                'constraints' => [
                    new Assert\Url([]),
                ],
            ])
            ->add('second_image', FileType::class, [
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.double_image.field.second_image',
                'data_class' => null, // @TODO check to have the File original data class, and remove this line
                'required' => true,
                'constraints' => RichEditorConstraints::getImageConstraints($options['data'] ?? null, 'image'),
                'attr' => ['data-image' => 'true'],
            ])
            ->add('second_alt', FormTextType::class, [
                'required' => true,
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.double_image.field.second_alt',
                'constraints' => [
                    new Assert\NotBlank([]),
                ],
            ])
            ->add('second_title', FormTextType::class, [
                'required' => true,
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.double_image.field.second_title',
                'constraints' => [
                    new Assert\NotBlank([]),
                ],
            ])
            ->add('second_link', FormTextType::class, [
                'required' => false,
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.double_image.field.second_link',
                'constraints' => [
                    new Assert\Url([]),
                ],
            ])
        ;
    }
}
