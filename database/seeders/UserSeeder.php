<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_list = [
            [
                'name' => 'administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'ducpnph07209',
                'email' => 'ducpnph07209@fpt.edu.vn',
                'password' => Hash::make('123456')
            ]
        ];

        foreach ($user_list as $item) {
            $model = new User();
            $model->fill($item);
            $model->save();
        }
    }
}