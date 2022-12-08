<?php

namespace Tecfinite\ZatcaQr\Tag;

use JetBrains\PhpStorm\Pure;

class VatRegistrationNumberTag extends Tag
{
    private const INDEX = 2;

    #[Pure] public function __construct(string $value)
    {
        parent::__construct(self::INDEX, $value);
    }
}