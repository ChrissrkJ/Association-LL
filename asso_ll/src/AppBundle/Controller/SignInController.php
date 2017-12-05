<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\AbstractType;


class SignInController extends Controller
{
    /**
     * @Route("/signIn", name="user_signIn")
     */
    public function signInAction(Request $r)
    {
      $form = $this->createFormBuilder()
        ->add('email', EmailType::class)
        ->add('password', PasswordType::class)
        ->add('submit',SubmitType::class,array(
          'label' => 'connexion'
        ))
        ->getForm();

        $form->handleRequest($r);
        return $this->render('AppBundle:SignIn:sign_in.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
