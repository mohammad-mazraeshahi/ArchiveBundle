<?php

namespace AppBundle\Form;

use AppBundle\Entity\DocumentAttachment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentAttachmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

           ->add('attachments',FileType::class, array(
                'required'   => false,
                'data_class' => null,
                'label'      => false,
            ))
           ->add('name', TextType::class)
           ->add('file', FileType::class)
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => DocumentAttachment::class,
        ));
    }
}