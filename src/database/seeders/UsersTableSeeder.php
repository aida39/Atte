<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Worktime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'user01',
            'email' => 'user01@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'user02',
            'email' => 'user02@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'user03',
            'email' => 'user03@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'user04',
            'email' => 'user04@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'user05',
            'email' => 'user05@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'user06',
            'email' => 'user06@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'user07',
            'email' => 'user07@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'user08',
            'email' => 'user08@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'user09',
            'email' => 'user09@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'user10',
            'email' => 'user10@example.com',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);

        Worktime::factory()->count(5)->create();

    }
}
