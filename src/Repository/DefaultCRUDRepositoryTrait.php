<?php

namespace App\Repository;

use Doctrine\ORM\DefaultEntityInterface;

/**
 * Trait DefaultCRUDRepositoryTrait
 * Default Trait for repository's CRUD.
 *
 * @package App\Repository
 * @author  Danilo Pereira <danilo4web@gmail.com>
 */
trait DefaultCRUDRepositoryTrait
{
    /** @var \Doctrine\ORM\EntityManager */
    public static $entityManager;

    /**
     * DefaultRepositoryAbstract constructor.
     */
    public function __construct()
    {
        $this->_em = self::$entityManager;
    }

    /**
     * Create
     * @param $entity
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create($entity)
    {
        $this->_em->persist($entity);
        $this->_em->flush();

        return $entity;
    }

    /**
     * Update
     * @param $entity
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update($entity)
    {
        $this->_em->merge($entity);
        $this->_em->flush();

        return $entity;
    }

    /**
     * Delete
     * @param $entity
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @return boolean
     */
    public function delete($entity) : bool
    {
        $this->_em->remove($entity);
        $this->_em->flush();

        return true;
    }
}
