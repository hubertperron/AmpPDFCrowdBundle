<?php

namespace Amp\PDFCrowdBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class ConvertCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('pdfcrowd:convert')
            ->setDescription('Generate a PDF file from an URI')
            ->addArgument('uri', InputArgument::REQUIRED, 'The URI to convert')
            ->addArgument('filename', InputArgument::REQUIRED, 'The filename to generate. Relative paths starts from symfony root dir')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $uri = $input->getArgument('uri');
        $filename = $input->getArgument('filename');

        // Relative paths starts from symfony root dir
        if (strpos($filename, '/') !== 0) {
            $filename = realpath($this->getContainer()->getParameter('kernel.root_dir') . '/..') . '/' . $filename;
        }

        $pdfCrowd = $this->getContainer()->get('amp_pdf_crowd.api');
        $pdfData = $pdfCrowd->convertURI($uri);
        file_put_contents($filename, $pdfData);

        $output->writeln('Generated: ' . $filename);
    }
}