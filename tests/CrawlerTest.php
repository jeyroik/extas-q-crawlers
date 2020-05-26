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
            public function getSelfTitle(): string
            {
                return $this->title;
            }

            public function getSelfDescription(): string
            {
                return $this->description;
            }

            public function __invoke(OutputInterface &$output): ICrawler
            {
                return $this;
            }
        };

        $this->assertEquals('test-title', $crawler->getSelfTitle());
        $this->assertEquals('test-description', $crawler->getSelfDescription());
    }
}
