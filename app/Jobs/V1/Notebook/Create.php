<?php

namespace App\Jobs\V1\Notebook;

use App\Models\Notebook;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\UploadedFile;

class Create
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private string $name,
        private ?string $company,
        private string $phone,
        private string $email,
        private ?string $date_of_birth,
        private ?UploadedFile $url
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $file_path = null;
        if ($this->url instanceof UploadedFile) {
            $file_path = $this->url->store('uploads', 'public');
        }

        $notebook = Notebook::create([
            'name' => $this->name,
            'company' => $this->company,
            'phone' => $this->phone,
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'url' => $file_path
        ]);

        return $notebook;
    }
}