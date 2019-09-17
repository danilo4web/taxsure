<?php

namespace App\Repository;

use App\Entity\CustomerEntity;

/**
 * Class CustomerRepository
 *
 * @package   App\Repository
 * @author    Danilo Pereira <danilo4web@gmail.com>
 */
class CustomerRepository implements CustomerRepositoryInterface
{

    /** @var $queryBuilder */
    private $connection;

    public function __construct()
    {
        global $connection;

        $this->connection = $connection;
    }

    /**
     * Find All Customers
     *
     * @return array
     */
    public function findAll()
    {
        $query = "SELECT * FROM `symfony`.`customer` WHERE `status` = '1'";

        $result = mysqli_query($this->connection, $query);

        $content = [];
        while($row = mysqli_fetch_assoc($result)) {
            $content[] = $row;
        }

        return $content;
    }

    /**
     * Find One Customer
     *
     * @param int $customerId
     * @return array
     */
    public function fetchRow(int $customerId)
    {
        $query = "SELECT * FROM `symfony`.`customer` WHERE `id` = '{$customerId}'";

        $result = mysqli_query($this->connection, $query);

        if ($result->num_rows > 0) {
            return mysqli_fetch_assoc($result);
        }

        return [];
    }

    /**
     * Create Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return bool
     */
    public function create(CustomerEntity $customerEntity) : bool
    {
        $query = "
            INSERT INTO `symfony`.`customer`
                (`name`, `email`, `phone`, `address`, `gender`, `status`)
            VALUES
                (
                    '{$customerEntity->getName()}', 
                    '{$customerEntity->getEmail()}', 
                    '{$customerEntity->getPhone()}', 
                    '{$customerEntity->getAddress()}', 
                    '{$customerEntity->getGender()}', 
                    '{$customerEntity->getStatus()}'
                );";

        if (mysqli_query($this->connection, $query)) {
            return true;
        }

        return false;
    }

    /**
     * Update Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @param integer                    $customerId
     * @return bool
     */
    public function update(CustomerEntity $customerEntity, int $customerId) : bool
    {
        $query = "
            UPDATE `symfony`.`customer`
            SET 
                `name` = '{$customerEntity->getName()}', 
                `email` = '{$customerEntity->getEmail()}', 
                `phone` = '{$customerEntity->getPhone()}', 
                `address` = '{$customerEntity->getAddress()}', 
                `gender` = '{$customerEntity->getGender()}', 
                `status` = '{$customerEntity->getStatus()}'
            WHERE
              `id` = '{$customerId}'
                ";

        if (mysqli_query($this->connection, $query)) {
            return true;
        }

        return false;
    }

    /**
     * Delete Customer
     *
     * @param integer $customerId
     * @return bool
     */
    public function delete(int $customerId) : bool
    {
        $query = "DELETE FROM `symfony`.`customer` WHERE `id` = '{$customerId}'";

        if (mysqli_query($this->connection, $query)) {
            return true;
        }

        return false;
    }
}
