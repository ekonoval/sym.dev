<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Entity\Product;
use Acme\EssentialsBookBundle\Helpers\BundleController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DoctrineController extends BundleController
{
    /**
     * @Route("/db")
     */
    public function indexAction()
    {
        //$this->fetch();
        //$this->queryBuilder();
        $this->dql();
    }

    private function dql()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p.id, p.price
            FROM '.Product::class.' p
            WHERE p.price > :price
            ORDER BY p.price ASC'
        )->setParameter('price', '19.90');

        $products = $query->getResult();
        pa($products);
    }

    private function queryBuilder()
    {
        $repository = $this->getDoctrineRepo(Product::class);

        $query = $repository->createQueryBuilder('p')
            ->where('p.price > :price')
                ->setParameter('price', '19.98')
            ->orderBy('p.price', 'ASC')
            ->getQuery();

        //$products = $query->getResult();
        $products = $query->getSingleResult();
        pa($products);
    }

    private function fetch()
    {
        $id = 6;
        $repo = $this->getDoctrine()->getRepository(Product::class);
        //$product = $repo->find($id);pa($product);

//        pa($repo->findAll());
        $all = $repo->findBy([], ['id' => 'DESC']);
        pa($all);

        $all[0]->setName('xxxxx');
        $this->getDoctrineEntityManager()->flush();
    }

    private function insert()
    {
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrineEntityManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product id ' . $product->getId());
    }


}
