<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use AppBundle\Dictionary\SaleDictionary;

class SaleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateAdd', DateTimeType::class, [
                'placeholder' => [
                    'year' => SaleDictionary::YEAR,
                    'month' => SaleDictionary::MONTH,
                    'day' => SaleDictionary::DAY,
                    'hour' => SaleDictionary::HOUR
                ],
                'with_minutes' => false,
                'label' => 'Wybierz datę: '
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Wysłane' => SaleDictionary::SENT,
                    'Anulowane' => SaleDictionary::CANCELLED,
                ],
                'label' => 'Status zamówienia: '
            ])
            ->add('file', FileType::class, [
            'label'  => 'Dane do importu: ',
            ])
        ;
    }


}