<?php

namespace AppBundle\Form;

use AppBundle\Entity\Club;
use AppBundle\Repository\ClubRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    /**
     * @var ClubRepository
     */
    private $clubRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->clubRepository = $entityManager->getRepository('AppBundle:Club');
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $comboClubs = $this->getClubComboChoices();

        $builder
            ->add('name')
            ->add(
                'club',
                EntityType::class,
                [
                    'class' => Club::class,
                    'choices' => $comboClubs,
                    'choice_label' => 'name'
                ]
            );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Player'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_player';
    }

    /**
     * @return array
     */
    public function getClubComboChoices()
    {

        $clubs = $this->clubRepository->findAll();

        /**
         * @todo check some parameters I guess
         */

        return $clubs;
    }


}
