<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Tests\Api;

use MarekSkopal\Trading212\Api\HistoricalItems;
use MarekSkopal\Trading212\Api\Trading212Api;
use MarekSkopal\Trading212\Client\Client;
use MarekSkopal\Trading212\Config\Config;
use MarekSkopal\Trading212\Dto\HistoricalItems\Order;
use MarekSkopal\Trading212\Dto\HistoricalItems\Tax;
use MarekSkopal\Trading212\Dto\Pagination;
use MarekSkopal\Trading212\Tests\Fixtures\Client\ClientFixture;
use MarekSkopal\Trading212\Trading212;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(HistoricalItems::class)]
#[UsesClass(Trading212::class)]
#[UsesClass(Client::class)]
#[UsesClass(Config::class)]
#[UsesClass(Trading212Api::class)]
#[UsesClass(Order::class)]
#[UsesClass(Tax::class)]
#[UsesClass(Pagination::class)]
final class HistoricalItemsTest extends TestCase
{
    public function testOrders(): void
    {
        $historicalItems = new HistoricalItems(ClientFixture::createWithResponse(
            'ordersResponse.json',
        ));

        $orders = $historicalItems->orders()->fetchOne();

        self::assertIsArray($orders);
        self::assertNotEmpty($orders);
        self::assertInstanceOf(Order::class, $orders[0]);
    }
}
