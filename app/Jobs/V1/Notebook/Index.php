<?php

namespace App\Jobs\V1\Notebook;

use App\Models\Notebook;
use Illuminate\Foundation\Queue\Queueable;

class Index
{
    use Queueable;

    /**
     * Загружаем все записи с пагинацией 4 элемента
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $notebook = Notebook::paginate(4);
        return $notebook;
    }
}
