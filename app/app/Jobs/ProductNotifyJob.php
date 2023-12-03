<?php

namespace App\Jobs;

use App\Mail\NotifyMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProductNotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $prod_id;
    /**
     * Create a new job instance.
     */
    public function __construct($prod_id)
    {
        $this->prod_id = $prod_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to(config('products.email'))->send(new NotifyMail($this->prod_id));
    }
}
