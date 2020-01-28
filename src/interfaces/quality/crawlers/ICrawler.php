<?php
namespace extas\interfaces\quality\crawlers;

use extas\interfaces\IItem;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Interface ICrawler
 *
 * @package extas\interfaces\quality
 * @author jeyroik@gmail.com
 */
interface ICrawler extends IItem
{
    const SUBJECT = 'extas.quality.crawler';

    /**
     * @param OutputInterface $output
     *
     * @return ICrawler
     */
    public function crawl(OutputInterface &$output): ICrawler;
}
