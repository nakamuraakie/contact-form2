<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Http\Requests\RegisterRequest; // ← 自作のFormRequestを読み込み
use Illuminate\Validation\ValidationException;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input): User
    {
        // 自作RegisterRequestのルール＆メッセージを使って検証
        $request = new RegisterRequest();
        $validator = Validator::make($input, $request->rules(), $request->messages());

        // 検証失敗時に例外をスロー（Fortifyが自動で戻してくれる）
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // 成功時は登録処理を実行
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
