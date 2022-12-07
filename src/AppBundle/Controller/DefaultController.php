<?php

namespace AppBundle\Controller;

use AppBundle\Repository\SaleRepository;
use AppBundle\Entity\Sale;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\SaleType;
use AppBundle\Services\DataProvider;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends Controller
{
    private DataProvider $dataPovider;

    private EntityManagerInterface $em;

    private SaleRepository $saleRepository;

    public function __construct(DataProvider $dataPovider, EntityManagerInterface $em, SaleRepository $saleRepository)
    {
        $this->dataPovider = $dataPovider;
        $this->em = $em;
        $this->saleRepository = $saleRepository;
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
            foreach($result as $data) {
                $row = new Sale();
                $date = new \DateTime( $data['date_add']);
                $row->setDateAdd($date);
                $row->setIdOrderDetail((int) $data['id_order_detail']);
                $row->setIdOrder((int) $data['id_order']);
                $row->setProductId((int) $data['product_id']);
                $row->setProductQuantity((int) $data['product_quantity']);
                $row->setPrice((float) $data['price']);
                $row->setStatus($data['status']);

                $this->em->persist($row);
                $this->em->flush();
            }

            return $this->redirectToRoute('analize');
        }

        return $this->render('form/uploadFile.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/", name="analize")
     */
    public function showAnalize(Request $request)
    {
        $data = $this->saleRepository->getData();

        return $this->render('default/analize.html.twig', [
            'data' => $data,
        ]);
    }
}
