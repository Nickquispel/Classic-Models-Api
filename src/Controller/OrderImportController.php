<?php
namespace App\Controller;
use App\Service\OrderImport;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
/**
 * Order Import controller.
 * @Route("/api", name="api_")
 */
class OrderImportController extends FOSRestController
{
    /**
     * @var OrderImport
     */
    private $orderImport;

    public function __construct(OrderImport $orderImport)
    {
        $this->orderImport = $orderImport;
    }

    /**
     * Create Order.
     * @Rest\Post("/orderimport")
     *
     * @return Response
     */
    public function ImportOrder(Request $request)
    {
        $data = $request->getContent();
        var_dump($data);
        exit;
        $this->orderImport->query($data);

    }
}