<?php



declare(strict_types=1);

namespace Chronoarc\Marvel\Dto;

use Chronoarc\Marvel\Dto;

final class TextObject extends Dto
{
	/**
	 * @param ?string $type The canonical type of the text object (e.g. solicit text, preview text, etc.).
	 * @param ?string $language The IETF language tag denoting the language the text object is written in.
	 * @param ?string $text The text.
	 */
	public function __construct(
		public ?string $type = null,
		public ?string $language = null,
		public ?string $text = null,
	) {
	}
}
