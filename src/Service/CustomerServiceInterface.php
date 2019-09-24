<?php

namespace App\Service;

use App\Entity\CustomerEntity;
use App\Repository\CustomerRepositoryInterface;

/**
 * Interface CustomerServiceInterface
 *
 * @package App\Service
 * @author  Danilo Pereira
 */
interface CustomerServiceInterface
{
    /**
     * CustomerService constructor.
     * @param \App\Repository\CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository);

    /**
     * Find for customers by params
     *
     * @param array $params
     * @return array
     */
    public function getCustomersBy(array $params): array;

    /**
     * Find a customer by ID
     *
     * @param integer $customerId
     * @return \App\Entity\CustomerEntity|null
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getCustomer(int $customerId);

    /**
     * Create a new Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return \App\Entity\CustomerEntity
     */
    public function createCustomer(CustomerEntity $customerEntity): CustomerEntity;

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @param integer                    $customerId
     * @return \App\Entity\CustomerEntity
     */
    public function updateCustomer(CustomerEntity $customerEntity, int $customerId): CustomerEntity;

    /**
     * Delete a customer
     *
     * @param integer $customerId
     * @return boolean
     */
    public function deleteCustomer(int $customerId): bool;
}
