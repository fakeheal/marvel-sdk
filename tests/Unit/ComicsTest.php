<?php

use Chronoarc\Marvel\Dto\Comic\ComicDataWrapper;
use Chronoarc\Marvel\Enums\Comic\Format;
use Chronoarc\Marvel\Enums\Comic\OrderBy;
use Chronoarc\Marvel\Marvel;
use Chronoarc\Marvel\Requests\Comics\GetComics;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

beforeEach(function () {
    $this->mockClient = new MockClient([
        GetComics::class => MockResponse::fixture('search-comics')
    ]);

    $this->connector = new Marvel($_ENV['MARVEL_API_PUBLIC_KEY'], $_ENV['MARVEL_API_PRIVATE_KEY']);
    $this->connector->withMockClient($this->mockClient);
});

test('it can search for comics', function () {
    /** @var ComicDataWrapper $comics */
    $comics = $this->connector->comics()->search(
        format: Format::comic,
        orderBy: [OrderBy::titleAsc],
    )->dto();

    expect($comics->data->results)->toHaveCount(20);
});
