<?php

namespace App\Service;

use App\Entity\CustomerEntity;
use App\Repository\CustomerRepositoryInterface;

/**
 * Interface CustomerServiceInterface
 *
 * @package App\Service
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerService implements CustomerServiceInterface
{
    /** @var \App\Entity\CustomerEntity */
    private $customerEntity;

    /** @var \App\Repository\CustomerRepositoryInterface */
    private $customerRepository;

    /**
     * CustomerService constructor.
     *
     * @param \App\Entity\CustomerEntity                  $customerEntity
     * @param \App\Repository\CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CustomerEntity $customerEntity,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerEntity = $customerEntity;
        $this->customerRepository = $customerRepository;
    }

    /**
     * Find for customers
     *
     * @param array $params
     * @return array
     */
    public function findCustomers($params): array
    {
        return $this->customerRepository->findCustomers($params);
    }

    /**
     * Create a new Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return boolean
     */
    public function create(CustomerEntity $customerEntity): bool
    {
        return $this->customerRepository->create($customerEntity);
    }

    /**
     * Find Customer
     *
     * @param integer $customerId
     * @return mixed
     */
    public function find($customerId)
    {
        return $this->customerRepository->fetchRow($customerId);
    }

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @param integer                    $customerId ;
     * @return boolean
     */
    public function update($customerEntity, $customerId): bool
    {
        return $this->customerRepository->update($customerEntity, $customerId);
    }

    /**
     * @param integer $customerId
     * @return boolean
     */
    public function delete($customerId): bool
    {
        return $this->customerRepository->delete($customerId);
    }
}
