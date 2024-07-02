<?php

namespace App\Constants;

use App\Enums\ContentTypeEnum;
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