<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->delete();
        User::insert([
            [
                'name'   => 'Admin',
                'email'       => 'admin@admin.com',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password'    => bcrypt('password'),
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}