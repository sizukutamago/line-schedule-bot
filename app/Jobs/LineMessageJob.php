<?php

namespace App\Jobs;

use Acme\Adapters\DTO\LineBot\LineMessageRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use LINE\LINEBot;

class LineMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var LineMessageRequest
     */
    private $request;

    /**
     * LineMessageJob constructor.
     * @param LineMessageRequest $request
     */
    public function __construct(LineMessageRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
