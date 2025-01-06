<?php

namespace Chronoarc\Marvel\Enums;

enum OrderBy: string
{
    case idAsc = "id";
    case idDesc = "-id";
    case titleAsc = "title";
    case titleDesc = "-title";
    case modifiedAsc = "modified";
    case modifiedDesc = "-modified";
    case startYearAsc = "startYear";
    case startYearDesc = "-startYear";
    case lastNameAsc = "lastName";
    case lastNameDesc = "-lastName";
    case firstNameAsc = "firstName";
    case firstNameDesc = "-firstName";
    case middleNameAsc = "middleName";
    case middleNameDesc = "-middleName";
    case suffixAsc = "suffix";
    case suffixDesc = "-suffix";

    case focDateAsc = "focDate";
    case focDateDesc = "-focDate";

    case onSaleDateAsc = "onsaleDate";
    case onSaleDateDesc = "-onsaleDate";

    case issueNumberAsc = "issueNumber";
    case issueNumberDesc = "-issueNumber";
}
