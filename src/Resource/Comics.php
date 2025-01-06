<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Resource;

use Chronoarc\Marvel\Requests\Comics\GetComic;
use Chronoarc\Marvel\Requests\Comics\GetComicCharacters;
use Chronoarc\Marvel\Requests\Comics\GetComicCreators;
use Chronoarc\Marvel\Requests\Comics\GetComicEvents;
use Chronoarc\Marvel\Requests\Comics\GetComics;
use Chronoarc\Marvel\Requests\Comics\GetComicStories;
use Chronoarc\Marvel\Resource;
use DateTimeInterface;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class Comics extends Resource
{
    /**
     * @param int $comicId The comic ID.
     * @param ?DateTimeInterface $modifiedSince Return only stories which have been modified since the specified date.
     * @param ?array $series Return only stories contained the specified series
     * @param ?array $events Return only stories which take place during the specified events
     * @param ?array $creators Return only stories which feature work by the specified creators
     * @param ?array $characters Return only stories which feature the specified characters
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getComicStories(
        int                $comicId,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $series = null,
        ?array             $events = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetComicStories($comicId, $modifiedSince, $series, $events, $creators, $characters, $orderBy, $limit, $offset));
    }


    /**
     * @param int $comicId The comic id.
     * @param ?string $name Return only characters matching the specified full character name (e.g. Spider-Man).
     * @param ?string $nameStartsWith Return characters with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only characters which have been modified since the specified date.
     * @param ?array $series Return only characters which appear the specified series
     * @param ?array $events Return only characters which appear comics that took place in the specified events
     * @param ?array $stories Return only characters which appear the specified stories
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getComicCharacters(
        int                $comicId,
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $series = null,
        ?array             $events = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetComicCharacters($comicId, $name, $nameStartsWith, $modifiedSince, $series, $events, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param int $comicId A single comic.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getComic(int $comicId): Response
    {
        return $this->connector->send(new GetComic($comicId));
    }


    /**
     * @param int $comicId The comic id.
     * @param ?string $firstName Filter by creator first name (e.g. brian).
     * @param ?string $middleName Filter by creator middle name (e.g. Michael).
     * @param ?string $lastName Filter by creator last name (e.g. Bendis).
     * @param ?string $suffix Filter by suffix or honorific (e.g. Jr., Sr.).
     * @param ?string $nameStartsWith Filter by creator names that match critera (e.g. B, St L).
     * @param ?string $firstNameStartsWith Filter by creator first names that match critera (e.g. B, St L).
     * @param ?string $middleNameStartsWith Filter by creator middle names that match critera (e.g. Mi).
     * @param ?string $lastNameStartsWith Filter by creator last names that match critera (e.g. Ben).
     * @param ?DateTimeInterface $modifiedSince Return only creators which have been modified since the specified date.
     * @param ?array $comics Return only creators who worked on in the specified comics
     * @param ?array $series Return only creators who worked on the specified series
     * @param ?array $stories Return only creators who worked on the specified stories
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getComicCreators(
        int                $comicId,
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
        return $this->connector->send(new GetComicCreators($comicId, $firstName, $middleName, $lastName, $suffix, $nameStartsWith, $firstNameStartsWith, $middleNameStartsWith, $lastNameStartsWith, $modifiedSince, $comics, $series, $stories, $orderBy, $limit, $offset));
    }


    /**
     * @param ?string $format Filter by the issue format (e.g. comic, digital comic, hardcover).
     * @param ?string $formatType Filter by the issue format type (comic or collection).
     * @param ?bool $noVariants Exclude variants (alternate covers, secondary printings, director's cuts, etc.) from the result set.
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
     * @param ?array $characters Return only comics which feature the specified characters
     * @param ?array $series Return only comics which are part of the specified series
     * @param ?array $events Return only comics which take place in the specified events
     * @param ?array $stories Return only comics which contain the specified stories
     * @param ?array $sharedAppearances Return only comics in which the specified characters appear together (for example in which BOTH Spider-Man and Wolverine appear). Accepts a comma-separated list of ids.
     * @param ?array $collaborators Return only comics in which the specified creators worked together (for example in which BOTH Stan Lee and Jack Kirby did work). Accepts a comma-separated list of ids.
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function search(
        ?string             $format = null,
        ?string             $formatType = null,
        ?bool               $noVariants = null,
        ?string             $dateDescriptor = null,
        ?array              $dateRange = null,
        ?string             $title = null,
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
        return $this->connector->send(new GetComics($format, $formatType, $noVariants, $dateDescriptor, $dateRange, $title, $titleStartsWith, $startYear, $issueNumber, $diamondCode, $digitalId, $upc, $isbn, $ean, $issn, $hasDigitalIssue, $modifiedSince, $creators, $characters, $series, $events, $stories, $sharedAppearances, $collaborators, $orderBy, $limit, $offset));
    }


    /**
     * @param int $comicId The comic ID.
     * @param ?string $name Filter the event list by name.
     * @param ?string $nameStartsWith Return events with names that begin with the specified string (e.g. Sp).
     * @param ?DateTimeInterface $modifiedSince Return only events which have been modified since the specified date.
     * @param ?array $creators Return only events which feature work by the specified creators
     * @param ?array $characters Return only events which feature the specified characters
     * @param ?array $series Return only events which are part of the specified series
     * @param ?array $stories Return only events which contain the specified stories
     * @param ?array $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getComicEvents(
        int                $comicId,
        ?string            $name = null,
        ?string            $nameStartsWith = null,
        ?DateTimeInterface $modifiedSince = null,
        ?array             $creators = null,
        ?array             $characters = null,
        ?array             $series = null,
        ?array             $stories = null,
        ?array             $orderBy = null,
        ?int               $limit = null,
        ?int               $offset = null,
    ): Response
    {
        return $this->connector->send(new GetComicEvents($comicId, $name, $nameStartsWith, $modifiedSince, $creators, $characters, $series, $stories, $orderBy, $limit, $offset));
    }
}
