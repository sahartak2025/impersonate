<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ImpersonateRequest extends FormRequest
{
    private $userId;

    public function __construct()
    {
        $this->userId = $this->route('userId');
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'accessKey' => 'required|string',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $user = User::find($this->userId);
            if (!$user || Hash::make($this->input('accessKey')) !== $user->access_key) {
                $validator->errors()->add('accessKey', 'The access key is incorrect.');
            }
        });
    }
}
