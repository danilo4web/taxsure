<?php

namespace App\Action;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Service\CustomerService;
use App\Repository\CustomerRepository;

/**
 * Class CustomersAction
 *
 * @package App\Action
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomersAction
{
    /** @var \App\Service\CustomerService $customerService */
    private $customerService;

    /**
     * CustomerAction constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService(
            new CustomerRepository()
        );
    }

    /**
     * Action to search customers
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function handle(Request $request): JsonResponse
    {
        /** @var array $postParams */
        $postParams = json_decode($request->getContent(), true);

        /** @var array $data */
        $data = $this->customerService->getCustomersBy($postParams);

        return new JsonResponse(['data' => $data, 'count' => count($data)], Response::HTTP_OK);
    }
}
