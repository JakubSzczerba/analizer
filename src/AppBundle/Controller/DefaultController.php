<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\SaleType;
use AppBundle\Services\DataProvider;

class DefaultController extends Controller
{
    private DataProvider $dataPovider;

    public function __construct(DataProvider $dataPovider)
    {
        $this->dataPovider = $dataPovider;
    }

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
     * @Route("/form", name="form")
     */
    public function uploadFile(Request $request)
    {
        $form = $this->createForm(SaleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $date = $form->get('dateAdd')->getData();
            $status = $form->get('status')->getData();
            $file = $form->get('file')->getData();

            $result = $this->dataPovider->serializeData($file);

            //return $this->redirectToRoute('analize');
        }

        return $this->render('form/uploadFile.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/analize", name="analize")
     */
    public function showAnalize(Request $request)
    {
        return $this->render('default/index.html.twig', []);
    }
}
