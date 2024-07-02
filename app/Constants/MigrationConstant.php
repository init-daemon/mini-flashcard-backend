<?php

namespace App\Constants;

use App\Enums\ContentTypeEnum;
use App\Enums\ContentValueTypeEnum;
class MigrationConstant
{
    const CONTENTS = [
        "TYPE" => [
            ContentTypeEnum::TEXT->value,
            ContentTypeEnum::KEYWORDS->value,
            ContentTypeEnum::IMAGE->value,
        ]
    ];
}