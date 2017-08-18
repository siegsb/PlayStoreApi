<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \SiegSB\PlayExtractor;
use \PHPUnit\Framework\TestCase;

class DetailsTest extends TestCase
{

    private $playExtractor;

    public function setUp()
    {
        $this->playExtractor = new PlayExtractor('en', 'US');
    }

    public function testAlbum()
    {
        $albumId = 'B3elnigbzxoss3cmrfwgyxtyv2m';
        $album = $this->playExtractor->details->album($albumId);
        $this->assertEquals($album->getAlbumId(), $albumId);
    }

    public function testApp()
    {
        $package = 'com.whatsapp';
        $app = $this->playExtractor->details->app($package);
        $this->assertEquals($app->getPackage(), $package);
    }

    public function testArtist()
    {
        $artistId = 'Ae3hkk6q7nm6zchy7ru4u5sxdle';
        $artist = $this->playExtractor->details->artist($artistId);
        $this->assertEquals($artist->getArtistId(), $artistId);
    }

    public function testBook()
    {
        $bookId = 'vfFhxYwjgK8C';
        $book = $this->playExtractor->details->book($bookId);
        $this->assertEquals($book->getBookId(), $bookId);
    }

}
