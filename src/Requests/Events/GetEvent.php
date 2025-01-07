<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Events;

use Chronoarc\Marvel\Dto\Event\EventDataWrapper;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getEventIndividual
 *
 * This method fetches a single event resource.  It is the canonical URI for any event resource
 * provided by the API.
 */
class GetEvent extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param int $eventId A single event.
     */
    public function __construct(
        protected int $eventId,
    )
    {
    }

    /**
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/events/$this->eventId";
    }


    /**
     * @param Response $response
     * @return EventDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): EventDataWrapper
    {
        return EventDataWrapper::fromJson($response->json());
    }
}
