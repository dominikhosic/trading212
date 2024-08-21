<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Api;

use MarekSkopal\Trading212\Dto\HistoricalItems\Order;
use MarekSkopal\Trading212\Dto\Pagination;

class HistoricalItems extends Trading212Api
{
    /** @return Pagination<Order> */
    public function orders(): Pagination
    {
        $response = $this->client->get(
            path: '/api/v0/equity/orders',
            queryParams: [],
        );

        /** @var Pagination<Order> $pagination */
        $pagination = Pagination::fromJson($this->client, Order::class, $response);
        return $pagination;
    }
}
