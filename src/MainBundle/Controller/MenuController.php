<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints  as Assert;
use MainBundle\Entity\User;

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
        $session = $this->get('session');
        
        $user = new User();
        
        if(true){
            
            $form = $this->createFormBuilder($user)
                    ->add('name','text',array(
                        'label'=>'Imię',
                        'constraints' => array(
                            new Assert\NotBlank()),

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
                    ->add('rule','checkbox', array(
                        'label'=>'Akceptuje regulamin',
                        'constraints' => array(
                            new Assert\NotBlank()
                        ),

                    ))
                    ->add('Potwierdź','submit')
                    ->getForm();
             $form ->handleRequest($request);
            if($request->isMethod('POST')){

            if($form->isValid()){
                $session->GetFlashBag()->add('success', 'Rejestracja przebiegła poprawnie!');
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $session->set('register',true);
                return $this->redirect($this->generateUrl('register'));
                
            }else{
                $session->GetFlashBag()->add('danger', 'Proszę uzupełnić wymagane pola');
            }
        }
        }
        
        return array(
             'form' => isset($form) ? $form->createView() : NULL,
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

