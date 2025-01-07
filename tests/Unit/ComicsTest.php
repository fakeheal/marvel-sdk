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

    $publicKey = getenv('MARVEL_API_PUBLIC_KEY');
    $privateKey = getenv('MARVEL_API_PRIVATE_KEY');

    $this->connector = new Marvel($publicKey, $privateKey);
    $this->connector->withMockClient($this->mockClient);
});

test('it can search for comics', function () {
    $result = $this->connector->comics()->search(
        format: Format::comic,
        orderBy: [OrderBy::titleAsc],
    );

    /** @var ComicDataWrapper $comics */
    $comics = $result->dto();

    expect($comics->data->results)->toHaveCount(20);
});
