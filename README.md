AmpPDFCrowdBundle
=================

## Installation and configuration:

Using [composer](http://packagist.org)

    {
        "repositories": [
            {
                "type": "package",
                "package": {
                    "name": "pdfcrowd/pdfcrowd-php",
                    "version": "2.5",
                    "dist": {
                        "url": "http://pdfcrowd.com/static/clients/php/pdfcrowd-2.5-php.zip",
                        "type": "zip"
                    },
                    "autoload": {
                        "files": ["pdfcrowd.php"]
                    }
                }
            }
        ],
        "require": {
            "amp/pdfcrowd-bundle": "dev-master"
        }
    }

### Configuration example

``` yaml
amp_pdf_crowd:
    username: your-username
    apikey: the-api-key
```

### Add the bundle to your application kernel

``` php
<?php
    // File: app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Amp\PDFCrowdBundle\AmpPDFCrowdBundle(),
            // ...
        );
    }
```

## Usage example

### Controller

``` php
<?php

$pdfCrowd = $this->get('amp_pdf_crowd.api');
$url = $this->generateUrl('route_name', array(), true);

$pdfData = $pdfCrowd->convertURI($url);
file_put_contents($this->container->getParameter('kernel.root_dir') . '/web/pdfs/example.pdf', $pdfData); // Make sure this directory is writable
```

### Command

``` bash
 $ app/console pdfcrowd:convert https://github.com/hubertperron/AmpPDFCrowdBundle web/pdfs/example.pdf
```