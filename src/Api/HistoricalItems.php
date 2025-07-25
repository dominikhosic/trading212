<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Api;

use MarekSkopal\Trading212\Dto\HistoricalItems\Dividend;
use MarekSkopal\Trading212\Dto\HistoricalItems\Export;
use MarekSkopal\Trading212\Dto\HistoricalItems\ExportCsv;
use MarekSkopal\Trading212\Dto\HistoricalItems\Order;
use MarekSkopal\Trading212\Dto\HistoricalItems\Report;
use MarekSkopal\Trading212\Dto\HistoricalItems\Transaction;
use MarekSkopal\Trading212\Dto\Pagination;
use MarekSkopal\Trading212\Exception\InvalidArgumentException;

class HistoricalItems extends Trading212Api
{
    /** @return Pagination<Order> */
    public function orders(?string $ticker = null, ?int $cursor = null, int $limit = 20): Pagination
    {
        $response = $this->client->get(
            path: '/api/v0/equity/history/orders',
            queryParams: [
                'ticker' => $ticker,
                'cursor' => $cursor,
                'limit' => $limit,
            ],
        );

        /** @var Pagination<Order> $pagination */
        $pagination = Pagination::fromJson($this->client, Order::class, $response);
        return $pagination;
    }

    /** @return Pagination<Dividend> */
    public function dividends(?string $ticker = null, ?int $cursor = null, int $limit = 20): Pagination
    {
        $response = $this->client->get(
            path: '/api/v0/history/dividends',
            queryParams: [
                'ticker' => $ticker,
                'cursor' => $cursor,
                'limit' => $limit,
            ],
        );

        /** @var Pagination<Dividend> $pagination */
        $pagination = Pagination::fromJson($this->client, Dividend::class, $response);
        return $pagination;
    }

    /** @return list<Export> */
    public function exports(): array
    {
        $response = $this->client->get(
            path: '/api/v0/history/exports',
            queryParams: [],
        );

        return Export::fromJsonList($response);
    }

    public function exportCsv(ExportCsv $exportCsv): Report
    {
        if ($exportCsv->timeTo->diff($exportCsv->timeFrom)->y >= 1) {
            throw new InvalidArgumentException('The maximum range is 1 year.');
        }

        $response = $this->client->post(
            path: '/api/v0/history/exports',
            queryParams: [],
            body: $exportCsv,
        );

        return Report::fromJson($response);
    }

    /** @return Pagination<Transaction> */
    public function transactionList(?string $cursor = null, int $limit = 20): Pagination
    {
        $response = $this->client->get(
            path: '/api/v0/history/transactions',
            queryParams: [
                'cursor' => $cursor,
                'limit' => $limit,
            ],
        );

        /** @var Pagination<Transaction> $pagination */
        $pagination = Pagination::fromJson($this->client, Transaction::class, $response);
        return $pagination;
    }
}
