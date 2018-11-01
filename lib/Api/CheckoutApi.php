<?php
/**
 * CheckoutApi
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

namespace Dhl\ParcelManagement\Api;

use Dhl\ParcelManagement\ApiException;
use Dhl\ParcelManagement\Configuration;
use Dhl\ParcelManagement\HeaderSelector;
use Dhl\ParcelManagement\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;

/**
 * CheckoutApi Class Doc Comment
 *
 * @category Class
 * @package  Dhl\ParcelManagement
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CheckoutApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration $config
     * @param HeaderSelector $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation checkoutRecipientZipAvailableServicesGet
     *
     * Queries available services for the given `recipientZip`.
     *
     * @param  string $xEKP DHL customer number of the sender (required)
     * @param  string $recipientZip ZIP code of recipient. (required)
     * @param  \DateTime $startDate Day when the shipment will be dropped be the sender in the DHL parcel center
     *          (required)
     * @param  string $xRequestID HTTP-Header for HTTP request correlation (optional)
     *
     * @throws \Dhl\ParcelManagement\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Dhl\ParcelManagement\Model\AvailableServicesMap
     */
    public function checkoutRecipientZipAvailableServicesGet($xEKP, $recipientZip, $startDate, $xRequestID = null)
    {
        list($response) = $this->checkoutRecipientZipAvailableServicesGetWithHttpInfo(
            $xEKP,
            $recipientZip,
            $startDate,
            $xRequestID
        );

        return $response;
    }

    /**
     * Operation checkoutRecipientZipAvailableServicesGetWithHttpInfo
     *
     * Queries available services for the given `recipientZip`.
     *
     * @param  string $xEKP DHL customer number of the sender (required)
     * @param  string $recipientZip ZIP code of recipient. (required)
     * @param  \DateTime $startDate Day when the shipment will be dropped be the sender in the DHL parcel center
     *          (required)
     * @param  string $xRequestID HTTP-Header for HTTP request correlation (optional)
     *
     * @throws \Dhl\ParcelManagement\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Dhl\ParcelManagement\Model\AvailableServicesMap, HTTP status code, HTTP response headers
     *         (array of strings)
     */
    public function checkoutRecipientZipAvailableServicesGetWithHttpInfo(
        $xEKP,
        $recipientZip,
        $startDate,
        $xRequestID = null
    ) {
        $returnType = '\Dhl\ParcelManagement\Model\AvailableServicesMap';
        $request = $this->checkoutRecipientZipAvailableServicesGetRequest(
            $xEKP,
            $recipientZip,
            $startDate,
            $xRequestID
        );

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Dhl\ParcelManagement\Model\AvailableServicesMap',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Dhl\ParcelManagement\Model\Status',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'checkoutRecipientZipAvailableServicesGet'
     *
     * @param  string $xEKP DHL customer number of the sender (required)
     * @param  string $recipientZip ZIP code of recipient. (required)
     * @param  \DateTime $startDate Day when the shipment will be dropped be the sender in the DHL parcel center
     *          (required)
     * @param  string $xRequestID HTTP-Header for HTTP request correlation (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function checkoutRecipientZipAvailableServicesGetRequest(
        $xEKP,
        $recipientZip,
        $startDate,
        $xRequestID = null
    ) {
        // verify the required parameter 'xEKP' is set
        if ($xEKP === null || (is_array($xEKP) && count($xEKP) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xEKP when calling checkoutRecipientZipAvailableServicesGet'
            );
        }
        // verify the required parameter 'recipientZip' is set
        if ($recipientZip === null || (is_array($recipientZip) && count($recipientZip) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recipientZip when calling checkoutRecipientZipAvailableServicesGet'
            );
        }
        if (!preg_match("/^[0-9]{5}$/", $recipientZip)) {
            throw new \InvalidArgumentException(
                "invalid value for \"recipientZip\" when calling CheckoutApi.checkoutRecipientZipAvailableServicesGet,
                 must conform to the pattern /^[0-9]{5}$/."
            );
        }

        // verify the required parameter 'startDate' is set
        if ($startDate === null || (is_array($startDate) && count($startDate) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $startDate when calling checkoutRecipientZipAvailableServicesGet'
            );
        }

        $resourcePath = '/checkout/{recipientZip}/availableServices';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($startDate !== null) {
            $queryParams['startDate'] = ObjectSerializer::toQueryValue($startDate);
        }
        // header params
        if ($xRequestID !== null) {
            $headerParams['X-Request-ID'] = ObjectSerializer::toHeaderValue($xRequestID);
        }
        // header params
        if ($xEKP !== null) {
            $headerParams['X-EKP'] = ObjectSerializer::toHeaderValue($xEKP);
        }

        // path params
        if ($recipientZip !== null) {
            $resourcePath = str_replace(
                '{' . 'recipientZip' . '}',
                ObjectSerializer::toPathValue($recipientZip),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode(
                $this->config->getUsername() . ":" . $this->config->getPassword()
            );
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('DPDHL-User-Authentication-Token');
        if ($apiKey !== null) {
            $headers['DPDHL-User-Authentication-Token'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    /**
     * Operation checkoutRecipientZipDeliveryDayEstimationGet
     *
     * Queries estimation of delivery day in checkout
     *
     * @param  string $xEKP DHL customer number of the sender (required)
     * @param  string $recipientZip ZIP code of recipient. (required)
     * @param  string $startParcelCenter ID of DHL parcel center where the shipment is initially dropped by the sender
     *          (required)
     * @param  \DateTime $startDate Day when the shipment will be dropped be the sender in the DHL parcel center
     *          (required)
     * @param  string $xRequestID HTTP-Header for HTTP request correlation (optional)
     *
     * @throws \Dhl\ParcelManagement\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Dhl\ParcelManagement\Model\DeliveryDayEstimation
     */
    public function checkoutRecipientZipDeliveryDayEstimationGet(
        $xEKP,
        $recipientZip,
        $startParcelCenter,
        $startDate,
        $xRequestID = null
    ) {
        list($response) = $this->checkoutRecipientZipDeliveryDayEstimationGetWithHttpInfo(
            $xEKP,
            $recipientZip,
            $startParcelCenter,
            $startDate,
            $xRequestID
        );

        return $response;
    }

    /**
     * Operation checkoutRecipientZipDeliveryDayEstimationGetWithHttpInfo
     *
     * Queries estimation of delivery day in checkout
     *
     * @param  string $xEKP DHL customer number of the sender (required)
     * @param  string $recipientZip ZIP code of recipient. (required)
     * @param  string $startParcelCenter ID of DHL parcel center where the shipment is initially dropped by the sender
     *          (required)
     * @param  \DateTime $startDate Day when the shipment will be dropped be the sender in the DHL parcel center
     *          (required)
     * @param  string $xRequestID HTTP-Header for HTTP request correlation (optional)
     *
     * @throws \Dhl\ParcelManagement\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Dhl\ParcelManagement\Model\DeliveryDayEstimation, HTTP status code, HTTP response headers
     *          (array of strings)
     */
    public function checkoutRecipientZipDeliveryDayEstimationGetWithHttpInfo(
        $xEKP,
        $recipientZip,
        $startParcelCenter,
        $startDate,
        $xRequestID = null
    ) {
        $returnType = '\Dhl\ParcelManagement\Model\DeliveryDayEstimation';
        $request = $this->checkoutRecipientZipDeliveryDayEstimationGetRequest(
            $xEKP,
            $recipientZip,
            $startParcelCenter,
            $startDate,
            $xRequestID
        );

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Dhl\ParcelManagement\Model\DeliveryDayEstimation',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Dhl\ParcelManagement\Model\Status',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Create request for operation 'checkoutRecipientZipDeliveryDayEstimationGet'
     *
     * @param  string $xEKP DHL customer number of the sender (required)
     * @param  string $recipientZip ZIP code of recipient. (required)
     * @param  string $startParcelCenter ID of DHL parcel center where the shipment is initially dropped by the sender
     *          (required)
     * @param  \DateTime $startDate Day when the shipment will be dropped be the sender in the DHL parcel center
     *          (required)
     * @param  string $xRequestID HTTP-Header for HTTP request correlation (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function checkoutRecipientZipDeliveryDayEstimationGetRequest(
        $xEKP,
        $recipientZip,
        $startParcelCenter,
        $startDate,
        $xRequestID = null
    ) {
        // verify the required parameter 'xEKP' is set
        if ($xEKP === null || (is_array($xEKP) && count($xEKP) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $xEKP when calling checkoutRecipientZipDeliveryDayEstimationGet'
            );
        }
        // verify the required parameter 'recipientZip' is set
        if ($recipientZip === null || (is_array($recipientZip) && count($recipientZip) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $recipientZip when calling checkoutRecipientZipDeliveryDayEstimationGet'
            );
        }
        if (!preg_match("/^[0-9]{5}$/", $recipientZip)) {
            throw new \InvalidArgumentException(
                "invalid value for \"recipientZip\" when calling 
                CheckoutApi.checkoutRecipientZipDeliveryDayEstimationGet, must conform to the pattern /^[0-9]{5}$/."
            );
        }

        // verify the required parameter 'startParcelCenter' is set
        if ($startParcelCenter === null || (is_array($startParcelCenter) && count($startParcelCenter) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $startParcelCenter
                 when calling checkoutRecipientZipDeliveryDayEstimationGet'
            );
        }
        if (!preg_match("/^[0-9]{1,2}$/", $startParcelCenter)) {
            throw new \InvalidArgumentException(
                "invalid value for \"startParcelCenter\" when calling
                 CheckoutApi.checkoutRecipientZipDeliveryDayEstimationGet, must conform to the pattern /^[0-9]{1,2}$/."
            );
        }

        // verify the required parameter 'startDate' is set
        if ($startDate === null || (is_array($startDate) && count($startDate) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $startDate when calling checkoutRecipientZipDeliveryDayEstimationGet'
            );
        }

        $resourcePath = '/checkout/{recipientZip}/deliveryDayEstimation';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($startParcelCenter !== null) {
            $queryParams['startParcelCenter'] = ObjectSerializer::toQueryValue($startParcelCenter);
        }
        // query params
        if ($startDate !== null) {
            $queryParams['startDate'] = ObjectSerializer::toQueryValue($startDate);
        }
        // header params
        if ($xRequestID !== null) {
            $headerParams['X-Request-ID'] = ObjectSerializer::toHeaderValue($xRequestID);
        }
        // header params
        if ($xEKP !== null) {
            $headerParams['X-EKP'] = ObjectSerializer::toHeaderValue($xEKP);
        }

        // path params
        if ($recipientZip !== null) {
            $resourcePath = str_replace(
                '{' . 'recipientZip' . '}',
                ObjectSerializer::toPathValue($recipientZip),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode(
                $this->config->getUsername() . ":" . $this->config->getPassword()
            );
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('DPDHL-User-Authentication-Token');
        if ($apiKey !== null) {
            $headers['DPDHL-User-Authentication-Token'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);

        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
