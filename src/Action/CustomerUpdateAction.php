<?php

namespace App\Action;

use App\Service\CustomerService;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;

/**
 * Class CustomerUpdateAction
 *
 * @package App\Action
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerUpdateAction
{
    private $customerService;

    /**
     * CustomerUpdateAction constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService(
            new CustomerEntity(),
            new CustomerRepository()
        );
    }

    /**
     * Update Customer
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

        $data = json_decode($request->getContent(), true);

        if (isset($data['name'])) {
            $customerEntity->setName($data['name']);
        }

        if (isset($data['email'])) {
            $customerEntity->setEmail($data['email']);
        }

        if (isset($data['phone'])) {
            $customerEntity->setPhone($data['phone']);
        }

        if (isset($data['address'])) {
            $customerEntity->setAddress($data['address']);
        }

        if (isset($data['gender'])) {
            $customerEntity->setGender($data['gender']);
        }

        if (isset($data['status'])) {
            $customerEntity->setStatus($data['status']);
        }

        $result = $this->customerService->update($customerEntity, $customerId);

        return new JsonResponse(
            ['data' => $result],
            Response::HTTP_OK
        );
    }
}
