<?php

namespace App\Service;

use App\Entity\CustomerEntity;
use App\Repository\CustomerRepositoryInterface;

/**
 * Interface CustomerServiceInterface
 *
 * @package App\Service
 * @author Danilo Pereira <danilo4web@gmail.com>
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
     * @param \App\Entity\CustomerEntity $customerEntity
     */
    public function __construct(
        CustomerEntity $customerEntity,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerEntity = $customerEntity;
        $this->customerRepository = $customerRepository;
    }

    /**
     * Listing all customers
     * @return array
     */
    public function allCustomers() : array
    {
        return (array) $this->customerRepository->findAll();
    }

    /**
     * Create a new Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return boolean
     */
    public function create(CustomerEntity $customerEntity) : bool
    {
        return $this->customerRepository->create($customerEntity);
    }

    /**
     *
     * @param int $customerId
     * @return array
     */
    public function read($customerId) : array
    {
        return $this->customerRepository->fetchRow($customerId);
    }

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity  $customerEntity
     * @param int $customerId;
     * @return boolean
     */
    public function update($customerEntity, $customerId) : bool
    {
        return $this->customerRepository->update($customerEntity, $customerId);
    }

    /**
     * @param int $customerId
     * @return boolean
     */
    public function delete($customerId) : bool
    {
        return $this->customerRepository->delete($customerId);
    }
}
