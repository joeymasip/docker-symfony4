<?php

namespace App\Repository;

use App\Entity\TypeQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeQuestion[]    findAll()
 * @method TypeQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeQuestionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeQuestion::class);
    }

    // /**
    //  * @return TypeQuestion[] Returns an array of TypeQuestion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeQuestion
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
