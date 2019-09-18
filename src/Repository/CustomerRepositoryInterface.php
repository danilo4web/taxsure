<?php

namespace App\Repository;

use App\Entity\CustomerEntity;

/**
 * Interface CustomerRepository
 *
 * @package   App\Repository
 * @author    Danilo Pereira <danilo4web@gmail.com>
 */
interface CustomerRepositoryInterface
{
    /**
     * find customers
     *
     * @param $params
     * @return array
     */
    public function findCustomers($params) : array;

    /**
     * Find One Customer
     *
     * @param integer $customerId
     * @return mixed
     */
    public function fetchRow(int $customerId);

    /**
     * Create Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return boolean
     */
    public function create(CustomerEntity $customerEntity) : bool;

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @param integer                    $customerId
     * @return boolean
     */
    public function update(CustomerEntity $customerEntity, int $customerId) : bool;

    /**
     * Delete Customer
     *
     * @param integer $customerId
     * @return boolean
     */
    public function delete(int $customerId) : bool;
}
