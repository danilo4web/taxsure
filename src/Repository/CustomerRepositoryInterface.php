<?php

namespace App\Repository;

use \App\Entity\CustomerEntity;

/**
 * Interface CustomerRepository
 *
 * @package   App\Repository
 * @author    Danilo Pereira <danilo4web@gmail.com>
 */
interface CustomerRepositoryInterface extends DefaultRepositoryInterface
{
    /**
     * Get Customer
     *
     * @param integer $customerId
     * @return \App\Entity\CustomerEntity
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getCustomer($customerId): CustomerEntity;

    /**
     * Find Customers by parameters
     *
     * @param array $params
     * @return array
     */
    public function findCustomersBy($params): array;
}
