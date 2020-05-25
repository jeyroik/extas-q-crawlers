<?php
namespace extas\commands;

use extas\components\quality\crawlers\CrawlerRunner;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class QualityCrawlerCommand
 *
 * @package extas\commands
 * @author jeyroik@gmail.com
 */
class QualityCrawlerCommand extends DefaultCommand
{
    protected const VERSION = '0.1.0';
    protected const DEFAULT__PREFIX = 'PluginInstall';

    /**
     * Configure the current command.
     */
    protected function configure()
    {
        $this
            ->setName('q-crawl')
            ->setAliases(['q-c'])
            ->setDescription('Crawl data for qualification.')
            ->setHelp('This command allows you to crawl data for qualification.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function dispatch(InputInterface $input, OutputInterface &$output): void
    {
        (new CrawlerRunner())->crawl($output);
    }
}
