<?php

namespace OpenCloud\Common\Api;

use GuzzleHttp\ClientInterface;

/**
 * An operator is any resource or service that can invoke and send REST operations. In other words, it
 * is any class that can send requests and receive responses with a HTTP client. To do this
 * it needs two things: a {@see ClientInterface} for handling HTTP transactions and an {@see ApiInterface}
 * for handling how operations are created.
 *
 * @package OpenCloud\Common\Api
 */
interface OperatorInterface
{
    /**
     * @param ClientInterface $client The HTTP client responsible for handling HTTP transactions
     * @param ApiInterface    $api    The data API class that dictates how REST operations are structured
     */
    public function __construct(ClientInterface $client, ApiInterface $api);

    /**
     * A convenience method that assembles an operation and sends it to the remote API
     *
     * @param array $definition The data that dictates how the operation works
     * @param array $userValues The user-defined values that populate the request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function execute(array $definition, array $userValues = []);

    /**
     * A convenience method that assembles an operation and asynchronously sends it to the remote API
     *
     * @param array $definition The data that dictates how the operation works
     * @param array $userValues The user-defined values that populate the request
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function executeAsync(array $definition, array $userValues = []);

    /**
     * @param string $name The name of the model class.
     * @param mixed  $data Either a {@see ResponseInterface} or data array that will populate the newly
     *                     created model class.
     *
     * @return \OpenCloud\Common\Resource\ResourceInterface
     */
    public function model($name, $data = null);
}
