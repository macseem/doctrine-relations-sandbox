<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 20.05.2017
 * Time: 23:55
 */

namespace OrmTest\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Author
 * @package OrmTest\Entity
 * @ORM\Entity()
 * @ORM\Table(name="author")
 */
class Author
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var Book[]
     * @ORM\ManyToMany(targetEntity="Book",mappedBy="authors")
     */
    private $books;


    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return Book[]
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * @param Book[] $books
     */
    public function setBooks( $books)
    {
        $this->books = $books;
    }

}