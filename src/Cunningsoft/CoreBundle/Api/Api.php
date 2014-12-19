<?php

namespace Cunningsoft\CoreBundle\Api;

use Buzz\Browser;

class Api
{
    /**
     * @var Browser
     */
    private $browser;

    public function __construct(Browser $browser)
    {
        $this->browser = $browser;
    }

    /**
     * @param string $host
     *
     * @return \stdClass
     */
    public function status($host)
    {
        $response = $this->browser->get($host . '/api/v1/status');

        return json_decode($response->getContent());
    }
}
