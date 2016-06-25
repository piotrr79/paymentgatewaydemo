<?php

namespace Websolutio\PaymentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$current_year = date('Y');
        $date_range = range($current_year, $current_year+10);   
            
        $builder
            ->add('name', null, array('required' => true, 'label' => 'First Name','attr' => array('placeholder' => 'Holder Name')))
            ->add('surname', null, array('required' => true, 'label' => 'Last Name','attr' => array('placeholder' => 'Holder Last Name')))
            ->add('ammount', 'number', array('required' => true, 'label' => 'Ammount','attr' => array('placeholder' => 'Ammount')))
            ->add('currency', 'choice', array('choices'   => array(
                     'EUR' => 'EUR', 
                     'USD' => 'USD',
                     'GBP' => 'GBP'),
                     'multiple' => false,
                     'expanded' => false,
                     'required' => true,
                     'label' => 'Currency'      
                ))
            ->add('cardnumber', 'number', array('required' => true, 'label' => 'Credit Card Number','attr' => array('placeholder' => 'Credit Card Number')))
            ->add('cardtype', 'choice', array('choices'   => array('Visa' => 'Visa', 
                     'MasterCard' => 'MasterCard',
                     'Discover' => 'Discover',
                     'Amex' => 'Amex'),
                     'multiple' => false,
                     'expanded' => false,
                     'required' => true,
                     'label' => 'Card Type'          
                ))
            ->add('expirationmonth', 'choice', array('choices'   => array(
                     '1' => 'January',
					 '2' => 'February',
					 '3' => 'March',
					 '4' => 'April',
					 '5' => 'May',
					 '6' => 'June',
					 '7' => 'July',
					 '8' => 'Agust',
					 '9' => 'September',
					 '10' => 'October',
					 '11' => 'November',
					 '12' => 'December'),
                     'multiple' => false,
                     'expanded' => false,
                     'required' => true,
                     'label' => 'Expiration Month'             
                ))
             
            ->add('expirationyear', 'choice', array('choices'   => array_combine($date_range, $date_range), 'required' => true, 'label' => 'Expiration Year'))
            // Add non-entity field to payment form ('mapped' => false). Cvv should not be rather stored in database for legal reasons.
            ->add('cvv', 'number', array('mapped' => false, 'required' => true, 'label' => 'Cvv','attr' => array('placeholder' => 'Cvv')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Websolutio\PaymentBundle\Entity\Payment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'websolutio_paymentbundle_payment';
    }
}
