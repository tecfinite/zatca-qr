<?php

namespace Tecfinite\ZatcaQr\Tag;

use JetBrains\PhpStorm\Pure;

class SellerTag extends Tag
{
    private const INDEX = 1;

    #[Pure] public function __construct(string $value)
    {
        parent::__construct(self::INDEX, $value);
    }

}