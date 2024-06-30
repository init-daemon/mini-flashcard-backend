<?php

namespace App\Constants;

use App\Enums\AnswerTypeEnum;
use App\Enums\QuestionTypeEnum;
class MigrationConstant
{
    const QUESTION_TYPE = [
        QuestionTypeEnum::TEXT->value,
        QuestionTypeEnum::KEYWORD->value,
        QuestionTypeEnum::IMAGE->value,
    ];
    const ANSWER_TYPE   = [
        AnswerTypeEnum::TEXT->value,
        AnswerTypeEnum::IMAGE->value,
    ];
}