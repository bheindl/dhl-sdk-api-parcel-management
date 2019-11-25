<?php
/**
 * See LICENSE.md for license details.
 */
declare(strict_types=1);

namespace Dhl\Sdk\Paket\ParcelManagement\Api;

use Dhl\Sdk\Paket\ParcelManagement\Api\Data\CarrierServiceInterface;
use Dhl\Sdk\Paket\ParcelManagement\Exception\ServiceException;

/**
 * Interface CheckoutServiceInterface
 *
 * Entrypoint for DHL Paket Parcel Management checkout operations.
 *
 * @api
 * @author  Paul Siedler <paul.siedler@netresearch.de>
 * @link    https://www.netresearch.de/
 */
interface CheckoutServiceInterface
{
    /**
     * Obtain a list of available services for the given postal code and date.
     *
     * @param string $recipientZip
     * @param \DateTime $startDate
     * @param string[] $headers
     *
     * @return CarrierServiceInterface[]
     *
     * @throws ServiceException
     */
    public function getCarrierServices(
        string $recipientZip,
        \DateTime $startDate,
        array $headers = []
    ): array;
}
