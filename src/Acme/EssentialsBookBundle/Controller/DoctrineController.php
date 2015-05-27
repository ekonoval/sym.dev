<?php
namespace Acme\EssentialsBookBundle\Controller;

use Acme\EssentialsBookBundle\Entity\Category;
use Acme\EssentialsBookBundle\Entity\Product;
use Acme\EssentialsBookBundle\Entity\ProductRepository;
use Acme\EssentialsBookBundle\Helpers\BundleController;
use Acme\EssentialsBookBundle\Helpers\PlainResponse;
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
//        $this->dql();
//        $this->repo();exit;
//        $this->linking();
//        $this->getRelated();
        $this->join();

        return new PlainResponse('');
    }

    private function join()
    {
        $id = 5;
        $res = $this->getDoctrineRepo(Product::class)->findOneByIdJoinedToCategory($id);
        pa('xx');

    }

    private function getRelated()
    {
        /** @var Product $product */
        $product = $this->getDoctrineRepo(Product::class)->find(6);
        $category = $product->getCategory();
        $category->getName();
    }

    private function linking()
    {
        $em = $this->getDoctrineEntityManager();

        $category = new Category();
        $category->setName('risking - huisking '.time());
        $em->persist($category);

        $prodRepo = $this->getDoctrineRepo(Product::class);
        $product = $prodRepo->find(5);

        /** @var Product $product */
        $product->setCategory($category);
        $em->flush();
    }

    private function repo()
    {
        $repo = $this->getDoctrineRepo(Product::class);
        $repo->findAllOrderedByName();

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
