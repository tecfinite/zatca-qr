<?php

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

it('can create ZETCA QR', function () {

    $qr = new Tecfinite\ZatcaQr\ZatcaQr(
        new \Tecfinite\ZatcaQr\Tag\SellerTag('Bobs Records'),
        new \Tecfinite\ZatcaQr\Tag\VatRegistrationNumberTag('310122393500003'),
        new \Tecfinite\ZatcaQr\Tag\TimestampTag('2022-04-25T15:30:00Z'),
        new \Tecfinite\ZatcaQr\Tag\InvoiceTotalTag('1000.00'),
        new \Tecfinite\ZatcaQr\Tag\VatTotalTag('150.00')
    );

    $qrAr = new Tecfinite\ZatcaQr\ZatcaQr(
        new \Tecfinite\ZatcaQr\Tag\SellerTag('مؤسسة تطبيق عنايتي الأولى لتقنية المعلومات'),
        new \Tecfinite\ZatcaQr\Tag\VatRegistrationNumberTag('311094110600003'),
        new \Tecfinite\ZatcaQr\Tag\TimestampTag('now'),
        new \Tecfinite\ZatcaQr\Tag\InvoiceTotalTag('1000.00'),
        new \Tecfinite\ZatcaQr\Tag\VatTotalTag('150.00')
    );

    print $qr->tlvString() . "\n";
    print $qr->toBase64();

    $qr->image()->saveToFile(dirname(__DIR__, 1) . '/output/' . $qr->tlvString().'.png');
    $qrAr->image()->saveToFile(dirname(__DIR__, 1) . '/output/AR-' . substr($qrAr->tlvString(), strlen($qrAr->tlvString())/2).'.png');

/*    try {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($qrAr->toBase64())
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->build();

        $result->saveToFile(dirname(__DIR__, 1) . '/output/test002222qr.png');

    } catch (Exception $e) {
        error_log($e);
    }*/

    $this->assertTrue(true);

    expect(true)->toBeTrue();

});