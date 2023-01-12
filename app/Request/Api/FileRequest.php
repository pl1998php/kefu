<?php

declare(strict_types=1);


namespace App\Request\Api;

use Hyperf\Validation\Request\FormRequest;
use Hyperf\Validation\Rule;

class FileRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'file' => 'required|max:500',
            'fileType' => ['required',Rule::in(['image','file'])],
        ];
    }

    public function messages(): array
    {
        return [
          'file.size' => '文件大小不能高于500kb',
        ];
    }
}