<?php

namespace Chronoarc\Marvel\Enums;

enum DateRange: string
{
    case lastWeek = "lastWeek";
    case thisWeek = "thisWeek";
    case nextWeek = "nextWeek";
    case thisMonth = "thisMonth";
}
