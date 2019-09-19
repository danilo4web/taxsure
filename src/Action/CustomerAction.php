<?php

namespace App\Action;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Service\CustomerService;
use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;

/**
 * Class CustomerAction
 *
 * @package App\Action
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerAction
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

        $customerEntity = $this->customerService->find($customerId);

        if (!($customerEntity instanceof CustomerEntity)) {
            return new JsonResponse(
                'Customer not found',
                Response::HTTP_NOT_FOUND
            );
        }

        return new JsonResponse(
            [
                'data' => [
                    'name' => $customerEntity->getName(),
                    'email' => $customerEntity->getEmail(),
                    'phone' => $customerEntity->getPhone(),
                    'address' => $customerEntity->getAddress(),
                    'gender' => $customerEntity->getGender(),
                    'status' => $customerEntity->getStatus()
                ]
            ],
            Response::HTTP_OK
        );
    }
}
