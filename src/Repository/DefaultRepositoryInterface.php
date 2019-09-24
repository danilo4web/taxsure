<?php

namespace App\Repository;

/**
 * Interface DefaultRepositoryInterface
 * Default Interface for Repository
 *
 * @package   App\Repository
 * @author    Danilo Pereira <danilo4web@gmail.com>
 */
interface DefaultRepositoryInterface
{
    /**
     * Create
     * @param $entity
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create($entity);

    /**
     * Update
     * @param $entity
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update($entity);

    /**
     * Delete
     * @param $entity
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @return boolean
     */
    public function delete($entity) : bool;
}
