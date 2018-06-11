<?php

// Importing the autoload
require_once __DIR__ . '/../src/PlayExtractor.php';

// Define the namespace to use PlayExtractor
use \SiegSB\PlayExtractor;

try {
    /**
     * Create a new PlayExtractor instance
     * @param string language. The language in ISO-2 format to use with Play Store
     * @param string country. The country code in ISO-2 format to use with Play Store
    */
    $playExtractor = new PlayExtractor('en', 'US');

    /**
     * Getting details for album
     * @param string albumId. The ID of the artist
     * @return Album object with the the album details or an exception if not results found
    */
    $album = $playExtractor->details->album('B3elnigbzxoss3cmrfwgyxtyv2m');
    // Print the album details as JSON object
    echo "Album details:\n";
    print json_encode($album, JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo "\n\n";

    /**
     * Getting details for app
     * @param string packageName. The package name of the app (example: com.example.app)
     * @return App object with the app details or an exception if not results found
    */
    $app = $playExtractor->details->app('com.whatsapp');
    // Print the app details as JSON object
    echo "App details:\n";
    print json_encode($app, JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo "\n\n";

    /**
     * Getting details for artist
     * @param string artistId. The ID of the artist
     * @return Artist object with the artist details or an exception if not results found
    */
    $artist = $playExtractor->details->artist('Ae3hkk6q7nm6zchy7ru4u5sxdle');
    // Print the artist details as JSON object
    echo "Artist details:\n";
    print json_encode($artist, JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo "\n\n";

    /**
     * Getting details for book
     * @param string bookId. The ID of the book
     * @return Book object with the book details or an exception if not results found
    */
    $book = $playExtractor->details->book('vfFhxYwjgK8C');
    // Print the book details as JSON object
    echo "Book details:\n";
    print json_encode($book, JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    echo "\n\n";

    /**
     * Throwing an exception when the app is not in Play Store
    */
    $app_exception = $playExtractor->details->app('exception.test');

} catch(\SiegSB\PlayExtractor\Utils\PlayExtractorException $e) {
    // print the exception
    echo $e->__toString();
}
