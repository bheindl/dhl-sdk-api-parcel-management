<?php
/**
 * PreferredDayOffer
 *
 * PHP version 5
 *
 * @category Class
 * @package  Dhl\ParcelManagement
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * DHL Parcel Management API
 *
 * OpenAPI spec version: 1.3.1
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Dhl\ParcelManagement\Model;

use ArrayAccess;
use Dhl\ParcelManagement\ObjectSerializer;

/**
 * PreferredDayOffer Class Doc Comment
 *
 * @category Class
 * @description Offer for rescheduling the delivery of the shipment to another day, which is restricted to certain
 *     &#x60;validDays&#x60;
 * @package  Dhl\ParcelManagement
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PreferredDayOffer implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'PreferredDayOffer';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'commitmentEndPeriod' => '\DateTime',
        'validDays' => '\Dhl\ParcelManagement\Model\TimeInterval[]',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'commitmentEndPeriod' => 'date-time',
        'validDays' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'commitmentEndPeriod' => 'commitmentEndPeriod',
        'validDays' => 'validDays',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'commitmentEndPeriod' => 'setCommitmentEndPeriod',
        'validDays' => 'setValidDays',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'commitmentEndPeriod' => 'getCommitmentEndPeriod',
        'validDays' => 'getValidDays',
    ];

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['commitmentEndPeriod'] = isset($data['commitmentEndPeriod']) ? $data['commitmentEndPeriod'] : null;
        $this->container['validDays'] = isset($data['validDays']) ? $data['validDays'] : null;
    }

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['commitmentEndPeriod'] === null) {
            $invalidProperties[] = "'commitmentEndPeriod' can't be null";
        }
        if ($this->container['validDays'] === null) {
            $invalidProperties[] = "'validDays' can't be null";
        }

        return $invalidProperties;
    }

    /**
     * Gets commitmentEndPeriod
     *
     * @return \DateTime
     */
    public function getCommitmentEndPeriod()
    {
        return $this->container['commitmentEndPeriod'];
    }

    /**
     * Sets commitmentEndPeriod
     *
     * @param \DateTime $commitmentEndPeriod An `date-time` formatted according to
     *     [RFC3339](http://xml2rfc.ietf.org/public/rfc/html/rfc3339.html#anchor14) that indicates the commitment
     *     period end of the offer. The commitment end period is computed individually for each offer. This computation
     *     is based on highly dynamic DHL logistics business rules and thus cannot be precomputed on the client side.
     *     The `commitmentEndPeriod` might be prolonged for a certain offer but  is never reduced.
     *
     * @return $this
     */
    public function setCommitmentEndPeriod($commitmentEndPeriod)
    {
        $this->container['commitmentEndPeriod'] = $commitmentEndPeriod;

        return $this;
    }

    /**
     * Gets validDays
     *
     * @return \Dhl\ParcelManagement\Model\TimeInterval[]
     */
    public function getValidDays()
    {
        return $this->container['validDays'];
    }

    /**
     * Sets validDays
     *
     * @param \Dhl\ParcelManagement\Model\TimeInterval[] $validDays List of current valid preferred days of a given
     *     shipment.
     *
     * @return $this
     */
    public function setValidDays($validDays)
    {
        $this->container['validDays'] = $validDays;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed $value Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
