<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/10/05
 * Time: 19:05
 */

namespace Acme\Adapters\DTO\LineBot;


class LineMessageRequest
{
    /**
     * @var string
     */
    private $requestBody;

    /**
     * @var array
     */
    private $request;

    /**
     * @var string
     */
    private $signature;

    public function __construct(string $requestBody, string $signature)
    {
        $this->requestBody = $requestBody;
        $this->signature = $signature;
    }
}
