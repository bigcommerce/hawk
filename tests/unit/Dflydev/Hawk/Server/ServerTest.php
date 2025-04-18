<?php

namespace Dflydev\Hawk\Server;

use Dflydev\Hawk\Credentials\Credentials;
use Dflydev\Hawk\Time\ConstantTimeProvider;
use PHPUnit\Framework\TestCase;

class ServerTest extends TestCase
{
    public function testShouldAuthenticateBewit()
    {
        $credentialsProvider = function ($id) {
            return new Credentials(
                'HX9QcbD-r3ItFEnRcAuOSg',
                'sha256',
                'exqbZWtykFZIh2D7cXi9dA'
            );
        };

        $server = ServerBuilder::create($credentialsProvider)
            ->setTimeProvider(new ConstantTimeProvider(1368996800))
            ->build();

        $response = $server->authenticateBewit(
            'example.com',
            443,
            '/posts?bewit=ZXhxYlpXdHlrRlpJaDJEN2NYaTlkQVwxMzY4OTk2ODAwXE8wbWhwcmdvWHFGNDhEbHc1RldBV3ZWUUlwZ0dZc3FzWDc2dHBvNkt5cUk9XA'
        );

        $this->assertEquals('/posts', $response->artifacts()->resource());
    }
}
