<?php

namespace App\Http\Controllers;

use Acme\Adapters\DTO\LineBot\LineMessageRequest;
use Acme\Adapters\Factories\Interfaces\LineFactoryInterface;
use App\Jobs\LineMessageJob;
use Illuminate\Http\Request;

class LineController extends Controller
{
    /**
     * @var LineFactoryInterface
     */
    private $factory;

    public function __construct(LineFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function __invoke(Request $request)
    {
        $lineRequest = $this->factory->createRequest($request->getContent(), $request->server('HTTP_X_LINE_SIGNATURE'));
        new LineMessageJob($lineRequest);

        return response()->json();
    }
}
