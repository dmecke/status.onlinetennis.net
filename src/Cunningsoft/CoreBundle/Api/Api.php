<?php

namespace Cunningsoft\CoreBundle\Api;

use Buzz\Browser;
use Buzz\Exception\RequestException;

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
        try {
            $response = $this->browser->get($host . '/api/v1/status')->getContent();
        } catch (RequestException $e) {
            $response = json_encode(new \stdClass());
        }

        return json_decode($response);
    }
}
