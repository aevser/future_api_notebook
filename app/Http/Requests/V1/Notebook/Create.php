<?php

namespace App\Http\Requests\V1\Notebook;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:notebooks',
            'date_of_birth' => 'nullable|date|before:today',
            'url' => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле ФИО обязательно для заполнения.',
            'phone.required' => 'Поле телефона обязательно для заполнения.',

            'email.required' => 'Поле email обязательно для заполнения.',
            'email.unique' => 'Такой E-mail уже зарегистрирован',

            'date_of_birth.date' => 'Дата рождения должна быть в формате ГГГГ-ММ-ДД.',

            'url.file' => 'Загружаемый файл должен быть изображением.',
            'url.mimes' => 'Изображение должно быть в формате jpeg, png или jpg.',
            'url.max' => 'Размер изображения не должен превышать 2 МБ.'
        ];
    }
}
