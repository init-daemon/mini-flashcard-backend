<?php

namespace App\Enums;

enum QuestionTypeEnum: string
{
    case TEXT = 'text';
    case KEYWORD = 'keyword';
    case IMAGE = 'image';
}
