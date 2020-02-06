<?php
namespace extas\components\quality\crawlers;

use extas\components\plugins\Plugin;
use extas\components\THasDescription;
use extas\interfaces\quality\crawlers\ICrawler;

/**
 * Class Crawler
 *
 * @package extas\interfaces\quality\crawlers
 * @author jeyroik@gmail.com
 */
abstract class Crawler extends Plugin implements ICrawler
{
    use THasDescription;

    protected $title = '';
    protected $description = '';

    /**
     * Crawler constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->setTitle($this->title);
        $this->setDescription($this->description);
    }
}
