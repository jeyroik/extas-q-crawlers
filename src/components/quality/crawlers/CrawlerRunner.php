<?php
namespace extas\components\quality\crawlers;

use extas\components\Item;
use extas\interfaces\quality\crawlers\ICrawler;
use extas\interfaces\quality\crawlers\ICrawlerRunner;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Crawler
 *
 * @package extas\components\quality
 * @author jeyroik@gmail.com
 */
class CrawlerRunner extends Item implements ICrawlerRunner
{
    /**
     * @param OutputInterface $output
     *
     * @return $this
     */
    public function crawl(OutputInterface &$output): ICrawlerRunner
    {
        foreach ($this->getPluginsByStage('extas.quality.crawl') as $crawler) {
            /**
             * @var $crawler ICrawler
             */
            $output->writeln([
                'Start crawler <info>' . $crawler->getTitle() . ': ' . $crawler->getDescription() . '</info>'
            ]);
            $crawler($output);
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
