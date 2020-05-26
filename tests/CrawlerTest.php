<?php
namespace tests;

use Dotenv\Dotenv;
use extas\components\quality\crawlers\Crawler;
use extas\interfaces\quality\crawlers\ICrawler;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\OutputInterface;

class CrawlerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
    }

    public function testConstruct()
    {
        $crawler = new class ([
            Crawler::FIELD__TITLE => 'test-title',
            Crawler::FIELD__DESCRIPTION => 'test-description'
        ]) extends Crawler {
            protected string $title = 'test-title';
            protected string $description = 'test-description';

            public function __invoke(OutputInterface &$output): ICrawler
            {
                return $this;
            }
        };

        $this->assertEquals('test-title', $crawler->getTitle());
        $this->assertEquals('test-description', $crawler->getDescription());
    }
}
