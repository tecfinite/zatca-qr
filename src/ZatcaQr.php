<?php

namespace Tecfinite\ZatcaQr;


use JetBrains\PhpStorm\Pure;
use Tecfinite\ZatcaQr\Tag\InvoiceTotalTag;
use Tecfinite\ZatcaQr\Tag\SellerTag;
use Tecfinite\ZatcaQr\Tag\TimestampTag;
use Tecfinite\ZatcaQr\Tag\VatRegistrationNumberTag;
use Tecfinite\ZatcaQr\Tag\VatTotalTag;



class ZatcaQr
{

    /*
     * Local Variables
     * */
    private Generator $qr;

    /*
     * Zatca Tags
     * */
    private SellerTag $seller;
    private VatRegistrationNumberTag $vatRegistrationNumber;
    private TimestampTag $timestampTag;
    private InvoiceTotalTag $invoiceTotal;
    private VatTotalTag $vatTotal;

    /**
     * @param SellerTag $seller
     * @param VatRegistrationNumberTag $vatRegistrationNumber
     * @param TimestampTag $timestampTag
     * @param InvoiceTotalTag $invoiceTotal
     * @param VatTotalTag $vatTotal
     */
    public function __construct(
        SellerTag                $seller,
        VatRegistrationNumberTag $vatRegistrationNumber,
        TimestampTag             $timestampTag,
        InvoiceTotalTag          $invoiceTotal,
        VatTotalTag              $vatTotal
    )
    {
        $this->seller = $seller;
        $this->vatRegistrationNumber = $vatRegistrationNumber;
        $this->timestampTag = $timestampTag;
        $this->invoiceTotal = $invoiceTotal;
        $this->vatTotal = $vatTotal;
    }

    /**
     * @return string
     */
    public function tlvString(): string
    {
        return $this->seller . $this->vatRegistrationNumber . $this->timestampTag . $this->invoiceTotal . $this->vatTotal;
    }


    /**
     * @return string
     */
    #[Pure] public function toBase64(): string
    {
        return base64_encode(pack('H*', $this->tlvString()));
    }

    #[Pure] public function image(): bool|\Endroid\QrCode\Writer\Result\ResultInterface
    {
        return (new Generator($this->toBase64()))->build();
    }


}
