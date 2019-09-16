<?php

namespace App\Action;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\CustomerService;
use App\Entity\CustomerEntity;
use App\Repository\CustomerRepository;

/**
 * Class CustomersAction
 *
 * @package App\Action
 * @author Danilo Pereira <danilo4web@gmail.com>
 */
class CustomersAction
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
        echo json_encode(['success' => true, 'items' => $this->customerService->all()]);
        exit;
    }
}
