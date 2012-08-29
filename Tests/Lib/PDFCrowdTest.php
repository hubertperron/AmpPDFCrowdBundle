<?php

namespace Amp\PDFCrowdBundle\Tests;

use Amp\PDFCrowdBundle\Lib\PDFCrowd;

class PDFCrowdTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $pdfCrowd = new PDFCrowd('username', 'apikey');
    }
}