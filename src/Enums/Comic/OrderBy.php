<?php

namespace Chronoarc\Marvel\Enums\Comic;

use StringBackedEnum;

enum OrderBy: string
{
    case focDateAsc = "focDate";
    case focDateDesc = "-focDate";
    case onSaleDateAsc = "onsaleDate";
    case onSaleDateDesc = "-onsaleDate";
    case titleAsc = "title";
    case titleDesc = "-title";
    case issueNumberAsc = "issueNumber";
    case issueNumberDesc = "-issueNumber";
    case modifiedAsc = "modified";
    case modifiedDesc = "-modified";
}
