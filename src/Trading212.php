<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212;

use MarekSkopal\Trading212\Api\InstrumentsMetadata;
use MarekSkopal\Trading212\Client\Client;
use MarekSkopal\Trading212\Config\Config;

class Trading212
{
    private readonly Client $client;

    private InstrumentsMetadata $instrumentsMetadata;

    public function __construct(Config $config)
    {
        $this->client = new Client($config);
    }

    public function getInstrumentsMetadata(): InstrumentsMetadata
    {
        if (isset($this->instrumentsMetadata)) {
            return $this->instrumentsMetadata;
        }

        $this->instrumentsMetadata = new InstrumentsMetadata($this->client);

        return $this->instrumentsMetadata;
    }
}
