<?php

namespace OrmTest\Entity;

use PHPUnit\Framework\TestCase;

class BookWithAuthorsTest extends TestCase
{
    private $name = 'name';
    private $authors = [
        'author1',
        'author2'
    ];
    private $author = 'author3';

    public function testSetName()
    {
        $book = new BookWithAuthors();
        $this->assertInstanceOf(BookWithAuthors::class, $book->setName($this->name));

        return $book;
    }

    /**
     * @depends testSetName
     * @param BookWithAuthors $book
     */
    public function testGetName(BookWithAuthors $book)
    {
        $this->assertEquals($this->name, $book->getName());
    }

    /**
     * @return BookWithAuthors
     */
    public function testSetAuthors()
    {
        $book = new BookWithAuthors();
        $this->assertInstanceOf(BookWithAuthors::class, $book->setAuthors($this->authors));
        return $book;
    }

    /**
     * @depends testSetAuthors
     * @param BookWithAuthors $book
     */
    public function testGetAuthors(BookWithAuthors $book)
    {
        $this->assertEquals($this->authors, $book->getAuthors());
    }

    /**
     * @depends testSetAuthors
     * @depends testGetAuthors
     * @param BookWithAuthors $book
     */
    public function testAddAuthor(BookWithAuthors $book)
    {
        $this->assertEquals($book, $book->addAuthor($this->author));
        $this->assertEquals(array_merge($this->authors, [$this->author]), $book->getAuthors());
    }
}
