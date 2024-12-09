<?php

namespace App\Jobs\V1\Notebook;

use App\Models\Notebook;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\UploadedFile;

class Update
{
    use Queueable;

    /**
     * Обновить запись по ID
     * @param int $notebook_id - ID записи
     * @param string $name - Имя
     * @param string|null $company - Компания
     * @param string $phone - Телефон
     * @param string $email - Почта
     * @param string|null $date_of_birth - Дата рождения
     * @param UploadedFile|null $url - Фото
     */
    public function __construct(
        private int $notebook_id,
        private string $name,
        private ?string $company,
        private string $phone,
        private string $email,
        private ?string $date_of_birth,
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
        $notebook->update([
            'name' => $this->name,
            'company' => $this->company,
            'phone' => $this->phone,
            'email' => $this->email === $notebook->email ? $notebook->email : $this->email,
            'date_of_birth' => $this->date_of_birth,
        ]);

        return $notebook;
    }
}
