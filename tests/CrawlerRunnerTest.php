<?php
namespace tests;

use Dotenv\Dotenv;
use extas\components\plugins\Plugin;
use extas\components\plugins\PluginRepository;
use extas\components\quality\crawlers\CrawlerRunner;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\stages\IStageQualityCrawl;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\NullOutput;

class CrawlerRunnerTest extends TestCase
{
    protected IRepository $pluginRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->pluginRepo = new PluginRepository();
    }

    protected function tearDown(): void
    {
        $this->pluginRepo->delete([

        ]);
    }

    public function testCrawl()
    {
        $runner = new CrawlerRunner();

        $this->pluginRepo->create(new Plugin([
            Plugin::FIELD__CLASS => CrawlerNothing::class,
            Plugin::FIELD__STAGE => IStageQualityCrawl::NAME
        ]));
        $output = new NullOutput();
        $runner->crawl($output);
        $this->assertTrue(CrawlerNothing::$ran);
    }
}
