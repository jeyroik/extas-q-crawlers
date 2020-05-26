<?php
namespace extas\interfaces\stages;

use extas\interfaces\quality\crawlers\ICrawler;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Interface IStageQualityCrawl
 *
 * @package extas\interfaces\stages
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IStageQualityCrawl
{
    public const NAME = 'extas.quality.crawl';

    /**
     * @param OutputInterface $output
     *
     * @return ICrawler
     */
    public function __invoke(OutputInterface &$output): ICrawler;
}
