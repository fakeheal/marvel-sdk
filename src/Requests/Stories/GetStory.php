<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Stories;

use Chronoarc\Marvel\Dto\Story\StoryDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getStoryIndividual
 *
 * This method fetches a single comic story resource.  It is the canonical URI for any comic story
 * resource provided by the API.
 */
class GetStory extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $storyId Filter by story id.
     */
    public function __construct(
        protected int $storyId,
    )
    {
    }

    /**
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/stories/$this->storyId";
    }

    /**
     * @param Response $response
     * @return StoryDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): StoryDataWrapper
    {
        return StoryDataWrapper::fromJson($response->json());
    }
}
