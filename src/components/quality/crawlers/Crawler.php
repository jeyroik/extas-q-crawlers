<?php
namespace extas\components\quality\crawlers;

use extas\components\Item;
use extas\interfaces\quality\crawlers\ICrawler;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Crawler
 *
 * @package extas\components\quality
 * @author jeyroik@gmail.com
 */
class Crawler extends Item implements ICrawler
{
    /**
     * @param OutputInterface $output
     *
     * @return $this
     */
    public function crawl(OutputInterface &$output): ICrawler
    {
        $serviceCrawlerClass = getenv('EXTAS__Q_SERVICE_CRAWLER_CLASS') ?: '';

        if ($serviceCrawlerClass) {
            /**
             * @var $serviceCrawler ICrawler
             */
            $serviceCrawler = new $serviceCrawlerClass();
            $serviceCrawler->crawl($output);
        } else {
            $output->writeln([
                'Missed service crawler class name. ',
                'Please, define <info>EXTAS__Q_SERVICE_CRAWLER_CLASS</info> env parameter.'
            ]);
        }

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
