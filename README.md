# GrimRipper ![](https://img.shields.io/github/license/charleshacks/grimripper.svg)

GrimRipper downloads SoundCloud tracks and outputs an RSS feed of track metadata and MP3 links.

## Getting started

These instructions will have you up and running with GrimRipper in no time.

### Prerequisites

All you need is `PHP` >= 7.1 and `youtube-dl`, plus the web server of your choice. Composer should also be available for installing packages.

Since GrimRipper uses a flatfile database, no database server is required.

### Installing

Clone the repository to a folder of your choice.

```
git clone git@github.com:CharlesHacks/GrimRipper.git
```

Install Composer dependencies

```
composer install
```

Copy `.env.example` to `.env` and add the hostname of your server.

```
PUBLIC_URL=https://example.com/
```

Configure your webserver to serve the `public/` directory, and you're off to the races!

## Usage

### Adding new content

From the command line, just run `php download` with the SoundCloud URL of a track you would like to download.

```
php download https://soundcloud.com/foo/bar
```

### Retreiving content

Your XML feed will be stored at `public/feed.xml` and updated every time you add new content. Downloaded MP3s are stored in `public/downloads`.

## Tests

Unit tests will be written eventually. Feel free to submit a PR!

## Acknowledgments

GrimRipper relies on the following PHP packages.

* [norkunas/youtube-dl-php](https://github.com/norkunas/youtube-dl-php)
* [filebase/Filebase](https://github.com/filebase/Filebase)
* [symfony/dotenv](https://github.com/symfony/dotenv)

## License

This project is open-source software under the [MIT license](LICENSE.md).