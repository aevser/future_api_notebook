<?php

namespace App\Jobs\V1\Notebook;

use App\Models\Notebook;
use Illuminate\Foundation\Queue\Queueable;

class Delete
{
    use Queueable;

    /**
     * Удалить запись по ID
     * @param int $notebook_id - Запись по ID
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
        $notebook = Notebook::destroy($this->notebook_id);
        return $notebook;
    }
}
