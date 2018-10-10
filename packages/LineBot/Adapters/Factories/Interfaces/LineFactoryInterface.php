<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/10/10
 * Time: 16:14
 */

namespace Acme\Adapters\Factories\Interfaces;


use Acme\Adapters\DTO\LineBot\LineMessageRequest;
use Acme\Adapters\DTO\LineBot\LineMessageResponse;

interface LineFactoryInterface
{
    public function createRequest(string $requestBody, string $signature): LineMessageRequest;

    public function createResponse(): LineMessageResponse;
}
