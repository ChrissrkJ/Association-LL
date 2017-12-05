<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/family")
 */
class FamilyController extends Controller
{
    /**
     * @Route("/index", name="family_list")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Family:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/add" ,name="family_add")
     */
    public function addAction()
    {
        return $this->render('AppBundle:Family:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete", name="delete")
     */
    public function deleteAction()
    {
        return $this->render('AppBundle:Family:delete.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/update",name="family_update")
     */
    public function updateAction()
    {
        return $this->render('AppBundle:Family:update.html.twig', array(
            // ...
        ));
    }

}
