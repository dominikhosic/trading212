<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212;

use MarekSkopal\Trading212\Api\AccountData;
use MarekSkopal\Trading212\Api\EquityOrders;
use MarekSkopal\Trading212\Api\HistoricalItems;
use MarekSkopal\Trading212\Api\InstrumentsMetadata;
use MarekSkopal\Trading212\Api\PersonalPortfolio;
use MarekSkopal\Trading212\Api\Pies;
use MarekSkopal\Trading212\Client\Client;
use MarekSkopal\Trading212\Config\Config;

class Trading212
{
    private readonly Client $client;

    private InstrumentsMetadata $instrumentsMetadata;

    private Pies $pies;

    private EquityOrders $equityOrders;

    private AccountData $accountData;

    private PersonalPortfolio $personalPortfolio;

    private HistoricalItems $historicalItems;

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

    public function getPies(): Pies
    {
        if (isset($this->pies)) {
            return $this->pies;
        }

        $this->pies = new Pies($this->client);

        return $this->pies;
    }

    public function getEquityOrders(): EquityOrders
    {
        if (isset($this->equityOrders)) {
            return $this->equityOrders;
        }

        $this->equityOrders = new EquityOrders($this->client);

        return $this->equityOrders;
    }

    public function getAccountData(): AccountData
    {
        if (isset($this->accountData)) {
            return $this->accountData;
        }

        $this->accountData = new AccountData($this->client);

        return $this->accountData;
    }

    public function getPersonalPortfolio(): PersonalPortfolio
    {
        if (isset($this->personalPortfolio)) {
            return $this->personalPortfolio;
        }

        $this->personalPortfolio = new PersonalPortfolio($this->client);

        return $this->personalPortfolio;
    }

    public function getHistoricalItems(): HistoricalItems
    {
        if (isset($this->historicalItems)) {
            return $this->historicalItems;
        }

        $this->historicalItems = new HistoricalItems($this->client);

        return $this->historicalItems;
    }
}
