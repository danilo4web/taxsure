<?php

namespace App\Action;

use App\Service\CustomerService;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;
/**
 * Class CustomerAction
 *
 * @package App\Action
 * @author Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerUpdateAction
{
    private $customerService;

    /**
     * CustomerAction constructor.
     */
    public function __construct() {
        $this->customerService = new CustomerService(
            new CustomerEntity(),
            new CustomerRepository()
        );
        $this->handle();
    }

    public function handle()
    {
        $request = Request::createFromGlobals();
        $content = json_decode($request->getContent(), true);

        $customerEntity = new CustomerEntity();

        $customerEntity->setName($content['name']);
        $customerEntity->setEmail($content['email']);
        $customerEntity->setPhone($content['phone']);
        $customerEntity->setAddress($content['address']);
        $customerEntity->setGender($content['gender']);
        $customerEntity->setStatus($content['status']);

        echo json_encode($this->customerService->update($customerEntity, $content['id']));
        exit;
    }
}
