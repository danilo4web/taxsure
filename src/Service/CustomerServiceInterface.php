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
     * Find for customers
     *
     * @param array $params
     * @return array
     */
    public function findCustomers($params) : array;

    /**
     * Create a new Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return mixed
     */
    public function create(CustomerEntity $customerEntity) : bool;

    /**
     * Find Customer
     *
     * @param integer $customerId
     * @return mixed
     */
    public function find($customerId);

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity  $customerEntity
     * @param integer $customerId;
     * @return boolean
     */
    public function update($customerEntity, $customerId) : bool;

    /**
     * @param integer $customerId
     * @return boolean
     */
    public function delete($customerId) : bool;
}
