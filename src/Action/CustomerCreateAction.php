<?php

namespace App\Action;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;
use App\Service\CustomerService;

/**
 * Class CustomerCreateAction
 *
 * @package App\Action
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerCreateAction
{
    private $customerService;

    /**
     * CustomerCreateAction constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService(
            new CustomerEntity(),
            new CustomerRepository()
        );
    }

    /**
     * Create Customer
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @throws \InvalidArgumentException
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function handle(Request $request)
    {
        $content = json_decode($request->getContent(), true);

        $customerEntity = new CustomerEntity();

        $customerEntity->setId($content['id']);
        $customerEntity->setName($content['name']);
        $customerEntity->setEmail($content['email']);
        $customerEntity->setPhone($content['phone']);
        $customerEntity->setAddress($content['address']);
        $customerEntity->setGender($content['gender']);
        $customerEntity->setStatus($content['status']);

        $retorno = $this->customerService->create($customerEntity);

        if (!$retorno) {
            return new JsonResponse(
                'Customer not created',
                Response::HTTP_BAD_REQUEST
            );
        }

        return new JsonResponse(
            $content,
            Response::HTTP_CREATED
        );
    }
}
