<?php

namespace Chronoarc\Marvel\Enums\Series;

enum Type: string
{
    case collection = "Collection";
    case oneShot = "One shot";
    case limited = "Limited";
    case ongoing = "Ongoing";
}