<?php

namespace App\Form;

use App\Entity\Faq;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class FaqEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', TextType::class, [
                'label' => 'Question',
                'constraints' => new Assert\NotBlank(),
            ])
            ->add('answer', CKEditorType::class, [
                'label' => 'Réponse',
                'constraints' => new Assert\NotBlank(),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Faq::class,
            'attr' => ['novalidate' => 'novalidate'],
        ]);
    }
}
