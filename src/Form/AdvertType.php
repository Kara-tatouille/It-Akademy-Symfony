<?php

namespace App\Form;

use App\Entity\Advert;
use App\Service\AdvertHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertType extends AbstractType
{
    private $advertHelper;

    public function __construct(AdvertHelper $advertHelper)
    {
        $this->advertHelper = $advertHelper;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('price', MoneyType::class, [
                'divisor' => 100,
                'grouping' => true,
                'required' => false,
                'mapped' => false,
            ])
            ->add('advertKind')

            ->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
                /** @var Advert $advert */
                $advert = $event->getData();
                $price = $event->getForm()['price']->getData();

                $this->advertHelper->setPriceAccordingToKind($advert, $price);
            })

            ->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
                /** @var Form $priceForm */
                $priceForm = $event->getForm()['price'];
                $priceForm->setData($this->advertHelper->getPriceAccordingToKind($event->getData()));
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Advert::class,
        ]);
    }
}
