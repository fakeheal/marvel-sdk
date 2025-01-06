<?php

declare(strict_types=1);

namespace Chronoarc\Marvel;

use Chronoarc\Marvel\Resource\Characters;
use Chronoarc\Marvel\Resource\Comics;
use Chronoarc\Marvel\Resource\Creators;
use Chronoarc\Marvel\Resource\Events;
use Chronoarc\Marvel\Resource\Series;
use Chronoarc\Marvel\Resource\Stories;
use Saloon\Http\Connector;

/**
 * Marvel Comics API
 */
class Marvel extends Connector
{
    public function __construct(private readonly string $publicKey, private readonly string $privateKey)
    {
    }

    public function resolveBaseUrl(): string
    {
        return 'https://gateway.marvel.com/v1/public';
    }

    public function characters(): Characters
    {
        return new Characters($this);
    }

    public function comics(): Comics
    {
        return new Comics($this);
    }

    public function creators(): Creators
    {
        return new Creators($this);
    }

    public function events(): Events
    {
        return new Events($this);
    }

    public function series(): Series
    {
        return new Series($this);
    }

    public function stories(): Stories
    {
        return new Stories($this);
    }

    protected function defaultQuery(): array
    {
        return [
            'apikey' => $this->publicKey,
            'ts' => time(),
            'hash' => md5(time().$this->privateKey.$this->publicKey)
        ];
    }
}
