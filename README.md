# PlayExtractor [![Build Status](https://travis-ci.org/siegsb/play-extractor.svg?branch=master)](https://travis-ci.org/siegsb/play-extractor)
This project is a fork of [PlayStoreApi project][1] but isn't related in any way with that project. Thanks to [RedInput][2], developer of the original library on which this is based.

Play Extractor provides a Composer PHP library to extract info from Play Store for differents items like albums, apps, artists and more.  
Don't requires any kind of authentication and support all the languages and countries availables on Play Store website.

## Installation
The best method to install PlayExtractor in your PHP project is using Composer, just add the following line to your require:

    "siegsb/play-extractor": "1.0.*"

Then update your Composer project using *composer update*. Also you can clone this repository to your project path but the recomended method is via Composer.

## Usage
First include the autoload.php file into your PHP script and set the namespace to use:

```php
require_once __DIR__ . '/vendor/autoload.php';  
use \SiegSB\PlayExtractor;
```

Then you can create a new PlayExtractor object with the locale and country params using ISO-2 format:

```php
$playExtractor = new PlayExtractor('en', 'US');
```

Now you can request the details of any kind of content available on Play Store:

```php
/**  
* @param $contentId string. The unique ID for the content, see the Supported Contents to more information  
* @return $details DataObject. The details of the content as a object of the requested content, see the Supported Contents to more information  
*/  
$playExtractor->details->album($contentId);  
$playExtractor->details->app($contentId);  
$playExtractor->details->artist($contentId);  
$playExtractor->details->book($contentId);  
```

## Supported Contents
Right now PlayExtractor support the following contents, in each item you can see more information:

### Album
This object have the following methods:

```php
// Returns the album ID, the same that you use when you call $playExtractor->details->album()  
$album->getAlbumId();  
// Returns the URL of the album cover  
$album->getImage();  
// Returns the title of the album  
$album->getTitle();  
// Returns the artist name  
$album->getArtist();  
// Returns the artist ID, you can use it to request the artist details  
$album->getArtistId();  
// Returns the price based on your PlayExtractor language and country configuration  
$album->getPrice();  
// Returns the Play Store URL of the album  
$album->getUrl();  
// Returns the description of the album  
$album->getDescription();  
// Returns the genre  
$album->getGenre();  
// Returns the number of tracks  
$album->getTracks();  
// Returns the total rating of the album as a float
$album->getRatingValue();  
// Returns the number of ratings  
$album->getRatingCount();  
```

### App
This object have the following methods:

```php
// Returns the package name, this is the contentId  
$app->getPackage();  
// Returns the URL of the icon like PNG  
$app->getIcon();  
// Returns the public name of the app  
$app->getName();  
// Returns the public name of the developer  
$app->getDeveloper();  
// Returns the price of the app based in your PlayExtractor configuration  
$app->getPrice();  
// Returns the Play Store URL of the app  
$app->getUrl();  
// Returns the app description  
$app->getDescription();  
// Returns the category  
$app->getCategory();  
// Returns the total rating of the app as a float  
$app->getRatingValue();  
// Returns the number of ratings  
$app->getRatingCount();  
// Returns the size of the APK file  
$app->getFileSize();  
// Returns the date of the last update as a string date format  
$app->getDateUpdated();  
// Returns the number of downloads  
$app->getNumDownloads();  
// Returns the current app version  
$app->getVersion();  
// Returns the minimum Android version that the app requires  
$app->getRequiredAndroid();  
// Returns the content rating  
$app->getContentRating();  
```

### Artist
This object have the following methods:

```php
// Returns the artist ID  
$artist->getArtistId();  
// Returns the URL of the artist image as PNG  
$artist->getImage();  
// Returns the public artist name  
$artist->getName();  
// Returns the Play Store URL of the artist  
$artist->getUrl();  
// Returns the biography of the artist  
$artist->getAbout();  
```

### Book
This object have the following methods:

```php
// Returns the book ID  
$book->getBookId();  
// Returns the URL of the book cover as PNG  
$book->getImage();  
// Returns the title  
$book->getTitle();  
// Returns the public author name  
$book->getAuthor();  
// Returns the price  
$book->getPrice();  
// Returns the Play Store URL of the book  
$book->getUrl();  
// Returns the description of the book  
$book->getDescription();  
// Returns the total number of pages  
$book->getPages();  
// Returns the language of the book  
$book->getLanguages();  
// Returns the ISBN code  
$book->getIsbn();  
// Returns the total rating as a float  
$book->getRatingValue();  
// Returns the number of ratings  
$book->getRatingCount();  
```

## Exceptions
If the language or country code is not valid for Play Store, or if the requested content do not exist, PlayExtractor returns an Exception.

## Tips
You can use the method *json_encode()* with any Data object to convert to JSON easily, for example:

```php
print json_encode($artist);
```

This returns the following JSON string:

```json
{
  "artist_id": "",  
  "image": "",  
  "name": "",  
  "url": "",  
  "about": ""  
}
```

## Colaborations and pull requests
To keep clean code, all the scripts of the library must be formated in PSR-2 and the autoloads in PSR-4 with namespaces. Try to keep the compatibility of the library with PHP 5.4 minimum. Don't modify the composer.json if not necessary and the build test with [Travis][3] is required.  
If you want to include a new function, please add the correct comments to your code using annotations and create the PHPUnit test cases in the *tests* path. Also you should be clear in your commits messages. Be care with the info of others developers and don't delete it from the composer file, also verify taht your info, if you want, are correct.  
Thanks!

[1]: https://github.com/RedInput/PlayStoreApi
[2]: https://github.com/RedInput
[3]: https://travis-ci.org/