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
    /**
     * @param string $publicKey
     * @param string $privateKey
     */
    public function __construct(private readonly string $publicKey, private readonly string $privateKey)
    {
    }

    /**
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return 'https://gateway.marvel.com/v1/public';
    }

    /**
     * @return Characters
     */
    public function characters(): Characters
    {
        return new Characters($this);
    }

    /**
     * @return Comics
     */
    public function comics(): Comics
    {
        return new Comics($this);
    }

    /**
     * @return Creators
     */
    public function creators(): Creators
    {
        return new Creators($this);
    }

    /**
     * @return Events
     */
    public function events(): Events
    {
        return new Events($this);
    }

    /**
     * @return Series
     */
    public function series(): Series
    {
        return new Series($this);
    }

    /**
     * @return Stories
     */
    public function stories(): Stories
    {
        return new Stories($this);
    }

    /**
     * @return array|string[]
     */
    protected function defaultQuery(): array
    {
        return [
            'apikey' => $this->publicKey,
            'ts' => time(),
            'hash' => md5(time().$this->privateKey.$this->publicKey)
        ];
    }
}
