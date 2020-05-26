<?php
namespace tests;

use Dotenv\Dotenv;
use extas\commands\QualityCrawlerCommand;
use extas\components\plugins\installers\InstallerQualityCommandPlugin;
use PHPUnit\Framework\TestCase;

/**
 * Class InstallerQualityCommandPluginTest
 *
 * @package tests
 * @author jeyroik <jeyroik@gmail.com>
 */
class InstallerQualityCommandPluginTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
    }

    public function testValid()
    {
        $plugin = new InstallerQualityCommandPlugin();
        $command = $plugin();
        $this->assertInstanceOf(QualityCrawlerCommand::class, $command);
    }
}
