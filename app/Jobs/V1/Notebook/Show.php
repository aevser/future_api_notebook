<?php

namespace App\Jobs\V1\Notebook;

use App\Models\Notebook;
use Illuminate\Foundation\Queue\Queueable;

class Show
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $notebook_id
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $notebook = Notebook::findOrFail($this->notebook_id);
        return $notebook;
    }
}
