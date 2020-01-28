<?php
namespace extas\components\plugins\installers;

use extas\commands\QualityCrawlerCommand;
use extas\components\plugins\Plugin;

/**
 * Class InstallerQualityCommandPlugin
 *
 * @package extas\components\plugins\installers
 * @author jeyroik@gmail.com
 */
class InstallerQualityCommandPlugin extends Plugin
{
    /**
     * @return QualityCrawlerCommand
     */
    public function __invoke()
    {
        return new QualityCrawlerCommand();
    }
}
