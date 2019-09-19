<?php

namespace App\Action;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Service\CustomerService;
use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;

/**
 * Class CustomersAction
 *
 * @package App\Action
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomersAction
{
    private $customerService;

    /**
     * CustomerAction constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService(
            new CustomerEntity(),
            new CustomerRepository()
        );
    }

    /**
     * All Customers
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function handle(Request $request)
    {
        $params = json_decode($request->getContent(), true);

        $result = $this->customerService->findCustomers($params);

        return new JsonResponse(
            ['data' => $result, 'count' => count($result)],
            Response::HTTP_OK
        );
    }
}
