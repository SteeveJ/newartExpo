<?php
/**
 * Created by PhpStorm.
 * User: Steeve Jerent
 * Date: 08/03/2015
 * Time: 14:31
 */

namespace AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Validator\Constraint\UserPassword as OldUserPassword;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (class_exists('Symfony\Component\Security\Core\Validator\Constraints\UserPassword')) {
            $constraint = new UserPassword();
        } else {
            // Symfony 2.1 support with the old constraint class
            $constraint = new OldUserPassword();
        }
        // add your custom field
        $builder
            ->add('blaze',null,[
                'label'=> 'votre Nom d\'artiste :',
            ])
            ->add('biography', 'textarea',[
                'attr' => [
                    'class' => 'ckeditor form-control',
                ],
                'label'=> 'Votre Biographie :',
            ])
            ->add('imageFile', 'file')
            ->add('twitter', null,[
                'label'=> 'Votre lien Twitter :',
            ])
            ->add('facebook', null, [
                'label'=> 'Votre lien Facebook :',
            ])
            ->add('instagram', null,[
                'label'=> 'Votre lien Instagram :',
            ])
            ->add('current_password', 'password', array(
                'label' => 'form.current_password',
                'translation_domain' => 'FOSUserBundle',
                'mapped' => false,
                'constraints' => $constraint,
            ));
    }


    public function getParent()
    {
        return 'fos_user_profile';
    }

    public function getName()
    {
        return 'admin_user_profile';
    }
}