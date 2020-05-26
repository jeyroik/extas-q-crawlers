<?php
namespace tests;

use extas\components\quality\crawlers\Crawler;
use extas\interfaces\quality\crawlers\ICrawler;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CrawlerNothing
 *
 * @package tests
 * @author jeyroik <jeyroik@gmail.com>
 */
class CrawlerNothing extends Crawler
{
    public static bool $ran = false;

    /**
     * @param OutputInterface $output
     * @return $this|ICrawler
     */
    public function __invoke(OutputInterface &$output): ICrawler
    {
        self::$ran = true;

        return $this;
    }
}
