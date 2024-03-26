<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ImpersonateRequest extends FormRequest
{
    public ?User $user;
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
            $this->user = User::findOrFail($this->route('userId'));
            if (!Hash::check($this->input('accessKey'), $this->user->access_key)) {
                $validator->errors()->add('accessKey', 'The access key is incorrect.');
            }
        });
    }
}
