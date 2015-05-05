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
        }
//        $results = 'asd';
//        $repo = $this->getDoctrine()->getRepository('MainBundle:Advert');
//        $search_key =  $key;
//        $results = $repo->findBy(array(
//            'title' => $search_key
//            ));
        $em = $this->getDoctrine()->getManager();
        $results = 'asd';
        $q = "SELECT a.id, a.title FROM MainBundle:Advert a WHERE a.title like '%".$key."%'";
        $query = $em->createQuery($q);
        $res = $query->getResult();
        return array(
            'results' => $res
        );
    }
}
