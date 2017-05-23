<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 21.05.2017
 * Time: 23:02
 */

namespace OrmTest\Repository;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use OrmTest\Entity\Book;

class BookWithAuthors implements ObjectRepository
{

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /** @var  EntityManager */
    private $em;

    /**
     * Finds an object by its primary key / identifier.
     *
     * @param mixed $id The identifier.
     *
     * @return object|null The object.
     */
    public function find($id)
    {
        $book = new \OrmTest\Entity\BookWithAuthors();
        $result = $this->em->createQueryBuilder()->select('b.name book', 'a.name author')
            ->from(Book::class, 'b')
            ->innerJoin("b.authors", 'a')
            ->where("b.id = :id")
            ->getQuery()->execute([':id' => $id]);
        $book->setName(current($result)['book']);
        foreach ($result as $item) {
            $book->addAuthor($item['author']);
        }
        return $book;
    }

    /**
     * Finds all objects in the repository.
     *
     * @return array The objects.
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * Finds objects by a set of criteria.
     *
     * Optionally sorting and limiting details can be passed. An implementation may throw
     * an UnexpectedValueException if certain values of the sorting or limiting details are
     * not supported.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return array The objects.
     *
     * @throws \UnexpectedValueException
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        // TODO: Implement findBy() method.
    }

    /**
     * Finds a single object by a set of criteria.
     *
     * @param array $criteria The criteria.
     *
     * @return object|null The object.
     */
    public function findOneBy(array $criteria)
    {
        // TODO: Implement findOneBy() method.
    }

    /**
     * Returns the class name of the object managed by the repository.
     *
     * @return string
     */
    public function getClassName()
    {
        // TODO: Implement getClassName() method.
    }
}