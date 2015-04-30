<?php

namespace MainBundle\Service;


class advertService extends \Twig_Extension{
    
    protected $em;
    
    public function __construct($_em) {
       $this->em = $_em;
    }


    public function getName() {
        return 'adverts';
    }
    
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('getAdverts', array($this, 'getLastAdverts'))
        );
    } 
   
    public function getLastAdverts(){
        return $this->em->getRepository('MainBundle:Advert')->findAll();
    }
}
