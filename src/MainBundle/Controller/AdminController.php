<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /**
     * 
     * @Template
     */
    public function userviewAction(){
        $repo = $this->getDoctrine()->getRepository('MainBundle:User');
        $rows = $repo->findAll();
        return array(
            'rows' => $rows
        );
    }
    /**
     * 
     * @Template
     */
    public function detailsAction($id){
        $repo = $this->getDoctrine()->getRepository('MainBundle:User');
        $rows = $repo->findBy(array(
            'id' => $id
        ));  
        
        if($rows == null){
            throw $this->createNotFoundException('Nie znaleziono użytkownika o podanym id');
            
        }
        
        return array(
            'rows' => $rows
        );
    }
}
