<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace Dhl\Sdk\Paket\ParcelManagement\Service\CheckoutService;

use Dhl\Sdk\Paket\ParcelManagement\Api\Data\AreaTimeFrameOptionInterface;

/**
 * AreaTimeFrameOption
 *
 * @package Dhl\Sdk\Paket\ParcelManagement\Service
 * @author  Paul Siedler <paul.siedler@netresearch.de>
 * @link    https://www.netresearch.de/
 */
class AreaTimeFrameOption implements AreaTimeFrameOptionInterface
{
    /**
     * @var string
     */
    private $start;

    /**
     * @var string
     */
    private $end;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $denselyPopulatedAreaId;

    /**
     * @var string
     */
    private $denselyPopulatedAreaName;

    /**
     * @var string
     */
    private $deliveryBaseId;

    /**
     * AreaTimeFrameOption constructor.
     * @param string $start
     * @param string $end
     * @param string $code
     * @param string $denselyPopulatedAreaId
     * @param string $denselyPopulatedAreaName
     * @param string $deliveryBaseId
     */
    public function __construct(
        string $start,
        string $end,
        string $code,
        string $denselyPopulatedAreaId,
        string $denselyPopulatedAreaName,
        string $deliveryBaseId
    ) {
        $this->start = $start;
        $this->end = $end;
        $this->code = $code;
        $this->denselyPopulatedAreaId = $denselyPopulatedAreaId;
        $this->denselyPopulatedAreaName = $denselyPopulatedAreaName;
        $this->deliveryBaseId = $deliveryBaseId;
    }

    /**
     * @return string
     */
    public function getStart(): string
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd(): string
    {
        return $this->end;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDenselyPopulatedAreaId(): string
    {
        return $this->denselyPopulatedAreaId;
    }

    /**
     * @return string
     */
    public function getDenselyPopulatedAreaName(): string
    {
        return $this->denselyPopulatedAreaName;
    }

    /**
     * @return string
     */
    public function getDeliveryBaseId(): string
    {
        return $this->deliveryBaseId;
    }
}
