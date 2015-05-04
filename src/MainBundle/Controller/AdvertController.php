<?php


namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints  as Assert;
use MainBundle\Entity\User;
use MainBundle\Entity\Advert;


class AdvertController extends Controller{
    
    /**
     * @Template
     */
    public function advertDetailsAction($id){
        $repo = $this->getDoctrine()->getRepository('MainBundle:Advert');
        $adverts = $repo->findBy(array(
            'id' => $id
        ));
        return array(
            'advert' => $adverts
        );
    }
}
