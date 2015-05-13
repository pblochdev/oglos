<?php


namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Padam87\SearchBundle;
use Padam87\SearchBundle\Filter\Filter;
use MainBundle\Entity\Advert;
use Symfony\Component\HttpFoundation\Request;


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
    /**
     * @Template 
     */
    public function searchAction(){
        $request = Request::createFromGlobals();
        $key='a';
        if($request->getMethod()=='GET'){
            $key = $request->query->get('key');
            $state = $request->query->get('state');
            print_r($state);
        }

        $em = $this->getDoctrine()->getManager();
        $results = 'asd';
        if($state=='-1'){
            $q = "SELECT a.id, a.title FROM MainBundle:Advert a WHERE a.title like '%".$key."%'";
        }else{
            
            $q = "SELECT a.id, a.title FROM MainBundle:Advert a WHERE a.title like '%".$key."%' AND a.state like '".$state."'";
            print_r($q);
            
        }
        $query = $em->createQuery($q);
        $res = $query->getResult();
        return array(
            'results' => $res
        );
    }
}
