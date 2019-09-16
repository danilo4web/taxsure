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
    public function all()
    {
        return (array) $this->customerRepository->findAll();
    }

    /**
     * Create a new Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return bool
     */
    public function create(CustomerEntity $customerEntity) : bool
    {
        return $this->customerRepository->create($customerEntity);
    }

    /**
     *
     * @param int $customerId
     * @return mixed
     */
    public function read($customerId)
    {
        return $this->customerRepository->fetchRow($customerId);
    }

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity  $customerEntity
     * @param int $customerId;
     * @return mixed
     */
    public function update($customerEntity, $customerId)
    {
        return $this->customerRepository->update($customerEntity, $customerId);
    }

    /**
     * @param int $customerId
     * @return mixed
     */
    public function delete($customerId)
    {
        return $this->customerRepository->delete($customerId);
    }
}
