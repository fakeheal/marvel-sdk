<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Resource;

use Chronoarc\Marvel\Enums\Comic\Format;
use Chronoarc\Marvel\Enums\Comic\FormatType;
use Chronoarc\Marvel\Enums\Comic\OrderBy;
use Chronoarc\Marvel\Enums\SeriesType;
use Chronoarc\Marvel\Requests\Creators\GetCreator;
use Chronoarc\Marvel\Requests\Creators\GetCreatorComics;
use Chronoarc\Marvel\Requests\Creators\GetCreatorEvents;
use Chronoarc\Marvel\Requests\Creators\GetCreators;
use Chronoarc\Marvel\Requests\Creators\GetCreatorSeries;
use Chronoarc\Marvel\Requests\Creators\GetCreatorStories;
use Chronoarc\Marvel\Resource;
use DateTimeInterface;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class Creators extends Resource
{
    /**
     * @param int $creatorId The creator ID.
     * @param ?string $title Filter by series title.
     * @param ?string $titleStartsWith Return series with titles that begin with the specified string (e.g. Sp).
     * @param ?int $startYear Return only series matching the specified start year.
     * @param ?DateTimeInterface $modifiedSince Return only series which have been modified since the specified date.
     * @param ?array $comics Return only series which contain the specified comics.
     * @param ?array $stories Return only series which contain the specified stories.
     * @param ?array $events Return only series which have comics that take place during the specified events.
     * @param ?array $characters Return only series which feature the specified characters.
     * @param SeriesType|null $seriesType Filter the series by publication frequency type.
     * @param ?array $contains Return only series containing one or more comics with the specified format.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCreatorSeries(
        int                $creatorId,
        ?string            $title = null,
        ?string            $titleStartsWith = null,
        ?int               $startYear = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $stories = null,
        ?array             $events = null,
        ?array             $characters = null,
        ?SeriesType        $seriesType = null,
        ?array             $contains = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetCreatorSeries($creatorId, $title, $titleStartsWith, $startYear, $modifiedSince, $comics, $stories, $events, $characters, $seriesType, $contains, $orderBy, $limit, $offset));
    }


    /**
     * @param ?string $firstName Filter by creator first name (e.g. Brian).
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
     * @param ?array $events Return only creators who worked on comics that took place in the specified events.
     * @param ?array $stories Return only creators who worked on the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function search(
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
        ?array             $events = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetCreators($firstName, $middleName, $lastName, $suffix, $nameStartsWith, $firstNameStartsWith, $middleNameStartsWith, $lastNameStartsWith, $modifiedSince, $comics, $series, $events, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param int $creatorId The creator ID.
     * @param ?Format $format Filter by the issue format (e.g. comic, digital comic, hardcover).
     * @param ?FormatType $formatType Filter by the issue format type (comic or collection).
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
     * @param ?array $hasDigitalIssue Include only results which are available digitally.
     * @param ?DateTimeInterface $modifiedSince Return only comics which have been modified since the specified date.
     * @param ?array $characters Return only comics which feature the specified characters.
     * @param ?array $series Return only comics which are part of the specified series.
     * @param ?array $events Return only comics which take place in the specified events.
     * @param ?array $stories Return only comics which contain the specified stories.
     * @param ?array $sharedAppearances Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear).
     * @param ?array $collaborators Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work).
     * @param ?OrderBy[] $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function getCreatorComics(
        int                $creatorId,
        ?Format            $format = null,
        ?FormatType        $formatType = null,
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
        ?array             $hasDigitalIssue = null,
        ?DateTimeInterface $modifiedSince = null,
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
        return $this->connector->send(new GetCreatorComics($creatorId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $characters, $series, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset));
    }


    /**
     * @param int $creatorId The ID of the creator.
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $comics Return only stories contained in the specified comics.
     * @param ?array $series Return only stories contained the specified series.
     * @param ?array $events Return only stories which take place during the specified events.
     * @param ?array $characters Return only stories which feature the specified characters.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCreatorStories(
        int                $creatorId,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $series = null,
        ?array             $events = null,
        ?array             $characters = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetCreatorStories($creatorId, $modifiedSince, $comics, $series, $events, $characters, $orderBy, $limit, $offset));
    }


    /**
     * @param int $creatorId The creator ID.
     * @param ?string $name Filter the event list by name.
     * @param ?string $nameStartsWith Return events with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only events which have been modified since the specified date.
     * @param ?array $characters Return only events which feature the specified characters.
     * @param ?array $series Return only events which are part of the specified series.
     * @param ?array $comics Return only events which take place in the specified comics.
     * @param ?array $stories Return only events which contain the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCreatorEvents(
        int                $creatorId,
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $characters = null,
        ?array             $series = null,
        ?array             $comics = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetCreatorEvents($creatorId, $name, $nameStartsWith, $modifiedSince, $characters, $series, $comics, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param int $creatorId A single creator id.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCreator(int $creatorId): Response
    {
        return $this->connector->send(new GetCreator($creatorId));
    }
}
