<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Tests\Api;

use MarekSkopal\Trading212\Api\InstrumentsMetadata;
use MarekSkopal\Trading212\Api\Trading212Api;
use MarekSkopal\Trading212\Client\Client;
use MarekSkopal\Trading212\Config\Config;
use MarekSkopal\Trading212\Dto\InstrumentsMetadata\Exchange;
use MarekSkopal\Trading212\Dto\InstrumentsMetadata\Instrument;
use MarekSkopal\Trading212\Dto\InstrumentsMetadata\TimeEvent;
use MarekSkopal\Trading212\Dto\InstrumentsMetadata\WorkingSchedule;
use MarekSkopal\Trading212\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\Trading212\Trading212;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(InstrumentsMetadata::class)]
#[UsesClass(Trading212::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(Trading212Api::class)]
#[UsesClass(Exchange::class)]
#[UsesClass(WorkingSchedule::class)]
#[UsesClass(TimeEvent::class)]
#[UsesClass(Instrument::class)]
final class InstrumentsMetadataTest extends TestCase
{
    public function testExchangeList(): void
    {
        $instrumentsMetadata = new InstrumentsMetadata(ClientFixture::createWithResponse(
            'exchangeListResponse.json',
        ));

        $exchangeList = $instrumentsMetadata->exchangeList();

        self::assertIsArray($exchangeList);
        self::assertNotEmpty($exchangeList);
        self::assertInstanceOf(Exchange::class, $exchangeList[0]);
    }

    public function testInstrumentList(): void
    {
        $instrumentsMetadata = new InstrumentsMetadata(ClientFixture::createWithResponse(
            'instrumentListResponse.json',
        ));

        $instrumentList = $instrumentsMetadata->instrumentList();

        self::assertIsArray($instrumentList);
        self::assertNotEmpty($instrumentList);
        self::assertInstanceOf(Instrument::class, $instrumentList[0]);
    }
}
