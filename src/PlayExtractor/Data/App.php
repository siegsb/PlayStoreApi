<?php
namespace SiegSB\PlayExtractor\Data;

/**
 * @package PlayExtractor\Data\App
*/
class App implements \JsonSerializable
{

    private $package;

    private $icon;

    private $name;

    private $developer;

    private $price;

    private $url;

    private $description;

    private $category;

    private $rating_value;

    private $rating_count;

    private $file_size;

    private $date_updated;

    private $num_downloads;

    private $version;

    private $required_android;

    private $content_rating;

    /**
     * Gets the package name
     *
     * @return $package string
    */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Sets the package name
     *
     * @param $package string
    */
    public function setPackage($package)
    {
        $package = trim($package);
        $this->package = $package;
    }

    /**
     * Gets the icon URL
     *
     * @return $icon string
    */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Sets the icon URL
     *
     * @param $icon string
    */
    public function setIcon($icon)
    {
        $icon = trim($icon);
        if (substr($icon, 0, 2) === '//') {
            $icon = 'http:'.$icon;
        }
        $this->icon = $icon;
    }

    /**
     * Gets the app name
     *
     * @return $name string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the app name
     *
     * @param $name string
    */
    public function setName($name)
    {
        $name = trim($name);
        $this->name = $name;
    }

    /**
     * Gets the developer name
     *
     * @return $developer string
    */
    public function getDeveloper()
    {
        return $this->developer;
    }

    /**
     * Sets the developer name
     *
     * @param $developer string
    */
    public function setDeveloper($developer)
    {
        $developer = trim($developer);
        $this->developer = $developer;
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
        $this->description = $description;
    }

    /**
     * Gets the category
     *
     * @return $category string
    */
    public function getCategory(){
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param $category string
    */
    public function setCategory($category){
        $category = trim($category);
        $this->category = $category;
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

    /**
     * Gets the APK size
     *
     * @return $file_size string
    */
    public function getFileSize(){
        return $this->file_size;
    }

    /**
     * Sets the APK size
     *
     * @param $file_size string
    */
    public function setFileSize($file_size){
        $file_size=trim($file_size);
        $this->file_size = $file_size;
    }

    /**
     * Gets the last update date
     *
     * @return $data_updated string
    */
    public function getDateUpdated(){
        return $this->date_updated;
    }

    /**
     * Sets the last update date
     *
     * @param $data_updated string
    */
    public function setDateUpdated($date_updated){
        $this->date_updated = $date_updated;
    }

    /**
     * Gets the number of downloads
     *
     * @return $num_downloads string
    */
    public function getNumDownloads(){
        return $this->num_downloads;
    }

    /**
     * Sets the number of downloads
     *
     * @param $num_downloads string
    */
    public function setNumDownloads($num_downloads){
        $num_downloads=trim($num_downloads);
        $this->num_downloads = $num_downloads;
    }

    /**
     * Gets the version
     *
     * @return $version string
    */
    public function getVersion(){
        return $this->version;
    }

    /**
     * Sets the version
     *
     * @param $version string
    */
    public function setVersion($version){
        $version=trim($version);
        $this->version = $version;
    }

    /**
     * Gets the minimum Android version
     *
     * @return $required_android string
    */
    public function getRequiredAndroid(){
        return $this->required_android;
    }

    /**
     * Sets the minimum Android version
     *
     * @param $required_android string
    */
    public function setRequiredAndroid($required_android){
        $required_android=trim($required_android);
        $this->required_android = $required_android;
    }

    /**
     * Gets the content rating
     *
     * @return $content_rating string
    */
    public function getContentRating(){
        return $this->content_rating;
    }

    /**
     * Sets the content rating
     *
     * @param $content_rating string
    */
    public function setContentRating($content_rating){
        $this->content_rating = $content_rating;
    }

    public function JsonSerialize()
    {
        $vars = get_object_vars($this);
        return array_filter($vars, function ($value) {
            return null !== $value;
        });
    }

}
