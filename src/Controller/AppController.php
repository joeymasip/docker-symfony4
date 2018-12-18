<?php
/**
 * Created by PhpStorm.
 * User: Geoffrey Lopez
 * Date: 11/12/2018
 * Time: 00:09
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    /**
     * @Route("/list", name="list")
     */
    public function list(): Response
    {
        return $this->render('list.html.twig');
    }

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }
}