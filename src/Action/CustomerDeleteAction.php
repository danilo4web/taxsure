<?php

namespace App\Action;

use App\Service\CustomerService;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Repository\CustomerRepository;

/**
 * Class CustomerDeleteAction
 *
 * @package App\Action
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerDeleteAction
{
    /** @var \App\Service\CustomerService $customerService */
    private $customerService;

    /**
     * CustomerDeleteAction constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService(
            new CustomerRepository()
        );
    }

    /**
     * Delete Customer
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

        $result = $this->customerService->deleteCustomer($customerId);

        return new JsonResponse(
            $result,
            Response::HTTP_NO_CONTENT
        );
    }
}
