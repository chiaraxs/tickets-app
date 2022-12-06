<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Chiara',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'Jein',
            'email' => 'jein@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'Logan',
            'email' => 'logan@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}