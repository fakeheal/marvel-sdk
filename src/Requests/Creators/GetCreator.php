<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Creators;

use Chronoarc\Marvel\Dto\CreatorDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getCreatorIndividual
 *
 * This method fetches a single creator resource.  It is the canonical URI for any creator resource
 * provided by the API.
 */
class GetCreator extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $creatorId A single creator id.
     */
    public function __construct(
        protected int $creatorId,
    )
    {
    }


    /**
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/creators/$this->creatorId";
    }


    /**
     * @param Response $response
     * @return CreatorDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws JsonException
     */

    public function createDtoFromResponse(Response $response): CreatorDataWrapper
    {
        return CreatorDataWrapper::fromJson($response->json());
    }
}
