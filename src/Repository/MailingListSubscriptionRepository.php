<?php

namespace App\Repository;

use App\Entity\MailingListSubscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MailingListSubscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method MailingListSubscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method MailingListSubscription[]    findAll()
 * @method MailingListSubscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MailingListSubscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MailingListSubscription::class);
    }

    // /**
    //  * @return MailingListSubscription[] Returns an array of MailingListSubscription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MailingListSubscription
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
