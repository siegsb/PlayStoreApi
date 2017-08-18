<?php
namespace SiegSB\PlayExtractor\Data;

/**
 * Album data object
 *
 * @package PlayExtractor\Data\Album
*/
class Album implements \JsonSerializable
{

    private $album_id;

    private $image;

    private $title;

    private $artist;

    private $artist_id;

    private $price;

    private $url;

    private $description;

    private $genre;

    private $tracks;

    private $rating_value;

    private $rating_count;

    /**
     * Gets the album ID
     *
     * @return $album_id string
    */
    public function getAlbumId()
    {
        return $this->album_id;
    }

    /**
     * Sets the album ID
     *
     * @param $album_id string
    */
    public function setAlbumId($album_id)
    {
        $album_id = trim($album_id);
        $this->album_id = $album_id;
    }

    /**
     * Gets the album cover URL
     *
     * @return $image string
    */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image URL
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
     * Gets the title of the album
     *
     * @return $title string
    */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param $title string
    */
    public function setTitle($title)
    {
        $title = trim($title);
        $this->title = $title;
    }

    /**
     * Gets the artist name
     *
     * @return $artist string
    */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Sets the artist name
     *
     * @param $artist string
    */
    public function setArtist($artist)
    {
        $artist = trim($artist);
        $this->artist = $artist;
    }

    /**
     * Gets the artist ID
     *
     * @return $artist_id string
    */
    public function getArtistId()
    {
        return $this->artist_id;
    }

    /**
     * Sets the artist ID
     *
     * @param $artist_id string
    */
    public function setArtistId($artist_id)
    {
        $artist_id = trim($artist_id);
        $this->artist_id = $artist_id;
    }

    /**
     * Gets the price
     *
     * @return $price string
    */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
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
        $this->description = $description;
    }

    /**
     * Gets the genre
     *
     * @return $genre string
    */
    public function getGenre(){
        return $this->genre;
    }

    /**
     * Sets the genre
     *
     * @param $genre string
    */
    public function setGenre($genre){
        $this->genre = $genre;
    }

    /**
     * Gets the number of tracks
     *
     * @return $tracks int
    */
    public function getTracks(){
        return $this->tracks;
    }

    /**
     * Sets the number of tracks
     *
     * @param $tracks int
    */
    public function setTracks($tracks){
        $this->tracks = $tracks;
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
