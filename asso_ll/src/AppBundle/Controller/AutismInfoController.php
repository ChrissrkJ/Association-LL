<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Articles;

class AutismInfoController extends Controller
{
    /**
     * @Route("/index", name="index_autismInfo")
     */
    public function indexAction()
    {
      $articles = $this->getDoctrine()
      ->getRepository(Articles::class)
      ->findAll();

        return $this->render('AppBundle:AutismInfo:index.html.twig', array(
            'articles' => $articles
        ));
    }

}
