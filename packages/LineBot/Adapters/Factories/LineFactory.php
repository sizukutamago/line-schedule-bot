<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/10/10
 * Time: 16:12
 */

namespace Acme\Adapters\Factories;


use Acme\Adapters\DTO\LineBot\LineMessageRequest;
use Acme\Adapters\DTO\LineBot\LineMessageResponse;
use Acme\Adapters\Factories\Interfaces\LineFactoryInterface;

class LineFactory implements LineFactoryInterface
{
    public function createRequest(string $requestBody, string $signature): LineMessageRequest
    {
        return new LineMessageRequest(
            $requestBody,
            $signature
        );
    }

    public function createResponse(): LineMessageResponse
    {
        // TODO: Implement createResponse() method.
    }
}
