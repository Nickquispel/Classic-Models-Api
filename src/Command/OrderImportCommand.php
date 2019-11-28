<?php


namespace App\Command;


use App\Entity\Customers;
use App\Entity\Orders;
use App\Entity\Sport;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OrderImportCommand extends ContainerAwareCommand
{
    /**
     * @var EntityManagerInterface
     */
    private $em;



    protected function configure()
    {
        $this->setName('s:app:test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        /** @var Registry $doctrine */
        $doctrine = $this->getContainer()->get('doctrine');

        /** @var \Doctrine\DBAL\Connection $conn */
        $conn = $doctrine->getConnection();
        $stmt = $conn->prepare('insert into orders (orderNumber, orderDate, requiredDate, status, customerNumber) 
            VALUES (:orderNumber, :orderDate, :requiredDate, :status, :customerNumber)');
        $stmt->bindValue('orderNumber', 12346);
        $stmt->bindValue('orderDate', '2019-11-25');
        $stmt->bindValue('requiredDate', '2019-11-26');
        $stmt->bindValue('status', 'shipped');
        $stmt->bindValue('customerNumber', 363);
        $stmt->execute();


        exit;

    }

}
