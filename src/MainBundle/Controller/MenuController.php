<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{
    
    /**
     * 
     * @Template
     */
    public function indexAction()
    {
        return array();
    }
    /**
     * 
     * @Template
     */
    public function registerAction(Request $request)
    {
        $preData = array(
            //'name' => 'Imię',
            //'country'=>'PL',
            //'sex'=>'k'
            
        );
        $form = $this->createFormBuilder($preData)
                ->add('name','text',array(
                    'label'=>'Imię'
                ))
                ->add('forename','text',array(
                    'label'=>'Nazwisko'
                ))
                ->add('email','email',array(
                    'label'=>'Email'
                ))
                ->add('sex','choice',array(
                    'attr' => array('class'=>'checkbox'),
                    
                    'expanded' =>true,
                    'choices' =>array(
                        'm' => 'Mężczyzna',
                        'k' => 'Kobieta'
                    )
                    
                ))
                ->add('born','birthday',array(
                    'label'=>'Data urodzenia'
                    ))
                
                ->add('woj','choice',
                        array(
                            'choices'=>array(
                                'dolnośląskie',
                                'kujawsko-pomorskie',
                                'lubelskie',
                                'lubuskie',
                                'łódzkie',
                                'małopolskie',
                                'mazowieckie',
                                'opolskie',
                                'podkarpackie',
                                'podlaskie',
                                'pomorskie',
                                'śląskie',
                                'świętokrzyskie',
                                'warmińsko-mazurskie',
                                'wielkopolskie',
                                'zachodniopomorskie'
                            ),
                            'label'=>'Województwo'
                        ))
                ->add('city','text',array(
                    'label'=>'Miasto'
                    ))
                ->add('kategoria','choice',
                        array(
                            'choices'=>array(
                                'i'=> 'informatyka',
                                'm'=> 'matematyka'
                            )
                        ))
                ->add('rules','checkbox', array(
                    'label'=>'Akceptuje regulamin'
                ))
                ->add('Potwierdź','submit')
                ->getForm();
        
        $form ->handleRequest($request);
        if($form->isValid()){
            $formData = $form->getData();
        }
        
        return array(
            'form' => $form->createView(),
            'formData'=> isset($formData) ?$formData:NULL,
        );
    }
    /**
     * 
     * 
     * @Template
     */
    public function aboutAction(){
        return array();
    }
}

