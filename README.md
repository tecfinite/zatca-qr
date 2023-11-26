



## ZATCA Qr code generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tecfinite/zatca-qr.svg?style=flat-square)](https://packagist.org/packages/tecfinite/zatca-qr)
[![Total Downloads](https://img.shields.io/packagist/dt/tecfinite/zatca-qr.svg?style=flat-square)](https://packagist.org/packages/tecfinite/zatca-qr)
[<img width="42" src="https://www.tecfinite.com/assets/img/tfnt-logo.svg" />](https://tecfinite.com)


[//]: # ([![Tests]&#40;https://github.com/tecfinite/zatca-qr/actions/workflows/run-tests.yml/badge.svg?branch=main&#41;]&#40;https://github.com/tecfinite/zatca-qr/actions/workflows/run-tests.yml&#41;)

E-invoice QR code generator, is a simple library to generate QR code image for e-invoice in KSA.

## Installation

You can install the package via composer:

```bash
composer require tecfinite/zatca-qr
```

## Usage

```php
use Tecfinite\ZatcaQr\Tag\InvoiceTotalTag as ZatcaInvoiceTotalTag;
use Tecfinite\ZatcaQr\Tag\SellerTag as ZatcaSellerTag;
use Tecfinite\ZatcaQr\Tag\TimestampTag as ZatcaTimestampTag;
use Tecfinite\ZatcaQr\Tag\VatRegistrationNumberTag as ZatcaVatRegistrationNumberTag;
use Tecfinite\ZatcaQr\Tag\VatTotalTag as ZatcaVatTotalTag;
use Tecfinite\ZatcaQr\ZatcaQr;
````

```php
$qr = new Tecfinite\ZatcaQr();
$qr = new ZatcaQr(
            new ZatcaSellerTag($this->sellerName),
            new ZatcaVatRegistrationNumberTag($this->taxId),
            new ZatcaTimestampTag($this->bookingInvoice->created_at),
            new ZatcaInvoiceTotalTag($this->bookingInvoice->ebs_total_fee),
            new ZatcaVatTotalTag($this->bookingInvoice->ebs_vat_fee),
          );
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Abdurrahman Salem](https://ahussalem.me)

[//]: # (- [All Contributors]&#40;../../contributors&#41;)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
