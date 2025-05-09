<?php

namespace Dflydev\Hawk\Client;

use Dflydev\Hawk\Credentials\Credentials;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testShouldCreateBewit()
    {
        $client = ClientBuilder::create()->build();

        $tentTestVectorsCredentials = new Credentials(
            'HX9QcbD-r3ItFEnRcAuOSg',
            'sha256',
            'exqbZWtykFZIh2D7cXi9dA'
        );

        $this->assertEquals(
            'ZXhxYlpXdHlrRlpJaDJEN2NYaTlkQVwxMzY4OTk2ODAwXE8wbWhwcmdvWHFGNDhEbHc1RldBV3ZWUUlwZ0dZc3FzWDc2dHBvNkt5cUk9XA',
            $client->createBewit(
                $tentTestVectorsCredentials,
                'https://example.com/posts',
                0,
                array(
                    'timestamp' => 1368996800,
                )
            )
        );
    }
}
