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
    public function all();

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
     * @return mixed
     */
    public function read($customerId);

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity  $customerEntity
     * @param int $customerId;
     * @return mixed
     */
    public function update($customerEntity, $customerId);

    /**
     * @param int $customerId
     * @return mixed
     */
    public function delete($customerId);
}
