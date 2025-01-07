<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Series;

use Chronoarc\Marvel\Dto\SeriesDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getSeriesIndividual
 *
 * This method fetches a single comic series resource.  It is the canonical URI for any comic series
 * resource provided by the API.
 */
class GetSeriesEntry extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $seriesId Filter by series title.
     */
    public function __construct(
        protected int $seriesId,
    )
    {
    }

    /**
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/series/$this->seriesId";
    }


    /**
     * @param Response $response
     * @return SeriesDataWrapper
     * @throws JsonException
     * @throws InvalidAttributeTypeException
     */
    public function createDtoFromResponse(Response $response): SeriesDataWrapper
    {
        return SeriesDataWrapper::fromJson($response->json());
    }
}
