<?php
namespace SiegSB\PlayExtractor\Data;

/**
 * @package PlayExtractor\Data\Artist
*/
class Artist implements \JsonSerializable
{

    private $artist_id;

    private $image;

    private $name;

    private $url;

    private $about;

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
     * Gets the artist name
     *
     * @return $name string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the artist name
     *
     * @param $name string
    */
    public function setName($name)
    {
        $name = trim($name);
        $this->name = $name;
    }

    /**
     * Gets the artist image
     *
     * @return $image string
    */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the artist image
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
     * Gets the artist biography
     *
     * @return $about string
    */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Sets the artist biography
     *
     * @param $about string
    */
    public function setAbout($about)
    {
        $about = trim($about);
        $this->about = $about;
    }

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);
        return array_filter($vars, function ($value) {
            return null !== $value;
        });
    }

}
