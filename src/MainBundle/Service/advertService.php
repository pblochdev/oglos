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
        
        $qb = $this->em->createQueryBuilder(); 
        $adverts = $this->em->getRepository('MainBundle:Advert') 
                ->findBy(array(), array('id' => 'DESC'), 10, 0);
        $qb->add('select','a.id, a.title')
          ->add('from','MainBundle:Advert a')
          ->add('orderBy','a.id DESC')      
          ->setMaxResults(10); 
               
        $query = $this->em->createQuery($qb);
        $res = $query->getResult();
        return $adverts;
    }
}
