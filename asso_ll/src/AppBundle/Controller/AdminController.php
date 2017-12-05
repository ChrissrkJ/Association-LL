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
use AppBundle\Entity\Admin;
use AppBundle\Entity\Volunteer;
/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/index", name="indexAdmin")
     */
    public function indexAction()
    {


        return $this->render('AppBundle:Admin:index.html.twig', array(

        ));
    }

    /**
     * @Route("/menuAdmin", name="menuAdmin")
     */
    public function menuAdminAction()
    {
        return $this->render('AppBundle:Admin:menu.html.twig', array(

        ));
    }


    /**
     * @Route("/list", name="admin_list")
     */
    public function listAction ()
    {
      $admins = $this->getDoctrine()
      ->getRepository(Admin::class)
      ->findAll();

      return $this->render('AppBundle:Admin:list.html.twig', array(
          'admins' => $admins
      ));
    }


    /**
     * @Route("/add", name="admin_add" )
     */
    public function addAction(Request $r)
    {
        $admin = new Admin();

        $form = $this->createFormBuilder($admin)
          ->add('firstname', TextType::class )
          ->add('lastname', TextType::class)
          ->add('mail', TextType::class)
          ->add('phoneNumber',TextType::class)
          ->add('password',PasswordType::class )
          ->add('avatar', FileType::class)
          ->add('submit', SubmitType::class, array(
            'label' => 'Enregistrer'
          ))
          ->getForm();

        $form->handleRequest($r);

        if ($form->isSubmitted() && $form->isValid()){

          $admin = $form->getData();

          $file = $admin->getAvatar();
          $fileName = 'admin_'.$file->getClientOriginalName().'.'.$file->guessExtension();
          $file->move($this->getParameter('dir_admin'), $fileName);
          $admin->setAvatar($fileName);

          $em = $this->getDoctrine()->getManager();
          $em->persist($admin);
          $em->flush();

          return $this->redirectToRoute('admin_list');
        }

        return $this->render('AppBundle:Admin:add.html.twig', array(
            'form' =>$form->createView()
        ));
    }

    /**
     * @Route("/update/{id}", name="admin_update")
     */
    public function updateAction(Request $r, $id)
    {
      $admin = $this->getDoctrine()
      ->getRepository(Admin::class)
      ->find($id);

      $form = $this->createFormBuilder($admin)
        ->add('firstname', TextType::class )
        ->add('lastname', TextType::class)
        ->add('mail', TextType::class)
        ->add('phoneNumber',TextType::class)
        ->add('password',PasswordType::class )
        //->add('avatar', FileType::class)
        ->add('submit', SubmitType::class, array(
          'label' => 'Enregistrer'
        ))
        ->getForm();

      $form->handleRequest($r);

      if ($form->isSubmitted() && $form->isValid()){

        $admin = $form->getData();

        // $file = $admin->getAvatar();
        // $fileName = 'admin_'.$file->getClientOriginalName().'.'.$file->guessExtension();
        // $file->move($this->getParameter('dir_admin'), $fileName);
        // $admin->setAvatar($fileName);

        $em = $this->getDoctrine()->getManager();
        $em->persist($admin);
        $em->flush();

        return $this->redirectToRoute('admin_list');
      }

      return $this->render('AppBundle:Admin:update.html.twig', array(
          'form' => $form->createView()
      ));
    }

    /**
     * @Route("/delete/{id}", name="admin_delete")
     */
    public function deleteAction($id)
    {
      $admin = $this->getDoctrine()
      ->getRepository(Admin::class)
      ->find($id);

      $em = $this->getDoctrine()->getManager();
      $em->remove($admin);
      $em->flush();

        return $this->redirectToRoute('AppBundle:Admin:list.html.twig');
    }

    /**
     * @Route("/signIn",name="signInAdmin")
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

        return $this->render('AppBundle:Admin:sign_in.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
