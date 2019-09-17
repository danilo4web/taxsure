<?php

namespace App\Action;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
    }

    /**
     * Show Customer
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @throws \InvalidArgumentException
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function handle(Request $request)
    {
        $customerId = $request->attributes->get('customerId');

        if (!is_numeric($customerId)) {
            throw new \InvalidArgumentException("Invalid customer ID", Response::HTTP_BAD_REQUEST);
        }

        $retorno = $this->customerService->read($customerId);

        return new JsonResponse(
            $retorno,
            Response::HTTP_OK
        );
    }
}
