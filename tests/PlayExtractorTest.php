<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \SiegSB\PlayExtractor;

class PlayExtractorTest extends PHPUnit_Framework_TestCase
{

    private $playExtractor;

    public function setUp()
    {
        $this->playExtractor = new PlayExtractor('es', 'MX');
    }

    public function testSetLanguage()
    {
        $language = 'pt';
        $this->playExtractor->setLanguage($language);
        $this->assertEquals($this->playExtractor->getLanguage(), $language);
    }

    public function testSetCountry()
    {
        $country = 'BR';
        $this->playExtractor->setCountry($country);
        $this->assertEquals($this->playExtractor->getCountry(), $country);
    }

    public function testCurlExec()
    {
        $body = $this->playExtractor->curlExec('https://www.google.com');
        $this->assertTrue($body !== null);
    }

}
