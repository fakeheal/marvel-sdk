<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Resource;

use Chronoarc\Marvel\Requests\Characters\GetCharacter;
use Chronoarc\Marvel\Requests\Characters\GetCharacterComics;
use Chronoarc\Marvel\Requests\Characters\GetCharacterEvents;
use Chronoarc\Marvel\Requests\Characters\GetCharacters;
use Chronoarc\Marvel\Requests\Characters\GetCharacterSeries;
use Chronoarc\Marvel\Requests\Characters\GetCharacterStories;
use Chronoarc\Marvel\Resource;
use DateTimeInterface;
use Saloon\Http\Response;

class Characters extends Resource
{
    /**
     * @param int $characterId The character ID
     * @param ?string $title Filter by series title.
     * @param ?string $titleStartsWith Return series with titles that begin with the specified string (e.g. Sp).
     * @param ?int $startYear Return only series matching the specified start year.
     * @param ?DateTimeInterface $modifiedSince Return only series which have been modified since the specified date.
     * @param ?array $comics Return only series which contain the specified comics
     * @param ?array $stories Return only series which contain the specified stories
     * @param ?array $events Return only series which have comics that take place during the specified events
     * @param ?array $creators Return only series which feature work by the specified creators
     * @param ?string $seriesType Filter the series by publication frequency type.
     * @param ?array $contains Return only series containing one or more comics with the specified format.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function getCharacterSeries(
        int                $characterId,
        ?string            $title = null,
        ?string            $titleStartsWith = null,
        ?int               $startYear = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $stories = null,
        ?array             $events = null,
        ?array             $creators = null,
        ?string            $seriesType = null,
        ?array             $contains = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetCharacterSeries($characterId, $title, $titleStartsWith, $startYear, $modifiedSince, $comics, $stories, $events, $creators, $seriesType, $contains, $orderBy, $limit, $offset));
    }


    /**
     * @param int $characterId The character id.
     * @param ?string $format Filter by the issue format (e.g. comic, digital comic, hardcover).
     * @param ?string $formatType Filter by the issue format type (comic or collection).
     * @param ?bool $noVariants Exclude variant comics from the result set.
     * @param ?string $dateDescriptor Return comics within a predefined date range.
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
     * @param ?bool $hasDigitalIssue Include only results which are available digitally.
     * @param ?DateTimeInterface $modifiedSince Return only comics which have been modified since the specified date.
     * @param ?array $creators Return only comics which feature work by the specified creators
     * @param ?array $series Return only comics which are part of the specified series
     * @param ?array $events Return only comics which take place in the specified events
     * @param ?array $stories Return only comics which contain the specified stories
     * @param ?array $sharedAppearances Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear).
     * @param ?array $collaborators Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work).
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function getCharacterComics(
        int                $characterId,
        ?string            $format = null,
        ?string            $formatType = null,
        ?bool              $noVariants = null,
        ?string            $dateDescriptor = null,
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
        ?bool              $hasDigitalIssue = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $creators = null,
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
        return $this->connector->send(new GetCharacterComics($characterId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $series, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset));
    }


    /**
     * @param int $characterId The character ID.
     * @param ?string $name Filter the event list by name.
     * @param ?string $nameStartsWith Return events with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only events which have been modified since the specified date.
     * @param ?array $creators Return only events which feature work by the specified creators
     * @param ?array $series Return only events which are part of the specified series
     * @param ?array $comics Return only events which take place in the specified comics
     * @param ?array $stories Return only events which contain the specified stories
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function getCharacterEvents(
        int                $characterId,
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $creators = null,
        ?array             $series = null,
        ?array             $comics = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetCharacterEvents($characterId, $name, $nameStartsWith, $modifiedSince, $creators, $series, $comics, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param int $characterId A single character id.
     */
    public function getCharacter(int $characterId): Response
    {
        return $this->connector->send(new GetCharacter($characterId));
    }


    /**
     * @param ?string $name Return only characters matching the specified full character name (e.g. Spider-Man).
     * @param ?string $nameStartsWith Return characters with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only characters which have been modified since the specified date.
     * @param ?array $comics Return only characters which appear in the specified comics
     * @param ?array $series Return only characters which appear the specified series
     * @param ?array $events Return only characters which appear in the specified events
     * @param ?array $stories Return only characters which appear the specified stories
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function search(
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $series = null,
        ?array             $events = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetCharacters($name, $nameStartsWith, $modifiedSince, $comics, $series, $events, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param int $characterId The character ID.
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $comics Return only stories contained in the specified
     * @param ?array $series Return only stories contained the specified series
     * @param ?array $events Return only stories which take place during the specified events
     * @param ?array $creators Return only stories which feature work by the specified creators
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function getCharacterStories(
        int                $characterId,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $series = null,
        ?array             $events = null,
        ?array             $creators = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetCharacterStories($characterId, $modifiedSince, $comics, $series, $events, $creators, $orderBy, $limit, $offset));
    }
}
