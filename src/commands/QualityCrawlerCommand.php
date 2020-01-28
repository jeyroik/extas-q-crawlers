<?php
namespace extas\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class QualityCrawlerCommand
 *
 * @package extas\commands
 * @author jeyroik@gmail.com
 */
class QualityCrawlerCommand extends Command
{
    protected const VERSION = '0.1.0';
    protected const OPTION__PREFIX = 'prefix';
    protected const OPTION__FILTER = 'filter';
    protected const OPTION__SPECS_PATH = 'specs';
    protected const OPTION__ONLY_EDGE = 'only-edge';

    protected const DEFAULT__PREFIX = 'PluginInstall';

    /**
     * Configure the current command.
     */
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('q-crawl')
            ->setAliases(['q-c'])

            // the short description shown while running "php bin/console list"
            ->setDescription('Crawl data for qualification.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to crawl data for qualification.')

        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|mixed
     * @throws
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $start = microtime(true);

        $crawler = new \extas\components\quality\crawlers\Crawler();
        $crawler->crawl($output);

        $end = microtime(true) - $start;
        $output->writeln(['<info>Finished in ' . $end . ' s.</info>']);

        return 0;
    }
}
