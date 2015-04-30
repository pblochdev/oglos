<?php

namespace MainBundle\Service;
use Doctrine\ORM\EntityManager;

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
            'get_last_adverts' => new \Twig_Function_Method($this, 'getLastAdverts')
        );
    }
    
    public function getLastAdverts(){
        return $this->em->getRepository('MainBundle:Advert')->findAll();
        
    }
}
