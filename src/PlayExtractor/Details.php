<?php
namespace SiegSB\PlayExtractor;

require_once __DIR__ . '/Utils/simple_html_dom.php';

require_once __DIR__ . '/Data/Album.php';
require_once __DIR__ . '/Data/App.php';
require_once __DIR__ . '/Data/Artist.php';
require_once __DIR__ . '/Data/Book.php';

/**
 * Request info from Play Store of different kinds of contents
 *
 * @package PlayExtractor\Details
 */
class Details
{

    private $bridge;

    private $htmldom;

    /**
     * @param $bridge \SiegSB\PlayExtractor. A valid instance of PlayExtractor
    */
    public function __construct(\SiegSB\PlayExtractor $bridge)
    {
        if($bridge == null) {
            throw new \Exception('The PlayExtractor instance is empty');
        }
        $this->bridge = $bridge;
        $this->htmldom = new \simple_html_dom();
    }

    /**
     * Gets the details of an album in the Google Play Store.
     *
     * @param $album_id string. The id of the album to retrieve
     * @return An Album object with the details of the album requested or an Exception if the album no exist
     */
    public function album($album_id)
    {
        $url = 'https://play.google.com/store/music/album?id=' . $album_id . '&gl=' . $this->bridge->getCountry() . '&hl=' . $this->bridge->getLanguage();
        $html = $this->bridge->curlExec($url);
        $result = $this->processDetails($html);
        $image = substr($result->find('.cover-image', 0)->src, 0, - 5);
        $title = $result->find('.document-title', 0)->first_child()->plaintext;
        $artist = $result->find('a[class=document-subtitle primary]', 0)->plaintext;
        $artisthref = $result->find('a[class=document-subtitle primary]', 0)->href;
        $artistid = substr($artisthref, strpos($artisthref, '?id=') + 4);
        if ($result->find('meta[itemprop=price]', 0) != null) {
            $price = $result->find('meta[itemprop=price]', 0)->content;
        }
        if ($result->find('.description', 0) != null) {
            if ($result->find('.description', 0)->find('meta[itemprop=description]', 0) != null) {
                $description = $result->find('.description', 0)->find('meta[itemprop=description]', 0)->content;
            }
        }
        $genre = trim($result->find('a[class=document-subtitle category]', 0)->plaintext);
        $tracks = count($result->find('.track-list-row'));
        if ($result->find('meta[itemprop=ratingValue]', 0) != null) {
            $rating_value = floatval($result->find('meta[itemprop=ratingValue]', 0)->content);
        }
        if ($result->find('meta[itemprop=ratingCount]', 0) != null) {
            $rating_count = intval($result->find('meta[itemprop=ratingCount]', 0)->content);
        }
        $album = new Data\Album();
        $album->setAlbumId($album_id);
        $album->setUrl($url);
        if (isset($image)) {
            $album->setImage($image);
        }
        if (isset($title)) {
            $album->setTitle($title);
        }
        if (isset($artist)) {
            $album->setArtist($artist);
        }
        if (isset($artistid)) {
            $album->setArtistId($artistid);
        }
        if (isset($price)) {
            $album->setPrice($price);
        }
        if (isset($description)) {
            $album->setDescription($description);
        }
        if (isset($genre)) {
            $album->setGenre($genre);
        }
        if (isset($tracks)) {
            $album->setTracks($tracks);
        }
        if (isset($rating_value)) {
            $album->setRatingValue($rating_value);
        }
        if (isset($rating_count)) {
            $album->setRatingCount($rating_count);
        }
        $this->htmldom->clear();
        return $album;
    }

    /**
     * Gets the details of an app in the Google Play Store.
     *
     * @param $package string. The package name of the app to retrieve
     * @return An App object with the details of the app requested or an Exception if the app no exist
     */
    public function app($package)
    {
        $url = 'https://play.google.com/store/apps/details?id=' . $package . '&gl=' . $this->bridge->getCountry() . '&hl=' . $this->bridge->getLanguage();
        $html = $this->bridge->curlExec($url);
        $result = $this->processDetails($html);
        $icon = substr($result->find('img[class=T75of ujDFqe]', 0)->src, 0, -5);
        $name = $result->find('.AHFaub', 0)->plaintext;
        $category = $result->find('a[itemprop=genre]', 0)->plaintext;
        $developer = $result->find('a[class=hrTbp R8zArc]', 0)->plaintext;

        if ($result->find('meta[itemprop=price]', 0) != null) {
            $price = $result->find('meta[itemprop=price]', 0)->content;
        }

        if ($result->find('meta[itemprop=description]', 0) != null) {
            $description = $result->find('meta[itemprop=description]', 0)->content;
        }

        if ($result->find('meta[itemprop=ratingValue]', 0) != null) {
            $rating_value = floatval($result->find('meta[itemprop=ratingValue]', 0)->content);
        }

        if ($result->find('meta[itemprop=reviewCount]', 0) != null) {
            $rating_count = intval($result->find('meta[itemprop=reviewCount]', 0)->content);
        }

        if ($result->find('div[class=xyOfqd]', 0)->find('div[class=hAyfc]', 0) != null) {
            $date_updated = $result->find('div[class=xyOfqd]', 0)
                ->find('div[class=hAyfc]', 0)
                ->find('span[class=htlgb]', 0)
                ->plaintext;
        }

        if ($result->find('div[class=xyOfqd]', 0)->find('div[class=hAyfc]', 1) != null) {
            $file_size = $result->find('div[class=xyOfqd]', 0)
                ->find('div[class=hAyfc]', 1)
                ->find('span[class=htlgb]', 0)
                ->plaintext;
        }

        if ($result->find('div[class=xyOfqd]', 0)->find('div[class=hAyfc]', 2) != null) {
            $num_downloads = $result->find('div[class=xyOfqd]', 0)
                ->find('div[class=hAyfc]', 2)
                ->find('span[class=htlgb]', 0)
                ->plaintext;
        }

        if ($result->find('div[class=xyOfqd]', 0)->find('div[class=hAyfc]', 3) != null) {
            $version = $result->find('div[class=xyOfqd]', 0)
                ->find('div[class=hAyfc]', 3)
                ->find('span[class=htlgb]', 0)
                ->plaintext;
        }

        if ($result->find('div[class=xyOfqd]', 0)->find('div[class=hAyfc]', 4) != null) {
            $req_android = $result->find('div[class=xyOfqd]', 0)
                ->find('div[class=hAyfc]', 4)
                ->find('span[class=htlgb]', 0)
                ->plaintext;
        }

        if ($result->find('img[class=T75of pTsWIc]', 0) != null) {
            $content_rating = $result->find('img[class=T75of pTsWIc]', 0)->alt;
        }

        if ($result->find('div[class=xyOfqd]', 0)->find('div[class=hAyfc]', 7) != null) {
            $in_app_prices = $result->find('div[class=xyOfqd]', 0)
                ->find('div[class=hAyfc]', 7)
                ->find('span[class=htlgb]', 0)
                ->plaintext;
            if (!preg_match('/\$[0-9\.]+ - \$[0-9.]+/', $in_app_prices)) {
                $in_app_prices = null;
                }
        }

        if ($result->find('div[class=rxic6]', 0) != null) {
            $features = explode('&middot;', $result->find('div[class=rxic6]', 0)->plaintext);
        }

        $app = new Data\App();
        $app->setPackage($package);
        $app->setUrl($url);
        if (isset($icon)) {
            $app->setIcon($icon);
        }
        if (isset($name)) {
            $app->setName($name);
        }
        if (isset($developer)) {
            $app->setDeveloper($developer);
        }
        if (isset($price)) {
            $app->setPrice($price);
        }
        if (isset($description)) {
            $app->setDescription($description);
        }
        if (isset($category)) {
            $app->setCategory($category);
        }
        if (isset($rating_value)) {
            $app->setRatingValue($rating_value);
        }
        if (isset($rating_count)) {
            $app->setRatingCount($rating_count);
        }
        if (isset($date_updated)) {
            $app->setDateUpdated($date_updated);
        }
        if (isset($file_size)) {
            $app->setFileSize($file_size);
        }
        if (isset($num_downloads)) {
            $app->setNumDownloads($num_downloads);
        }
        if (isset($version)) {
            $app->setVersion($version);
        }
        if (isset($req_android)) {
            $app->setRequiredAndroid($req_android);
        }
        if (isset($content_rating)) {
            $app->setContentRating($content_rating);
        }
        if (isset($features)) {
            $app->setFeatures($features);
        }
        if (isset($in_app_prices)) {
            $app->setInAppPrices($in_app_prices);
        }
        $this->htmldom->clear();
        return $app;
    }

    /**
     * Gets the details of an artist in the Google Play Store.
     *
     * @param $artist_id string. The id of the artist to retrieve
     * @return An Artist object with the details of the artist requested or an Exception if the artist no exist
     */
    public function artist($artist_id)
    {
        $url = 'https://play.google.com/store/music/artist?id=' . $artist_id . '&gl=' . $this->bridge->getCountry() . '&hl=' . $this->bridge->getLanguage();
        $html = $this->bridge->curlExec($url);
        $result = $this->processDetails($html);
        $image = substr($result->find('.cover-image', 0)->src, 0, - 5);
        $name = $result->find('.document-title', 0)->first_child()->plaintext;
        if ($result->find('meta[itemprop=description]', 0) != null) {
            $about = $result->find('meta[itemprop=description]', 0)->content;
        }
        $artist = new Data\Artist();
        $artist->setArtistId($artist_id);
        $artist->setUrl($url);
        if (isset($image)) {
            $artist->setImage($image);
        }
        if (isset($name)) {
            $artist->setName($name);
        }
        if (isset($about)) {
            $artist->setAbout($about);
        }
        $this->htmldom->clear();
        return $artist;
    }

    /**
     * Gets the details of a book in the Google Play Store.
     *
     * @param $book_id string. The id of the book to retrieve
     * @return A Book object with the details of the book requested or an Exception if the book no exist
     */
    public function book($book_id)
    {
        $url = 'https://play.google.com/store/books/details?id=' . $book_id . '&gl=' . $this->bridge->getCountry() . '&hl=' . $this->bridge->getLanguage();
        $html = $this->bridge->curlExec($url);
        $result = $this->processDetails($html);
        $image = substr($result->find('.cover-image', 0)->src, 0, - 10);
        $title = $result->find('.document-title', 0)->first_child()->plaintext;
        $author = $result->find('.book-author-last', 0)->plaintext;
        if ($result->find('meta[itemprop=price]', 0) != null) {
            $price = $result->find('meta[itemprop=price]', 0)->content;
        }
        if ($result->find('meta[itemprop=description]', 0) != null) {
            $description = $result->find('meta[itemprop=description]', 0)->content;
        }
        $pages = $result->find('span[itemprop=numberOfPages]', 0)->plaintext;
        $language = $result->find('div[itemprop=inLanguage]', 0)->plaintext;
        $isbn = $result->find('div[itemprop=isbn]', 0)->plaintext;
        if ($result->find('meta[itemprop=ratingValue]', 0) != null) {
            $rating_value = floatval($result->find('meta[itemprop=ratingValue]', 0)->content);
        }
        if ($result->find('meta[itemprop=ratingCount]', 0) != null) {
            $rating_count = intval($result->find('meta[itemprop=ratingCount]', 0)->content);
        }
        $book = new Data\Book();
        $book->setBookId($book_id);
        $book->setUrl($url);
        if (isset($image)) {
            $book->setImage($image);
        }
        if (isset($title)) {
            $book->setTitle($title);
        }
        if (isset($author)) {
            $book->setAuthor($author);
        }
        if (isset($price)) {
            $book->setPrice($price);
        }
        if (isset($description)) {
            $book->setDescription($description);
        }
        if (isset($pages)) {
            $book->setPages($pages);
        }
        if (isset($language)) {
            $book->setLanguages($language);
        }
        if (isset($isbn)) {
            $book->setIsbn($isbn);
        }
        if (isset($rating_value)) {
            $book->setRatingValue($rating_value);
        }
        if (isset($rating_count)) {
            $book->setRatingCount($rating_count);
        }
        $this->htmldom->clear();
        return $book;
    }

    private function processDetails($html)
    {
        $pos = stripos($html, "We're sorry, the requested URL was not found on this server.");
        if ($pos !== false) {
            throw new \Exception('No results found');
        }
        return $this->htmldom->load($html);
    }

}
