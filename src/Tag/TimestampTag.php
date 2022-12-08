<?php

namespace Tecfinite\ZatcaQr\Tag;

use DateTime;
use DateTimeZone;
use JetBrains\PhpStorm\Pure;

class TimestampTag extends Tag
{
    private const INDEX = 3;

    public function __construct(string $value)
    {
        if ( $value === 'now') {
            $value = $this->createNewDate();
        }
        parent::__construct(self::INDEX, $value);
    }

    private function createNewDate(): string
    {
        try {
            $timestamp = new DateTime('now', new DateTimeZone('Asia/Riyadh'));
            return $timestamp->format(\DateTimeInterface::ISO8601);
        } catch (\Exception $e) {
            return '0000-00-00';
        }
    }
}