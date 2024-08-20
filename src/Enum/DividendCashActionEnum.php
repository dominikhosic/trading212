<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Enum;

enum DividendCashActionEnum: string
{
    case Reinvest = 'REINVEST';
    case ToAccountCash = 'TO_ACCOUNT_CASH';
}
