<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $param = [
            'user_id' => 1,
            'date_worktime' => '2024-01-01',
            'start_worktime' => '09:00:54',
            'end_worktime' => '23:59:59',
        ];
        DB::table('worktimes')->insert($param);
        $param = [
            'user_id' => 2,
            'date_worktime' => '2024-01-01',
            'start_worktime' => '09:30:54',
            'end_worktime' => '20:39:09',
        ];
        DB::table('worktimes')->insert($param);
        $param = [
            'user_id' => 3,
            'date_worktime' => '2024-01-01',
            'start_worktime' => '08:30:34',
            'end_worktime' => '21:00:33',
        ];
        DB::table('worktimes')->insert($param);
        $param = [
            'user_id' => 4,
            'date_worktime' => '2024-01-01',
            'start_worktime' => '12:30:34',
            'end_worktime' => '23:11:30',
        ];
        DB::table('worktimes')->insert($param);
        $param = [
            'user_id' => 5,
            'date_worktime' => '2024-01-01',
            'start_worktime' => '10:17:16',
            'end_worktime' => '20:51:42',
        ];
        DB::table('worktimes')->insert($param);
        $param = [
            'user_id' => 6,
            'date_worktime' => '2024-01-01',
            'start_worktime' => '09:30:54',
            'end_worktime' => '21:39:09',
        ];
        DB::table('worktimes')->insert($param);

        $param = [
            'user_id' => 1,
            'date_worktime' => '2024-01-02',
            'start_worktime' => '09:00:14',
            'end_worktime' => '13:50:32',
        ];
        DB::table('worktimes')->insert($param);
        $param = [
            'user_id' => 4,
            'date_worktime' => '2024-01-02',
            'start_worktime' => '09:11:54',
            'end_worktime' => '20:39:00',
        ];
        DB::table('worktimes')->insert($param);
        $param = [
            'user_id' => 9,
            'date_worktime' => '2024-01-02',
            'start_worktime' => '08:30:34',
            'end_worktime' => '21:00:00',
        ];
        DB::table('worktimes')->insert($param);
        $param = [
            'user_id' => 10,
            'date_worktime' => '2024-01-03',
            'start_worktime' => '09:30:34',
            'end_worktime' => '20:00:11',
        ];
        DB::table('worktimes')->insert($param);

        $param = [
            'worktime_id' => 1,
            'start_breaktime' => '12:00:54',
            'end_breaktime' => '12:59:50',
        ];
        DB::table('breaktimes')->insert($param);
        $param = [
            'worktime_id' => 3,
            'start_breaktime' => '12:30:24',
            'end_breaktime' => '13:39:50',
        ];
        DB::table('breaktimes')->insert($param);
    }
}
