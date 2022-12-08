<?php

namespace Tecfinite\ZatcaQr\Tag;

use JetBrains\PhpStorm\Pure;

class VatTotalTag extends Tag
{
    private const INDEX = 5;

    #[Pure] public function __construct(string $value)
    {
        parent::__construct(self::INDEX, $value);
    }
}