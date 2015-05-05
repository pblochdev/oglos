<?php


namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Padam87\SearchBundle;
use Padam87\SearchBundle\Filter\Filter;
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
    /**
     * @Template 
     */
    public function searchAction($key){
        $advert = new Advert();
        $fm = $this->get('padam87_search.filter.manager');
        $data = array(
            'stringFiled' => '%'.$key.'%'
        );
        $filter = new Filter($data, 'MainBundle:Advert', 'title');
        $qb = $fm->createQueryBuilder($filter);
        return array(
            'results' => $qb
        );
    }
}
