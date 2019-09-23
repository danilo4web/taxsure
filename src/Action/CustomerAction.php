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
     * Show Customer
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function handle(Request $request): JsonResponse
    {
        $customerId = $request->attributes->get('customerId');

        if (!is_numeric($customerId)) {
            throw new \InvalidArgumentException("Invalid customer ID", Response::HTTP_BAD_REQUEST);
        }

        $customerEntity = $this->customerService->getCustomer($customerId);

        if (!($customerEntity instanceof CustomerEntity)) {
            return new JsonResponse('Customer not found', Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse(
            ['data' => self::extrator($customerEntity)],
            Response::HTTP_OK
        );
    }

    /**
     * @param $customerEntity
     * @return array
     */
    public function extrator($customerEntity)
    {
        return [
            'name' => $customerEntity->getName(),
            'email' => $customerEntity->getEmail(),
            'phone' => $customerEntity->getPhone(),
            'address' => $customerEntity->getAddress(),
            'gender' => $customerEntity->getGender(),
            'status' => $customerEntity->getStatus()
        ];
    }
}
