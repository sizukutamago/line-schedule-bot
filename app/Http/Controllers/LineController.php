<?php

namespace App\Http\Controllers;

use Acme\Adapters\DTO\LineBot\LineMessageRequest;
use App\Jobs\LineMessageJob;
use Illuminate\Http\Request;

class LineController extends Controller
{
    public function __invoke(Request $request)
    {
        $lineRequest = new LineMessageRequest($request->getContent(), $request->server('HTTP_X_LINE_SIGNATURE'));
        new LineMessageJob($lineRequest);

        return response()->json();
    }
}
