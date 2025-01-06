<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Characters;

use Chronoarc\Marvel\Dto\CharacterDataWrapper;
use Chronoarc\Marvel\EmptyResponse;
use Chronoarc\Marvel\Request;
use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Request as Request1;
use Saloon\Http\Response;

/**
 * getCharacterIndividual
 *
 * This method fetches a single character resource.  It is the canonical URI for any character resource
 * provided by the API.
 */
class GetCharacter extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $characterId A single character id.
     */
    public function __construct(
        protected int $characterId,
    )
    {
    }


    public function resolveEndpoint(): string
    {
        return "/characters/{$this->characterId}";
    }


    /**
     * @return CharacterDataWrapper
     */
    public function createDtoFromResponse(Response $response): CharacterDataWrapper
    {
        return CharacterDataWrapper::fromJson($response->json());
    }
}
