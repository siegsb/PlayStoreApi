# Play Extractor
This project is a fork of [PlayStoreApi project][1] but isn't related in any way with that project. Thanks to [RedInput][2], developer of the original library on which this is based.

Play Extractor provides a Composer PHP library to extract info from Play Store for differents items like music albums, apps, movies and more.  
Don't requires any kind of authentication and support all the languages and countries availables on Play Store web.

## Installation
Coming soon...

## Usage
First of all include the `API.php` file into your PHP script:

```php
include_once 'library/API.php';
```

Then you can create an PlayStoreApi object and configure it:

```php
$api = new PlayStoreApi();
$api->setCountryCode("ES");   // Pass a valid 2 letters ISO country code (ISO 3166 alpha-2) (default: "US")
$api->setLanguageCode("es");  // Pass a valid 2 letters ISO language code (ISO 639-1) (default: "en")
```

And last you can search for any type of data available on the Play Store:

```php
/*
* All of the following methods have the same structure
*
* @param $query string Term to search on the Google Play Store (mandatory)
* @param $page string PageToken of the page to load (if not set it'll load the first) (optional)
*/
$api->searchAlbums($query, $page);
$api->searchApps($query, $page);
$api->searchArtists($query, $page);
$api->searchBooks($query, $page);
$api->searchDevices($query, $page);
$api->searchMagazines($query, $page);
$api->searchMovies($query, $page);
$api->searchNewspapers($query, $page);
$api->searchSongs($query, $page);
$api->searchTvEpisodes($query, $page);
$api->searchTvShows($query, $page);
```

## Output
Every search method will return a json string formatted like the following:

```json
{
  "nextPageToken": "string with the pagetoken to load the next page of results",
  "items": "array of objects with variable structure depending of the type of the data searched"
}
```

The structure of every type data are the following _(all values are optional)_:

### Album

```json
{
  "album_id"
  "image"
  "title"
  "artist"
  "artist_id"
  "price"
  "url"
  "description"
  "genre"
  "tracks"
  "rating_value"
  "rating_count"
}
```

### App

```json
{
  "package"
  "icon"
  "name"
  "developer"
  "price"
  "url"
  "description"
  "category"
  "rating_value"
  "rating_count"
  "file_size"
  "date_updated"
  "num_downloads"
  "version"
  "required_android"
  "content_rating"
}
```

### Artist

```json
{
  "artist_id"
  "image"
  "name"
  "url"
  "about"
}
```

### Book

```json
{
  "book_id"
  "image"
  "title"
  "author"
  "price"
  "url"
  "description"
  "pages"
  "languages"
  "isbn"
  "rating_value"
  "rating_count"
}
```

### Device

```json
{
  "device_id"
  "image"
  "title"
  "price"
  "url"
}
```

### Magazine

```json
{
  "magazine_id"
  "image"
  "title"
  "price"
  "url"
}
```

### Movie

```json
{
  "movie_id"
  "image"
  "title"
  "category"
  "price"
  "url"
}
```

### Newspaper

```json
{
  "newspaper_id"
  "image"
  "title"
  "price"
  "url"
}
```

### Song

```json
{
  "album_id"
  "song_id"
  "image"
  "title"
  "artist"
  "artist_id"
  "price"
  "url"
}
```

### TV Episode

```json
{
  "episode_id"
  "season_id"
  "show_id"
  "image"
  "episode_title"
  "show_title"
  "date"
  "price"
  "url"
}
```

### TV Show

```json
{
  "show_id"
  "image"
  "title"
  "category"
  "price"
  "url"
}
```

#### Empty output
If the search doesn't return any result or the data type isn't available in the country configured the output will look like this:

```json
{
  "msg": "No results found"
}
```

[1]: https://github.com/RedInput/PlayStoreApi
[2]: https://github.com/RedInput