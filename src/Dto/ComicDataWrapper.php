<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class ComicDataWrapper extends Dto
{
	protected static array $attributeMap = ['attributionHtml' => 'attributionHTML'];


	/**
	 * @param ?int $code
	 * @param ?string $status A string description of the call status.
	 * @param ?string $copyright The copyright notice for the returned result.
	 * @param ?string $attributionText The attribution notice for this result.  Please display either this notice or the contents of the attributionHTML field on all screens which contain data from the Marvel Comics API.
	 * @param ?string $attributionHtml An HTML representation of the attribution notice for this result.  Please display either this notice or the contents of the attributionText field on all screens which contain data from the Marvel Comics API.
	 * @param ?ComicDataContainer $data
	 * @param ?string $etag A digest value of the content returned by the call.
	 */
	public function __construct(
		public ?int $code = null,
		public ?string $status = null,
		public ?string $copyright = null,
		public ?string $attributionText = null,
		public ?string $attributionHtml = null,
		public ?ComicDataContainer $data = null,
		public ?string $etag = null,
	) {
	}
}
