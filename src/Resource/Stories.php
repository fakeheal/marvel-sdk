<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Resource;

use Chronoarc\Marvel\Enums\Comic\FormatType;
use Chronoarc\Marvel\Enums\Comic\OrderBy;
use Chronoarc\Marvel\Enums\Format;
use Chronoarc\Marvel\Enums\Series\Type;
use Chronoarc\Marvel\Requests\Stories\GetStories;
use Chronoarc\Marvel\Requests\Stories\GetStory;
use Chronoarc\Marvel\Requests\Stories\GetStoryCharacters;
use Chronoarc\Marvel\Requests\Stories\GetStoryComics;
use Chronoarc\Marvel\Requests\Stories\GetStoryCreators;
use Chronoarc\Marvel\Requests\Stories\GetStoryEvents;
use Chronoarc\Marvel\Requests\Stories\GetStorySeries;
use Chronoarc\Marvel\Resource;
use DateTimeInterface;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class Stories extends Resource
{
    /**
     * @param int $storyId The story ID.
     * @param ?string $name Return only characters matching the specified full character name (e.g. Spider-Man).
     * @param ?string $nameStartsWith Return characters with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only characters which have been modified since the specified date.
     * @param ?array $comics Return only characters which appear in the specified comics (accepts a comma-separated list of ids).
     * @param ?array $series Return only characters which appear the specified series (accepts a comma-separated list of ids).
     * @param ?array $events Return only characters which appear comics that took place in the specified events (accepts a comma-separated list of ids).
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getStoryCreators(
        int                $storyId,
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $series = null,
        ?array             $events = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetStoryCreators($storyId, $name, $nameStartsWith, $modifiedSince, $comics, $series, $events, $orderBy, $limit, $offset));
    }


    /**
     * @param int $storyId The story ID.
     * @param ?string $name Filter the event list by name.
     * @param ?string $nameStartsWith Return events with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only events which have been modified since the specified date.
     * @param ?array $creators Return only events which feature work by the specified creators (accepts a comma-separated list of ids).
     * @param ?array $characters Return only events which feature the specified characters (accepts a comma-separated list of ids).
     * @param ?array $series Return only events which are part of the specified series (accepts a comma-separated list of ids).
     * @param ?array $comics Return only events which take place in the specified comics (accepts a comma-separated list of ids).
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getStoryEvents(
        int                $storyId,
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?array             $series = null,
        ?array             $comics = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetStoryEvents($storyId, $name, $nameStartsWith, $modifiedSince, $creators, $characters, $series, $comics, $orderBy, $limit, $offset));
    }


    /**
     * @param int $storyId Filter by story id.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getStory(int $storyId): Response
    {
        return $this->connector->send(new GetStory($storyId));
    }


    /**
     * @param int $storyId The story ID.
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
     * @param ?array $creators Return only comics which feature work by the specified creators (accepts a comma-separated list of ids).
     * @param ?array $characters Return only comics which feature the specified characters (accepts a comma-separated list of ids).
     * @param ?array $series Return only comics which are part of the specified series (accepts a comma-separated list of ids).
     * @param ?array $events Return only comics which take place in the specified events (accepts a comma-separated list of ids).
     * @param ?array $sharedAppearances Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear).
     * @param ?array $collaborators Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work).
     * @param ?OrderBy[] $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getStoryComics(
        int                $storyId,
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
        ?array             $sharedAppearances = null,
        ?array             $collaborators = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetStoryComics($storyId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $characters, $series, $events, $sharedAppearances, $collaborators, $orderBy, $limit, $offset));
    }


    /**
     * @param int $storyId The story ID.
     * @param ?array $events Return only series which have comics that take place during the specified events (accepts a comma-separated list of ids).
     * @param ?string $title Filter by series title.
     * @param ?string $titleStartsWith Return series with titles that begin with the specified string (e.g. Sp).
     * @param ?int $startYear Return only series matching the specified start year.
     * @param ?DateTimeInterface $modifiedSince Return only series which have been modified since the specified date.
     * @param ?array $comics Return only series which contain the specified comics (accepts a comma-separated list of ids).
     * @param ?array $creators Return only series which feature work by the specified creators (accepts a comma-separated list of ids).
     * @param ?array $characters Return only series which feature the specified characters (accepts a comma-separated list of ids).
     * @param ?Type $seriesType Filter the series by publication frequency type.
     * @param ?array $contains Return only series containing one or more comics with the specified format.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getStorySeries(
        int                $storyId,
        ?array             $events = null,
        ?string            $title = null,
        ?string            $titleStartsWith = null,
        ?int               $startYear = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?Type            $seriesType = null,
        ?array             $contains = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetStorySeries($storyId, $events, $title, $titleStartsWith, $startYear, $modifiedSince, $comics, $creators, $characters, $seriesType, $contains, $orderBy, $limit, $offset));
    }


    /**
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $comics Return only stories contained in the specified (accepts a comma-separated list of ids).
     * @param ?array $series Return only stories contained the specified series (accepts a comma-separated list of ids).
     * @param ?array $events Return only stories which take place during the specified events (accepts a comma-separated list of ids).
     * @param ?array $creators Return only stories which feature work by the specified creators (accepts a comma-separated list of ids).
     * @param ?array $characters Return only stories which feature the specified characters (accepts a comma-separated list of ids).
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function search(
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $series = null,
        ?array             $events = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetStories($modifiedSince, $comics, $series, $events, $creators, $characters, $orderBy, $limit, $offset));
    }

    /**
     * @param int $storyId The story id.
     * @param ?string $name Return only characters matching the specified full character name (e.g. Spider-Man).
     * @param ?string $nameStartsWith Return characters with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only characters which have been modified since the specified date.
     * @param ?array $comics Return only characters which appear in the specified comics.
     * @param ?array $events Return only characters which appear comics that took place in the specified events.
     * @param ?array $stories Return only characters which appear the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getStoryCharacters(
        int                $storyId,
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $events = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetStoryCharacters($storyId, $name, $nameStartsWith, $modifiedSince, $comics, $events, $stories, $orderBy, $limit, $offset));
    }
}
