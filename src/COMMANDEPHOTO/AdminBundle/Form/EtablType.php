<?php
namespace COMMANDEPHOTO\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EtablType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom',TextType::class)
            ->add('uai',TextType::class)
            ->add('nomresponsable',TextType::class)
            ->add('prenomresponsable',TextType::class)
            ->add('login',TextType::class)
            ->add('password',TextType::class)
            ->add('adresse', TextareaType::class)
            ->add('cp',TextType::class)
            ->add('ville',TextType::class)
            ->add('save',SubmitType::class, array('label' => 'Enregistrer'))
            // ->add('categories')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COMMANDEPHOTO\AdminBundle\Entity\Etablissement'
        ));
    }
}