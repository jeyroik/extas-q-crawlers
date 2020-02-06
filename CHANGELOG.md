# 0.2.0

## Fully rebuild crawler logic.

- Now stage `extas.quality.crawl` is calling instead of running exactly one crawler.
- Now `ICrawler` contain title and description and extends `extas\interfaces\plugins\IPlugin`.
- To build your own crawler, please extend `extas\components\quality\crawlers\Crawler` and fill in title and description (as properties).
 