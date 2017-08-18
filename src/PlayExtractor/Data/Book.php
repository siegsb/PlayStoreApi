<?php
namespace SiegSB\PlayExtractor\Data;

/**
 * @package PlayExtractor\Data\Book
*/
class Book implements \JsonSerializable
{

    private $book_id;

    private $image;

    private $title;

    private $author;

    private $price;

    private $url;

    private $description;

    private $pages;

    private $languages;

    private $isbn;

    private $rating_value;

    private $rating_count;

    /**
     * Gets the book ID
     *
     * @return $book_id string
    */
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * Sets the book ID
     *
     * @param $book_id string
    */
    public function setBookId($book_id)
    {
        $book_id = trim($book_id);
        $this->book_id = $book_id;
    }

    /**
     * Gets the book cover
     *
     * @return $image string
    */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the book cover
     *
     * @param $image string
    */
    public function setImage($image)
    {
        $image = trim($image);
        if (substr($image, 0, 2) === '//') {
            $image = 'http:'.$image;
        }
        $this->image = $image;
    }

    /**
     * Gets the book title
     *
     * @return $title string
    */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the book title
     *
     * @param $title string
    */
    public function setTitle($title)
    {
        $title = trim($title);
        $this->title = $title;
    }

    /**
     * Gets the book author
     *
     * @return $author string
    */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the book author
     *
     * @param $author string
    */
    public function setAuthor($author)
    {
        $author = trim($author);
        $this->author = $author;
    }

    /**
     * Gets the book price
     *
     * @return $price string
    */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the book price
     *
     * @param $price string
    */
    public function setPrice($price)
    {
        $price = trim($price);
        if (!preg_match('#[0-9]#', $price)) {
            $price = null;
        }
        $this->price = $price;
    }

    /**
     * Gets the Play Store URL
     *
     * @return $url string
    */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the Play Store URL
     *
     * @param $url string
    */
    public function setUrl($url)
    {
        $url = trim($url);
        $this->url = $url;
    }

    /**
     * Gets the description
     *
     * @return $description string
    */
    public function getDescription(){
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param $description string
    */
    public function setDescription($description){
        $description = trim($description);
        $this->description = $description;
    }

    /**
     * Gets the number of pages
     *
     * @return $pages int
    */
    public function getPages(){
        return $this->pages;
    }

    /**
     * Sets the number of pages
     *
     * @param $pages int
    */
    public function setPages($pages){
        $this->pages = $pages;
    }

    /**
     * Gets the language
     *
     * @return $languages string
    */
    public function getLanguages(){
        return $this->languages;
    }

    /**
     * Sets the language
     *
     * @param $languages string
    */
    public function setLanguages($languages){
        $this->languages = $languages;
    }

    /**
     * Gets the ISBN
     *
     * @return $isbn string
    */
    public function getIsbn(){
        return $this->isbn;
    }

    /**
     * Sets the ISBN
     *
     * @param $isbn string
    */
    public function setIsbn($isbn){
        $isbn = trim($isbn);
        $this->isbn = $isbn;
    }

    /**
     * Gets the total rating
     *
     * @return $rating_value float
    */
    public function getRatingValue(){
        return $this->rating_value;
    }

    /**
     * Sets the total rating
     *
     * @param $rating_value float
    */
    public function setRatingValue($rating_value){
        $this->rating_value = $rating_value;
    }

    /**
     * Gets the number of ratings
     *
     * @return $rating_count string
    */
    public function getRatingCount(){
        return $this->rating_count;
    }

    /**
     * Sets the number of ratings
     *
     * @param $rating_count string
    */
    public function setRatingCount($rating_count){
        $this->rating_count = $rating_count;
    }

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);
        return array_filter($vars, function ($value) {
            return null !== $value;
        });
    }

}
