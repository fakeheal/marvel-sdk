<?php

namespace Chronoarc\Marvel\Enums\Comic;

enum Format: string
{
    case comic = "Comic";
    case magazine = "Magazine";
    case tradePaperback = "Trade Paperback";
    case hardcover = "Hardcover";
    case digest = "Digest";
    case graphicNovel = "Graphic Novel";
    case digitalComic = "Digital Comic";
    case infiniteComic = "Infinite Comic";
}