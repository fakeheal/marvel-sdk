<?php

namespace Chronoarc\Marvel\Enums;

enum Format: string
{
    case comic = "comic";
    case magazine = "magazine";
    case tradePaperback = "trade paperback";
    case hardcover = "hardcover";
    case digest = "digest";
    case graphicNovel = "graphic novel";
    case digitalComic = "digital comic";
    case infiniteComic = "infinite comic";
    case collection = "collection";
}