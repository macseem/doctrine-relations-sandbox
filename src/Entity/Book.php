<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 20.05.2017
 * Time: 23:54
 */

namespace OrmTest\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Book
 * @package OrmTest\Entity
 * @ORM\Entity()
 * @ORM\Table(name="book")
 */
class Book
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
     * @var string;
     * @ORM\Column(type="string")
     *
     */
    private $text;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
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
     * @var Author[]
     * @ORM\ManyToMany(targetEntity="Author")
     * @ORM\JoinTable(name="book_author",
     *     joinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="author_id", referencedColumnName="id")}
     * )
     */
    private $authors;

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
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return Author[]
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param Author[] $authors
     */
    public function setAuthors( $authors)
    {
        $this->authors = $authors;
    }

}