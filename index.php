<?php

class Book
{
    public $title;
    public $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }
}

class BookCollection implements IteratorAggregate
{
    private $books = [];

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->books);
    }
}

//create a book collection

$collection = new BookCollection();
$collection->addBook(new Book('The Great Gatsby', 'F. Scott Fitzgerald'));
$collection->addBook(new Book('To Kill a Mockingbird', 'Harper Lee'));
$collection->addBook(new Book('1984', 'George Orwell'));
$collection->addBook(new Book('Pride and Prejudice', 'Jane Austen'));

//iterate over the book collection using foreach

foreach($collection as $book) {
    echo $book->title . ' by ' . $book->author . PHP_EOL;
}

?>