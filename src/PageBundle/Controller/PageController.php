<?php

namespace PageBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends Controller
{

    /**
     * @Route("/page")
     */
    public function listAction() {
        return new Response("this");
    }

    /**
     * @Route("/view/{id}")
     */
    public function viewAction($id) {
        return new Response("view");
    }
}