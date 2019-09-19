<?php

namespace App\Action;

use App\Service\CustomerService;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;

/**
 * Class CustomerDeleteAction
 *
 * @package App\Action
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerDeleteAction
{
    private $customerService;

    /**
     * CustomerDeleteAction constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService(
            new CustomerEntity(),
            new CustomerRepository()
        );
    }

    /**
     * Delete Customer
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

        $result = $this->customerService->delete($customerId);

        return new JsonResponse(
            $result,
            Response::HTTP_NO_CONTENT
        );
    }
}
