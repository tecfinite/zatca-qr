<?php

namespace Tecfinite\ZatcaQr;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Generator
{
    private string $encodedTLV;

    public function __construct(string $encodedTLV)
    {
        $this->encodedTLV = $encodedTLV;
    }

    public function build(): bool|\Endroid\QrCode\Writer\Result\ResultInterface
    {
        try {
            return Builder::create()
                ->writer(new PngWriter())
                ->writerOptions([])
                ->data($this->encodedTLV)
                ->encoding(new Encoding('UTF-8'))
                ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                ->size(300)
                ->margin(0)
                ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->build();

        } catch (\Exception $e) {
            error_log($e);
            return false;
        }
    }

}