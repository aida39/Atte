<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Worktime;
use App\Models\Breaktime;
use Carbon\Carbon;


class RecordAttendanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:record';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $work_records = Worktime::whereNull('end_worktime')->get();
        foreach ($work_records as $work_record) {
            $work_record->update(['end_worktime' => '23:59:59']);

            $date = Carbon::now()->toDateString();
            Worktime::create([
                'user_id' => $work_record->user_id,
                'date_worktime' => $date,
                'start_worktime' => '00:00:00',
            ]);
        }

        $break_records = Breaktime::whereNull('end_breaktime')->get();
        foreach ($break_records as $break_record) {
            $break_record->update(['end_breaktime' => '23:59:59']);
        }
    }
}
