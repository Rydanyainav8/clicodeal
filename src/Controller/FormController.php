<?php

namespace App\Controller;

use App\Entity\Partenaire;
use Doctrine\Persistence\ObjectManager;

use App\Form\RegistrationPartenaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FormController extends AbstractController
{
    /**
     * @Route("/inscription", name="form_registration")
     */
    // public function registration(Request $request, ObjectManager $manager)
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $encoder)
    {
        $partenaire = new Partenaire();
        $form = $this->createForm(RegistrationPartenaireType::class, $partenaire);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->hashPassword($partenaire, $partenaire->getPassword());
            $partenaire->setPassword($hash);

            $manager->persist($partenaire);
            $manager->flush();
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
    // public function createPartenaire(Request $request)
    // {
    //     $partenaire = new Partenaire();
    //     $partenaire->setDate(new \DateTime('now'));

    //     $form = $this->createFormBuilder($partenaire)
    //         ->add('Partenaire_username')
    //         ->add('Email')
    //         ->add('password')
    //         ->add('Confirm_Password')
    //         ->add('submit', 'submit', array('label' => 'Crée'))
    //         ->getForm();

    //     $form->handleRequest($request);

    //     if ($request->isMethod('post') && $form->isValid()) {
    //         $manag = $this->getDoctrine()->getManager();
    //         $manag->persist($form->getData());
    //         $manag->flush();
    //     }
    //     return $this->render('security/registration.html.twig', ['form' => $form->createView()]);
    // }
}
