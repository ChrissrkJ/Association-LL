<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class QsnController extends Controller
{
    /**
     * @Route("/qsn", name="index_qsn")
     */
    public function qsnAction()
    {
        return $this->render('AppBundle:Qsn:qsn.html.twig', array(
            // ...
        ));
    }

}
