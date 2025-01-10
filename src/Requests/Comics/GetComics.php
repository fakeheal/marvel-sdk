<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Requests\Comics;

use Chronoarc\Marvel\Dto\Comic\ComicDataWrapper;
use Chronoarc\Marvel\Enums\Comic\Format;
use Chronoarc\Marvel\Enums\Comic\FormatType;
use Chronoarc\Marvel\Enums\Comic\OrderBy;
use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use Chronoarc\Marvel\Request;
use DateTimeInterface;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * getComicsCollection
 *
 * Fetches lists of comics with optional filters. See notes on individual parameters below.
 */
class GetComics extends Request
{
    protected Method $method = Method::GET;


    /**
     * @param ?Format $format Filter by the issue format (e.g. comic, digital comic, hardcover).
     * @param ?FormatType $formatType Filter by the issue format type (comic or collection).
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
     * @param ?OrderBy[] $orderBy Order the result set by a field or fields. Add a "-" to the value sort in descending order. Multiple values are given priority in the order in which they are passed.
     * @param ?int $limit Limit the result set to the specified number of resources.
     * @param ?int $offset Skip the specified number of resources in the result set.
     */
    public function __construct(
        protected ?Format            $format = null,
        protected ?FormatType        $formatType = null,
        protected ?bool              $noVariants = null,
        protected ?string            $dateDescriptor = null,
        protected ?array             $dateRange = null,
        protected ?string            $title = null,
        protected ?string            $titleStartsWith = null,
        protected ?int               $startYear = null,
        protected ?int               $issueNumber = null,
        protected ?string            $diamondCode = null,
        protected ?int               $digitalId = null,
        protected ?string            $upc = null,
        protected ?string            $isbn = null,
        protected ?string            $ean = null,
        protected ?string            $issn = null,
        protected ?bool              $hasDigitalIssue = null,
        protected ?DateTimeInterface $modifiedSince = null,
        protected ?array             $creators = null,
        protected ?array             $characters = null,
        protected ?array             $series = null,
        protected ?array             $events = null,
        protected ?array             $stories = null,
        protected ?array             $sharedAppearances = null,
        protected ?array             $collaborators = null,
        protected ?array             $orderBy = null,
        protected ?int               $limit = null,
        protected ?int               $offset = null,
    )
    {
    }

    /**
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/comics";
    }

    /**
     * @param Response $response
     * @return ComicDataWrapper
     * @throws InvalidAttributeTypeException
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): ComicDataWrapper
    {
        return ComicDataWrapper::fromJson($response->json());
    }

    /**
     * @return array|string[]
     */
    public function defaultQuery(): array
    {
        return array_filter([
            'format' => $this->format?->value,
            'formatType' => $this->formatType?->value,
            'noVariants' => $this->noVariants,
            'dateDescriptor' => $this->dateDescriptor,
            'dateRange' => $this->toCsv($this->dateRange),
            'title' => $this->title,
            'titleStartsWith' => $this->titleStartsWith,
            'startYear' => $this->startYear,
            'issueNumber' => $this->issueNumber,
            'diamondCode' => $this->diamondCode,
            'digitalId' => $this->digitalId,
            'upc' => $this->upc,
            'isbn' => $this->isbn,
            'ean' => $this->ean,
            'issn' => $this->issn,
            'hasDigitalIssue' => $this->hasDigitalIssue,
            'modifiedSince' => $this->modifiedSince?->format('Y-m-d\TH:i:sP'),
            'creators' => $this->toCsv($this->creators),
            'characters' => $this->toCsv($this->characters),
            'series' => $this->toCsv($this->series),
            'events' => $this->toCsv($this->events),
            'stories' => $this->toCsv($this->stories),
            'sharedAppearances' => $this->sharedAppearances,
            'collaborators' => $this->collaborators,
            'orderBy' => $this->enumToCsv($this->orderBy),
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}
