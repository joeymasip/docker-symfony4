<?php
/**
 * Created by PhpStorm.
 * User: Geoffrey Lopez
 * Date: 10/12/2018
 * Time: 23:47
 */

namespace App\Controller;

use App\Form\Handler\UserHandler;
use App\Form\Type\RegisterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(UserHandler $formHandler, Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $form = $this->createForm(RegisterType::class);
        if($formHandler->handle($form, $request, $encoder)){
            return $this->redirectToRoute('list');
        }

        return $this->render("security/register.html.twig", ['form' => $form->createView()]);
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login (AuthenticationUtils $authenticationUtils) : Response
    {
        return $this->render('security/login.html.twig', [
           'error' => $authenticationUtils->getLastAuthenticationError(),
           'last_username' => $authenticationUtils->getLastUsername()
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout() : void
    {

    }
}