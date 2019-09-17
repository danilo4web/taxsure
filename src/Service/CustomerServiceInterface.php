<?php

namespace App\Service;

use App\Entity\CustomerEntity;

/**
 * Interface CustomerServiceInterface
 *
 * @package App\Service
 * @author Danilo Pereira
 */
interface CustomerServiceInterface
{

    /**
     * Listing all customers
     *
     * @return array
     */
    public function allCustomers() : array;

    /**
     * Create a new Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return mixed
     */
    public function create(CustomerEntity $customerEntity) : bool;

    /**
     *
     * @param int $customerId
     * @return array
     */
    public function read($customerId) : array;

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity  $customerEntity
     * @param int $customerId;
     * @return boolean
     */
    public function update($customerEntity, $customerId) : bool;

    /**
     * @param int $customerId
     * @return boolean
     */
    public function delete($customerId) : bool;
}
