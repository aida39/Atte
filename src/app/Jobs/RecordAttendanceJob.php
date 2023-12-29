<?php

namespace App\Jobs;

use App\Models\Worktime;
use App\Models\Breaktime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RecordAttendanceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $work_records = Worktime::whereNull('end_worktime')->get();
        foreach ($work_records as $work_record) {
            $work_record->update(['end_worktime' => '23:59:59']);
        }

        $break_records = Breaktime::whereNull('end_breaktime')->get();
        foreach ($break_records as $break_record) {
            $break_record->update(['end_breaktime' => '23:59:59']);
        }
    }
}
