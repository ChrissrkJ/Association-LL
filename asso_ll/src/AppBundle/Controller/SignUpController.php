<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SignUpController extends Controller
{
    /**
     * @Route("/signUp", name="user_signUp")
     */
    public function signUpAction()
    {
        return $this->render('AppBundle:SignUp:sign_up.html.twig', array(
            // ...
        ));
    }

}
