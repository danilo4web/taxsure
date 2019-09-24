<?php

namespace App\Repository;

use App\Entity\CustomerEntity;
use Doctrine\ORM\EntityRepository;

/**
 * Class CustomerRepository
 *
 * @package   App\Repository
 * @author    Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerRepository extends EntityRepository implements CustomerRepositoryInterface
{
    use DefaultCRUDRepositoryTrait;

    /**
     * Get Customer
     *
     * @param integer $customerId
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getCustomer(int $customerId)
    {
        $customerEntity = $this->_em->find(CustomerEntity::class, $customerId);

        return $customerEntity;
    }

    /**
     * Find Customers by parameters
     *
     * @param array $params
     * @return array
     */
    public function findCustomersBy(array $params): array
    {
        $queryBuilder = $this->_em->createQueryBuilder()
            ->from(CustomerEntity::class, 'c')
            ->select('c');

        foreach ($params as $key => $param) {
            $queryBuilder
                ->andWhere($queryBuilder
                    ->expr()
                    ->eq('c.' . $key, ':' . $key))
                ->setParameter(':' . $key, $param);
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
