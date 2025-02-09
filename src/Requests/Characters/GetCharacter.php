<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Characters;

use Chronoarc\Marvel\Dto\Character\CharacterDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use JsonException;
use Saloon\Enums\Method;
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

    /**
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/characters/{$this->characterId}";
    }

    /**
     * @param Response $response
     * @return CharacterDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): CharacterDataWrapper
    {
        return CharacterDataWrapper::fromJson($response->json());
    }
}
