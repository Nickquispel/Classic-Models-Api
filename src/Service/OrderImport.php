<?php


namespace App\Service;


use Doctrine\Bundle\DoctrineBundle\Registry;
use Exception;

class OrderImport
{

    Function query($data)
    {
        try{

        if (is_array($data)) {

            foreach ($data['items'] as $order) {
                /** @var Registry $doctrine */
                $doctrine = $this->getContainer()->get('doctrine');

                /** @var \Doctrine\DBAL\Connection $conn */
                $conn = $doctrine->getConnection();
                $stmt = $conn->prepare('insert into orders (orderNumber, orderDate, requiredDate, status, customerNumber)
                VALUES (:orderNumber, :orderDate, :requiredDate, :status, :customerNumber)');
                $stmt->bindValue('orderNumber', $order['increment_id']);
                $stmt->bindValue('orderDate', $order['updated_at']);
                $stmt->bindValue('requiredDate', $order['updated_at']);
                $stmt->bindValue('status', 'Processing');
                $stmt->bindValue('customerNumber', 363);
                $stmt->execute();
            }
        }

            } catch(Exception $e){
                echo 'Caught exception: ' . $e->getMessage(),"\n";

        }
    }
}
