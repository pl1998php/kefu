<?php
declare(strict_types=1);
/**
 * Created By PhpStorm.
 * User : Latent
 * Date : 2023/1/15
 * Time : 10:51
 **/

namespace App\Request\Admin;

use Hyperf\Validation\Request\FormRequest;

class AuthRequest extends FormRequest
{
    protected array $scenes = [
        'login' => ['email', 'password'],
    ];

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
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ];
    }
}
