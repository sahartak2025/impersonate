<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $accessKeys = [
            'qZ6$wL@8tY',
            '3sRp#K9x@E',
            'dG7%vF!2nX',
            '5hY&jP4b@Z',
            'mN9$tC#7qA',
            'pX3@fA%6kS',
            '8rV!bW2hD$',
            'uL@4iZ9qH%',
            '1oJ$5eF#7s',
            'gK@6mE!3nT'
        ];

        $users = User::where('is_admin', false)->get();
        foreach ($users as $key => $user) {
            $user->access_key = Hash::make($accessKeys[$key]);
            $user->password = Hash::make(123456);
            $user->save();
        }
    }
}
