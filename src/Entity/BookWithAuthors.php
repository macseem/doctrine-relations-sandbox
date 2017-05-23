<?php

namespace OrmTest\Entity;

class BookWithAuthors
{
    /** @var  string */
    private $name;
    /** @var  string[] */
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
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \string[]
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @param \string[] $authors
     * @return $this
     */
    public function setAuthors(array $authors)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function addAuthor(string $author)
    {
        $this->authors[] = $author;

        return $this;
    }
}