<?php

namespace Acme\EssentialsBookBundle\Entity;

use Acme\EssentialsBookBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        $dql = "
            SELECT p
            FROM ". Product::class." p
            ORDER BY
                p.name ASC
        ";

        $res = $this->getEntityManager()
            ->createQuery($dql)
            ->getResult()
        ;

        pa($res);
    }
}
