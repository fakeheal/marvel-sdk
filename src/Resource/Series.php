<?php


declare(strict_types=1);

namespace Chronoarc\Marvel\Resource;

use Chronoarc\Marvel\Enums\Comic\Format;
use Chronoarc\Marvel\Enums\Comic\FormatType;
use Chronoarc\Marvel\Enums\Comic\OrderBy;
use Chronoarc\Marvel\Enums\Series\Type;
use Chronoarc\Marvel\Requests\Series\GetSeries;
use Chronoarc\Marvel\Requests\Series\GetSeriesCharacters;
use Chronoarc\Marvel\Requests\Series\GetSeriesComics;
use Chronoarc\Marvel\Requests\Series\GetSeriesCreators;
use Chronoarc\Marvel\Requests\Series\GetSeriesEntry;
use Chronoarc\Marvel\Requests\Series\GetSeriesEvents;
use Chronoarc\Marvel\Requests\Series\GetSeriesStories;
use Chronoarc\Marvel\Resource;
use DateTimeInterface;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class Series extends Resource
{
    /**
     * @param ?string $title Return only series matching the specified title.
     * @param ?string $titleStartsWith Return series with titles that begin with the specified string (e.g. Sp).
     * @param ?int $startYear Return only series matching the specified start year.
     * @param ?DateTimeInterface $modifiedSince Return only series which have been modified since the specified date.
     * @param ?array $comics Return only series which contain the specified comics.
     * @param ?array $stories Return only series which contain the specified stories.
     * @param ?array $events Return only series which have comics that take place during the specified events.
     * @param ?array $creators Return only series which feature work by the specified creators.
     * @param ?array $characters Return only series which feature the specified characters.
     * @param ?Type $seriesType Filter the series by publication frequency type.
     * @param ?array $contains Return only series containing one or more comics with the specified format.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function search(
        ?string            $title = null,
        ?string            $titleStartsWith = null,
        ?int               $startYear = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $stories = null,
        ?array             $events = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?Type              $seriesType = null,
        ?array             $contains = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetSeries($title, $titleStartsWith, $startYear, $modifiedSince, $comics, $stories, $events, $creators, $characters, $seriesType, $contains, $orderBy, $limit, $offset));
    }


    /**
     * @param int $seriesId Filter by series title.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSeries(int $seriesId): Response
    {
        return $this->connector->send(new GetSeriesEntry($seriesId));
    }


    /**
     * @param int $seriesId The series ID.
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
    public function getSeriesComics(
        int                $seriesId,
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
        ?array             $events = null,
        ?array             $stories = null,
        ?array             $sharedAppearances = null,
        ?array             $collaborators = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetSeriesComics($seriesId, $format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $characters, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset));
    }


    /**
     * @param int $seriesId The series ID.
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
     * @param ?array $events Return only creators who worked on comics that took place in the specified events.
     * @param ?array $stories Return only creators who worked on the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSeriesCreators(
        int                $seriesId,
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
        ?array             $events = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetSeriesCreators($seriesId, $firstName, $middleName, $lastName, $suffix, $nameStartsWith, $firstNameStartsWith, $middleNameStartsWith, $lastNameStartsWith, $modifiedSince, $comics, $events, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param int $seriesId The series ID.
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $comics Return only stories contained in the specified.
     * @param ?array $events Return only stories which take place during the specified events.
     * @param ?array $creators Return only stories which feature work by the specified creators.
     * @param ?array $characters Return only stories which feature the specified characters.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSeriesStories(
        int                $seriesId,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $comics = null,
        ?array             $events = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetSeriesStories($seriesId, $modifiedSince, $comics, $events, $creators, $characters, $orderBy, $limit, $offset));
    }


    /**
     * @param int $seriesId The series ID.
     * @param ?string $name Filter the event list by name.
     * @param ?string $nameStartsWith Return events with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only events which have been modified since the specified date.
     * @param ?array $creators Return only events which feature work by the specified creators.
     * @param ?array $characters Return only events which feature the specified characters.
     * @param ?array $comics Return only events which take place in the specified comics.
     * @param ?array $stories Return only events which contain the specified stories.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSeriesEvents(
        int                $seriesId,
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?array             $comics = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetSeriesEvents($seriesId, $name, $nameStartsWith, $modifiedSince, $creators, $characters, $comics, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param int $seriesId The series id.
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
    public function getSeriesCharacters(
        int                $seriesId,
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
        return $this->connector->send(new GetSeriesCharacters($seriesId, $name, $nameStartsWith, $modifiedSince, $comics, $events, $stories, $orderBy, $limit, $offset));
    }
}
