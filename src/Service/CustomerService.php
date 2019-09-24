<?php

namespace App\Service;

use App\Entity\CustomerEntity;
use App\Repository\CustomerRepositoryInterface;
use Doctrine\ORM\Mapping\Entity;

/**
 * Interface CustomerServiceInterface
 *
 * @package App\Service
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerService implements CustomerServiceInterface
{
    /** @var \App\Repository\CustomerRepositoryInterface */
    private $customerRepository;

    /**
     * CustomerService constructor.
     * @param \App\Repository\CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Find for customers by params
     *
     * @param array $params
     * @return array
     */
    public function getCustomersBy(array $params): array
    {
        return $this->customerRepository->findCustomersBy($params);
    }

    /**
     * Find a customer by ID
     *
     * @param integer $customerId
     * @return \App\Entity\CustomerEntity|null
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getCustomer(int $customerId)
    {
        if (!is_numeric($customerId)) {
            throw new \InvalidArgumentException("Invalid Custumer ID");
        }

        $customerEntity = $this->customerRepository->getCustomer($customerId);

        return $customerEntity;
    }

    /**
     * Create a new Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return \App\Entity\CustomerEntity
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function createCustomer(CustomerEntity $customerEntity): CustomerEntity
    {
        return $this->customerRepository->create($customerEntity);
    }

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @param integer                    $customerId
     * @return \App\Entity\CustomerEntity
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateCustomer(CustomerEntity $customerEntity, int $customerId): CustomerEntity
    {
        if (!is_numeric($customerId)) {
            throw new \InvalidArgumentException("Invalid Custumer ID");
        }

        if (!($customerEntity instanceof CustomerEntity)) {
            throw new \InvalidArgumentException("Invalid Customer Entity");
        }

        return $this->customerRepository->update($customerEntity, $customerId);
    }

    /**
     * Delete a customer
     *
     * @param integer $customerId
     * @return boolean
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function deleteCustomer(int $customerId): bool
    {
        if (!is_numeric($customerId)) {
            throw new \InvalidArgumentException("Invalid Custumer ID");
        }

        $customerEntity = $this->getCustomer($customerId);

        if (!($customerEntity instanceof CustomerEntity)) {
            return false;
        }

        return $this->customerRepository->delete($customerEntity);
    }
}
