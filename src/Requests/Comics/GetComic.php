<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Comics;

use Chronoarc\Marvel\Dto\ComicDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getComicIndividual
 *
 * This method fetches a single comic resource.  It is the canonical URI for any comic resource
 * provided by the API.
 */
class GetComic extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $comicId A single comic.
     */
    public function __construct(
        protected int $comicId,
    )
    {
    }

    /**
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/comics/$this->comicId";
    }

    /**
     * @param Response $response
     * @return ComicDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): ComicDataWrapper
    {
        return ComicDataWrapper::fromJson($response->json());
    }
}
