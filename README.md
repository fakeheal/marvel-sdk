# 🦸 Marvel PHP SDK

[![Tests](https://github.com/fakeheal/marvel-sdk/actions/workflows/php.yml/badge.svg)](https://github.com/fakeheal/marvel-sdk/actions/workflows/php.yml)
![Packagist Version](https://img.shields.io/packagist/v/chronoarc/marvel)
![Packagist Downloads](https://img.shields.io/packagist/dt/chronoarc/marvel)

Welcome to the **Marvel PHP SDK**, a lightweight and easy-to-use SDK designed to interact with
the [Marvel API](https://developer.marvel.com/), built on top of the robust [Saloon](https://docs.saloon.dev)
library.

## 🚧 Progress

- [ ] Use enums for query parameters:
    - [x] Comic:
        - `OrderBy` in query params
        - `Format` in query params and dto
        - `FormatType` in query params
    - [ ] Character
    - [ ] Events
    - [ ] Stories
    - [ ] Creators
    - [ ] Series
- Convert all dates to `DateTime` objects
- [ ] Tests
- [ ] Submit to Packagist

## 🚀 Getting Started

### Installation

You can install the SDK via Composer:

```bash
composer require chronoarc/marvel
```

### Usage

```php
require 'vendor/autoload.php';

$publicKey = 'your-public-key-here';
$privateKey = 'your-private-key-here';

$marvel = new  Chronoarc\Marvel\Marvel($publicKey, $privateKey);

$superhero = ['name' => 'Spider-Man (Peter Parker)', 'id' => 1009610];

$characters = $marvel->characters()->search(name: $superhero['name']);
$characters->dto(); // Chronoarc\Marvel\Dto\CharacterDataWrapper

$character = $marvel->characters()->getCharacter($superhero['id']);
$character->dto(); // Chronoarc\Marvel\Dto\CharacterDataWrapper

$characterSeries = $marvel->characters()->getCharacterSeries($superhero['id']);
$characterSeries->dto(); // Chronoarc\Marvel\Dto\SeriesDataWrapper

$characterComics = $marvel->characters()->getCharacterComics($superhero['id']);
$characterComics->dto(); // Chronoarc\Marvel\Dto\ComicDataWrapper

$characterEvents = $marvel->characters()->getCharacterEvents($superhero['id']);
$characterEvents->dto(); // Chronoarc\Marvel\Dto\EventDataWrapper

$characterStories = $marvel->characters()->getCharacterStories($superhero['id']);
$characterStories->dto(); // Chronoarc\Marvel\Dto\StoryDataWrapper
```

### Advanced

Additionally, you can use the provided enums for query parameters:

```php  
use Chronoarc\Marvel\Enums\Comic\OrderBy;
use Chronoarc\Marvel\Enums\Comic\Format;

...

/** @var ComicDataWrapper $comics */
$comics = $this->connector->comics()->search(
  format: Format::comic,
  orderBy: [OrderBy::titleAsc],
)->dto();
```

**Note**: DTOs also have enums for their properties, so you can use them to access the data in a more predictable way.

## 🤝 Contributions Welcome

Your feedback and contributions are highly appreciated! Whether it’s submitting an issue, suggesting improvements, or
adding new features, every bit helps make this SDK better for everyone.

---

Feel free to fork the repository, make pull requests, or just share ideas! Let's make this SDK awesome together.

## 📝 License

MIT

## ChronoArc

<p align="center">
<img src="./chronoarc.png" alt="ChronoArc" />
</p>

This SDK is made for ChronoArc, an app I am trying to build an app that lets you create reading guides, subscribe to
already created guides, and track your
progress towards reading a specific guide.

There's another SDK that uses Comicvine API, which is also part of the ChronoArc project. You can check it
out at [chronoarc/comicvine-sdk](https://github.com/fakeheal/comicvine-sdk).