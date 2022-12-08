<?php

namespace Tecfinite\ZatcaQr\Tag;

use JetBrains\PhpStorm\Pure;

abstract class Tag
{
    private int $tag;
    private string $value;

    public function __construct(int $tag, string $value)
    {
        $this->tag = $tag;
        if(mb_detect_encoding($value, ['UTF-8']) === 'UTF-8'){
            $this->value = $value;
        } else {
            $this->value = utf8_decode($value);
        }
    }

    /**
     * @return int
     */
    public function getTag(): int
    {
        return $this->tag;
    }

    /**
     * @return int
     */
    #[Pure] public function getLength(): int
    {
        return strlen($this->hexValue()) / 2;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function hexTag(): string
    {
        return strlen(dechex($this->tag)) ? '0' . dechex($this->tag) : dechex($this->tag);
    }

    /**
     * @return string
     */
    #[Pure] public function hexLength(): string
    {
        return strlen(dechex($this->getLength())) < 2 ? '0' . dechex($this->getLength()) : dechex($this->getLength());
    }

    /**
     * @return string
     */
    public function hexValue(): string
    {
        return bin2hex($this->value);
    }

    /**
     * @return string
     */
    #[Pure] public function __toString(): string
    {
        return $this->hexTag() . $this->hexLength() . $this->hexValue();
    }


}