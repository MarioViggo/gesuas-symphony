<?php

namespace App\Repository;

use App\Entity\Beneficente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Beneficente>
 *
 * @method Beneficente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Beneficente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Beneficente[]    findAll()
 * @method Beneficente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeneficenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Beneficente::class);
    }

    /**
     * @return Beneficente|null 
     */
    public function pesquisarPorNis(string $nis) : ?Beneficente
    {
        return $this->findOneBy(['nis' => $nis]);
    }
}