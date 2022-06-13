<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Ikhsan Heriyawan',
                'email' => 'admin@gmail.com',
                'password' => password_hash('admin', PASSWORD_BCRYPT),
            ]
        ];

        $user = new User();
        $user->insertBatch($data);
    }
}
