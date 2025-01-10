<?php

namespace Chronoarc\Marvel\Enums\Series;

enum Type: string
{
    case collection = "collection";
    case oneShot = "one shot";
    case limited = "limited";
    case ongoing = "ongoing";
}