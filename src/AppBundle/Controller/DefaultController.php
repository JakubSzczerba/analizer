<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\SaleType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/form", name="homepage")
     */
    public function uploadFile(Request $request)
    {
        $form = $this->createForm(SaleType::class);
        $form->handleRequest($request);

        return $this->render('form/uploadFile.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
