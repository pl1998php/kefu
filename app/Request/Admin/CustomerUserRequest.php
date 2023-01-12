<?php
declare(strict_types=1);
/**
 * Created By PhpStorm.
 * User : Latent
 * Date : 2023/1/15
 * Time : 17:44
 **/

namespace App\Request\Admin;

use App\Enum\DatabaseEnum;
use Hyperf\Validation\Request\FormRequest;

class CustomerUserRequest extends FormRequest
{
    protected array $scenes = [
        'update' => ['name', 'avatar','email','wx','six','phone','password','password_confirmation','id'],
        'store'  => ['name', 'avatar','email','wx','six','phone','password','password_confirmation','id'],
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
            'name'     => 'required|min:1|max:10',
            'id'       => 'required|',
            'avatar'   => 'required|max:255',
            'email'    => 'required|email|unique:'.DatabaseEnum::CUSTOMER_CONNECTION.'.customer_users,id',
            'wx'       => 'required',
            'six'      => 'required|in:1,2',
            'phone'    => 'required|regex:/^1[34578]\d{9}$/',
            'password' => 'min:6|max:20',
            'password_confirmation' => 'confirmed:password',
        ];
    }
}
