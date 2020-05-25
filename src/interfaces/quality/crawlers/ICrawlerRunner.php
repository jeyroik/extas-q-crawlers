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
interface ICrawlerRunner extends IItem
{
    public const SUBJECT = 'extas.quality.crawler.runner';

    /**
     * @param OutputInterface $output
     *
     * @return ICrawlerRunner
     */
    public function crawl(OutputInterface &$output): ICrawlerRunner;
}
