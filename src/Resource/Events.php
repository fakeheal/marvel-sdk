<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Resource;

use Chronoarc\Marvel\Enums\Comic\Format;
use Chronoarc\Marvel\Enums\Comic\FormatType;
use Chronoarc\Marvel\Enums\Comic\OrderBy;
use Chronoarc\Marvel\Enums\Series\Type;
use Chronoarc\Marvel\Requests\Events\GetEvent;
use Chronoarc\Marvel\Requests\Events\GetEventCharacters;
use Chronoarc\Marvel\Requests\Events\GetEventComics;
use Chronoarc\Marvel\Requests\Events\GetEventCreators;
use Chronoarc\Marvel\Requests\Events\GetEvents;
use Chronoarc\Marvel\Requests\Events\GetEventSeries;
use Chronoarc\Marvel\Requests\Events\GetEventStories;
use Chronoarc\Marvel\Resource;
use DateTimeInterface;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class Events extends Resource
{

    /**
     * @param ?string $name Return only events which match the specified name.
     * @param ?string $nameStartsWith Return events with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only events which have been modified since the specified date.
     * @param ?array $creators Return only events which feature work by the specified creators.
     * @param ?array $characters Return only events which feature the specified characters.
     * @param ?array $series Return only events which are part of the specified series.
     * @param ?array $comics Return only events which take place in the specified comics.
     * @param ?array $stories Return only events which take place in the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function search(
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?array             $series = null,
        ?array             $comics = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetEvents($name, $nameStartsWith, $modifiedSince, $creators, $characters, $series, $comics, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param int $eventId The event id.
     * @param ?Format $format Filter by the issue format (e.g. comic, digital comic, hardcover).
     * @param ?FormatType $formatType Filter by the issue format type (comic or collection).
     * @param ?array $noVariants Exclude variant comics from the result set.
     * @param ?array $dateDescriptor Return comics within a predefined date range.
     * @param ?array $dateRange Return comics within a predefined date range.  Dates must be specified as date1,date2 (e.g. 2013-01-01,2013-01-02).  Dates are preferably formatted as YYYY-MM-DD but may be sent as any common date format.
     * @param ?string $title Return only issues in series whose title matches the input.
     * @param ?string $titleStartsWith Return only issues in series whose title starts with the input.
     * @param ?int $startYear Return only issues in series whose start year matches the input.
     * @param ?int $issueNumber Return only issues in series whose issue number matches the input.
     * @param ?string $diamondCode Filter by diamond code.
     * @param ?int $digitalId Filter by digital comic id.
     * @param ?string $upc Filter by UPC.
     * @param ?string $isbn Filter by ISBN.
     * @param ?string $ean Filter by EAN.
     * @param ?string $issn Filter by ISSN.
     * @param ?array $hasDigitalIssue Include only results which are available digitally.
     * @param ?DateTimeInterface $modifiedSince Return only comics which have been modified since the specified date.
     * @param ?array $creators Return only comics which feature work by the specified creators.
     * @param ?array $characters Return only comics which feature the specified characters.
     * @param ?array $series Return only comics which are part of the specified series.
     * @param ?array $events Return only comics which take place in the specified events.
     * @param ?array $stories Return only comics which contain the specified stories.
     * @param ?array $sharedAppearances Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear).
     * @param ?array $collaborators Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work).
     * @param ?OrderBy[] $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getEventComics(
        int                $eventId,
        ?Format            $format = null,
        ?FormatType        $formatType = null,
        ?array             $noVariants = null,
        ?array             $dateDescriptor = null,
        ?array             $dateRange = null,
        ?string            $title = null,
        ?string            $titleStartsWith = null,
        ?int               $startYear = null,
        ?int               $issueNumber = null,
        ?string            $diamondCode = null,
        ?int               $digitalId = null,
        ?string            $upc = null,
        ?string            $isbn = null,
        ?string            $ean = null,
        ?string            $issn = null,
        ?array             $hasDigitalIssue = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?array             $series = null,
        ?array             $events = null,
        ?array             $stories = null,
        ?array             $sharedAppearances = null,
        ?array             $collaborators = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetEventComics($eventId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $characters, $series, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset));
    }


    /**
     * @param int $eventId The ID of the event.
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $comics Return only stories contained in the specified.
     * @param ?array $series Return only stories contained the specified series.
     * @param ?array $creators Return only stories which feature work by the specified creators.
     * @param ?array $characters Return only stories which feature the specified characters.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getEventStories(
        int                $eventId,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $series = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetEventStories($eventId, $modifiedSince, $comics, $series, $creators, $characters, $orderBy, $limit, $offset));
    }

    /**
     * @param int $eventId The event ID.
     * @param ?string $title Filter by series title.
     * @param ?string $titleStartsWith Return series with titles that begin with the specified string (e.g. Sp).
     * @param ?int $startYear Return only series matching the specified start year.
     * @param ?DateTimeInterface $modifiedSince Return only series which have been modified since the specified date.
     * @param ?array $comics Return only series which contain the specified comics.
     * @param ?array $stories Return only series which contain the specified stories.
     * @param ?array $creators Return only series which feature work by the specified creators.
     * @param ?array $characters Return only series which feature the specified characters.
     * @param Type|null $seriesType Filter the series by publication frequency type.
     * @param ?array $contains Return only series containing one or more comics with the specified format.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getEventSeries(
        int                $eventId,
        ?string            $title = null,
        ?string            $titleStartsWith = null,
        ?int               $startYear = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $stories = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?Type            $seriesType = null,
        ?array             $contains = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetEventSeries($eventId, $title, $titleStartsWith, $startYear, $modifiedSince, $comics, $stories, $creators, $characters, $seriesType, $contains, $orderBy, $limit, $offset));
    }


    /**
     * @param int $eventId The event ID
     * @param ?string $name Return only characters matching the specified full character name (e.g. Spider-Man).
     * @param ?string $nameStartsWith Return characters with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only characters which have been modified since the specified date.
     * @param ?array $comics Return only characters which appear in the specified comics.
     * @param ?array $series Return only characters which appear the specified series.
     * @param ?array $stories Return only characters which appear the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getEventCharacters(
        int                $eventId,
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $series = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetEventCharacters($eventId, $name, $nameStartsWith, $modifiedSince, $comics, $series, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param int $eventId A single event.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getEvent(int $eventId): Response
    {
        return $this->connector->send(new GetEvent($eventId));
    }


    /**
     * @param int $eventId The event ID.
     * @param ?string $firstName Filter by creator first name (e.g. brian).
     * @param ?string $middleName Filter by creator middle name (e.g. Michael).
     * @param ?string $lastName Filter by creator last name (e.g. Bendis).
     * @param ?string $suffix Filter by suffix or honorific (e.g. Jr., Sr.).
     * @param ?string $nameStartsWith Filter by creator names that match critera (e.g. B, St L).
     * @param ?string $firstNameStartsWith Filter by creator first names that match critera (e.g. B, St L).
     * @param ?string $middleNameStartsWith Filter by creator middle names that match critera (e.g. Mi).
     * @param ?string $lastNameStartsWith Filter by creator last names that match critera (e.g. Ben).
     * @param ?DateTimeInterface $modifiedSince Return only creators which have been modified since the specified date.
     * @param ?array $comics Return only creators who worked on in the specified comics.
     * @param ?array $series Return only creators who worked on the specified series.
     * @param ?array $stories Return only creators who worked on the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function getEventCreators(
        int                $eventId,
        ?string            $firstName = null,
        ?string            $middleName = null,
        ?string            $lastName = null,
        ?string            $suffix = null,
        ?string            $nameStartsWith = null,
        ?string            $firstNameStartsWith = null,
        ?string            $middleNameStartsWith = null,
        ?string            $lastNameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $series = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetEventCreators($eventId, $firstName, $middleName, $lastName, $suffix, $nameStartsWith, $firstNameStartsWith, $middleNameStartsWith, $lastNameStartsWith, $modifiedSince, $comics, $series, $stories, $orderBy, $limit, $offset));
    }
}
