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

    /** @var $connection */
    private $connection;

    public function __construct()
    {
        global $connection;
        $this->connection = $connection;
    }

    /**
     * Find customers
     *
     * @param array $params
     * @return array
     */
    public function findCustomers($params): array
    {
        $query = "SELECT * FROM `symfony`.`customer` WHERE `status` = '" . CustomerEntity::STATUS_ENABLED . "'";

        if (count($params)) {
            foreach ($params as $key => $content) {
                $query .= " AND `$key` = '" . $content . "' ";
            }
        }

        $result = mysqli_query($this->connection, $query);

        $content = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $content[] = $row;
        }

        return $content;
    }

    /**
     * Find One Customer
     *
     * @param integer $customerId
     * @return mixed
     */
    public function fetchRow(int $customerId)
    {
        $query = "SELECT `id`, `name`, `email`, `phone`, `address`, `gender`, `status`
                  FROM `symfony`.`customer` 
                  WHERE `id` = '{$customerId}'";

        $result = mysqli_query($this->connection, $query);

        if ($result->num_rows > 0) {
            $data = mysqli_fetch_assoc($result);

            $customerEntity = new CustomerEntity();
            $customerEntity->setId($data['id'])
                ->setName($data['name'])
                ->setEmail($data['email'])
                ->setPhone($data['phone'])
                ->setAddress($data['address'])
                ->setGender($data['gender'])
                ->setStatus($data['status']);


            return $customerEntity;
        }

        return null;
    }

    /**
     * Create Customer
     *
     * @param \App\Entity\CustomerEntity $customerEntity
     * @return boolean
     */
    public function create(CustomerEntity $customerEntity): bool
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
     * @return boolean
     */
    public function update(CustomerEntity $customerEntity, int $customerId): bool
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
     * @return boolean
     */
    public function delete(int $customerId): bool
    {
        $query = "DELETE FROM `symfony`.`customer` WHERE `id` = '{$customerId}'";

        if (mysqli_query($this->connection, $query)) {
            return true;
        }

        return false;
    }
}
