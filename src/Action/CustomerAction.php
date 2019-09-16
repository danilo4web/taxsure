<?php

namespace App\Action;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\CustomerService;
use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;

/**
 * Class CustomerAction
 *
 * @package App\Action
 * @author Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerAction
{
    private $customerService;

    /**
     * CustomerAction constructor.
     */
    public function __construct() {
        $this->customerService = new CustomerService(
            new CustomerEntity(),
            new CustomerRepository()
        );
        $this->handle();
    }

    public function handle()
    {
        $request = Request::createFromGlobals();
        $content = json_decode($request->getContent(), true);
        $retorno = $this->customerService->read($content['id']);

        echo json_encode(['success' => true, 'item' => $retorno]);
        exit;
    }
}
