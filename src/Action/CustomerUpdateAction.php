<?php

namespace App\Action;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;
use App\Service\CustomerService;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;


/**
 * Class CustomerUpdateAction
 *
 * @package App\Action
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerUpdateAction
{
    /** @var \App\Service\CustomerService $customerService */
    private $customerService;

    /**
     * CustomerUpdateAction constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService(
            new CustomerRepository()
        );
    }

    /**
     * Update Customer
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(Request $request): JsonResponse
    {
        $customerId = $request->attributes->get('customerId');

        if (!is_numeric($customerId)) {
            throw new \InvalidArgumentException("Invalid customer ID", Response::HTTP_BAD_REQUEST);
        }

        // entity from db
        $customerEntity = $this->customerService->getCustomer($customerId);

        // request data
        $data = json_decode($request->getContent(), true);

        if(!($customerEntity instanceof CustomerEntity)) {
            return new JsonResponse('Customer not found', Response::HTTP_NOT_FOUND);
        }

        // hydrate entity
        $customerEntity = $this->hydrate($customerEntity, $data);

        // update
        $customerEntity = $this->customerService->updateCustomer($customerEntity, $customerId);

        if (!($customerEntity instanceof CustomerEntity)) {
            return new JsonResponse('Customer not found', Response::HTTP_NOT_FOUND);
        }

        $result = [
            'name' => $customerEntity->getName(),
            'email' => $customerEntity->getEmail(),
            'phone' => $customerEntity->getPhone(),
            'address' => $customerEntity->getAddress(),
            'gender' => $customerEntity->getGender(),
            'status' => $customerEntity->getStatus()
        ];

        return new JsonResponse(
            ['data' => $result],
            Response::HTTP_OK
        );
    }

    /**
     * @param \App\Entity\CustomerEntity $customerEntity
     * @param array                      $data
     * @return \App\Entity\CustomerEntity
     */
    public function hydrate(CustomerEntity $customerEntity, array $data): CustomerEntity
    {
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

        return $customerEntity;
    }
}
