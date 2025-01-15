<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $users = [
      [
        "name" => "Student Role",
        "email" => "student@mail.com",
        "password" => bcrypt(12345678),
        "role" => "student",
      ],
      [
        "name" => "Instructor Role",
        "email" => "instructor@mail.com",
        "password" => bcrypt(12345678),
        "role" => "instructor",
      ]
    ];
    User::insert($users);
  }
}
