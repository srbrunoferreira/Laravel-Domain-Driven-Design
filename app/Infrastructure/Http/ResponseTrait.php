<?php

namespace Infrastructure\Http;

use Illuminate\Support\Str;

trait ResponseTrait
{
    private int $responseHttpCode;
    private array $responseHeaders;
    private $responseBody;
    private string $dataKey = 'data';

    /**
     * @param array|object $responseBody
     * @param int $httpCode
     * @param array $headers
     *
     * @return $this
     */
    protected function response($body = [], int $httpCode = 200, array $headers = [])
    {
        $this->responseBody = $body;
        $this->responseHttpCode = $httpCode;
        $this->responseHeaders = $headers;

        return $this;
    }

    protected function failure()
    {
        return $this->generateResponse(false);
    }

    protected function success()
    {
        return $this->generateResponse(true);
    }

    private function generateResponse($success)
    {
        // $responseBody = $this->responseKeysToCamelCase($this->responseBody);
        // $responseBody = array_merge(['success' => $success], $responseBody);
        $responseBody = json_decode(json_encode($this->responseBody), true);
        $responseBody = array_merge(['success' => $success], $responseBody);

        return response($responseBody)
            ->setStatusCode($this->responseHttpCode)
            ->withHeaders($this->responseHeaders);
    }

    /**
     * Recursively converts the keys of an array to camelCase format.
     *
     * @param array $array
     * @return void
     */
    private function responseKeysToCamelCase($array)
    {
        $array = json_decode(json_encode($array), true);

        $result = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = $this->responseKeysToCamelCase($value);
            } else {
                $result[Str::camel($key)] = $value;
            }
        }

        return $result;
    }
}
