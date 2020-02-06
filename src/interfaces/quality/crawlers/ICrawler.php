<?php
namespace extas\interfaces\quality\crawlers;

use extas\interfaces\IHasDescription;
use extas\interfaces\plugins\IPlugin;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Interface ICrawler
 *
 * @package extas\interfaces\quality\crawlers
 * @author jeyroik@gmail.com
 */
interface ICrawler extends IPlugin, IHasDescription
{
    /**
     * @param OutputInterface $output
     *
     * @return ICrawler
     */
    public function __invoke(OutputInterface &$output): ICrawler;
}
