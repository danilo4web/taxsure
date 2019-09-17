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
 * @author Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerUpdateAction
{
    private $customerService;

    /**
     * CustomerUpdateAction constructor.
     */
    public function __construct() {
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

        $data = json_decode($request->getContent(), true);

        $customerEntity = new CustomerEntity();
        $customerEntity->setName($data['name']);
        $customerEntity->setEmail($data['email']);
        $customerEntity->setPhone($data['phone']);
        $customerEntity->setAddress($data['address']);
        $customerEntity->setGender($data['gender']);
        $customerEntity->setStatus($data['status']);

        $result = $this->customerService->update($customerEntity, $customerId);

        return new JsonResponse(
            ['data' => $data],
            Response::HTTP_OK
        );
    }
}
