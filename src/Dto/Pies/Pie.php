<?php

declare(strict_types=1);

namespace MarekSkopal\Trading212\Dto\Pies;

readonly class Pie
{
    /** @param list<Instrument> $instruments */
    public function __construct(public array $instruments, public Settings $settings,)
    {
    }

    public static function fromJson(string $json): self
    {
        /**
         * @var array{
         *     instruments: list<array{
         *         currentShare: float,
         *         expectedShare: float,
         *         issues: list<array{
         *             name: string,
         *             severity: string,
         *         }>,
         *         ownedQuantity: float,
         *         result: array{
         *             investedValue: float,
         *             result: float,
         *             resultCoef: float,
         *             value: float,
         *         },
         *         ticker: string,
         *     }>,
         *     settings: array{
         *         creationDate: string,
         *         dividendCashAction: string,
         *         endDate: string,
         *         goal: int,
         *         icon: string,
         *         id: int,
         *         initialInvestment: float,
         *         instrumentShares: array<string, float>,
         *         name: string,
         *         publicUrl: string,
         *     }
         *  } $responseContents
         */
        $responseContents = json_decode($json, associative: true);

        return self::fromArray($responseContents);
    }

    /**
     * @param array{
     *     instruments: list<array{
     *         currentShare: float,
     *         expectedShare: float,
     *         issues: list<array{
     *             name: string,
     *             severity: string,
     *         }>,
     *         ownedQuantity: float,
     *         result: array{
     *             investedValue: float,
     *             result: float,
     *             resultCoef: float,
     *             value: float,
     *         },
     *         ticker: string,
     *     }>,
     *     settings: array{
     *         creationDate: string,
     *         dividendCashAction: string,
     *         endDate: string,
     *         goal: int,
     *         icon: string,
     *         id: int,
     *         initialInvestment: float,
     *         instrumentShares: array<string, float>,
     *         name: string,
     *         publicUrl: string,
     *     }
     *  } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            instruments: array_map(
                fn(array $instrument): Instrument => Instrument::fromArray($instrument),
                $data['instruments'],
            ),
            settings: Settings::fromArray($data['settings']),
        );
    }
}
