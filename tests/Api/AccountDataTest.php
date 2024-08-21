<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Tests\Api;

use MarekSkopal\Trading212\Api\AccountData;
use MarekSkopal\Trading212\Api\Trading212Api;
use MarekSkopal\Trading212\Client\Client;
use MarekSkopal\Trading212\Config\Config;
use MarekSkopal\Trading212\Dto\AccountData\AccountCash;
use MarekSkopal\Trading212\Dto\AccountData\AccountMetadata;
use MarekSkopal\Trading212\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\Trading212\Trading212;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AccountData::class)]
#[UsesClass(Trading212::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(Trading212Api::class)]
#[UsesClass(AccountCash::class)]
#[UsesClass(AccountMetadata::class)]
final class AccountDataTest extends TestCase
{
    public function testAccountCash(): void
    {
        $accountData = new AccountData(ClientFixture::createWithResponse(
            'accountCashResponse.json',
        ));

        $accountCash = $accountData->accountCash();

        self::assertInstanceOf(AccountCash::class, $accountCash);
    }

    public function testAccountMetadata(): void
    {
        $accountData = new AccountData(ClientFixture::createWithResponse(
            'accountMetadataResponse.json',
        ));

        $accountMetadata = $accountData->accountMetadata();

        self::assertInstanceOf(AccountMetadata::class, $accountMetadata);
    }
}
