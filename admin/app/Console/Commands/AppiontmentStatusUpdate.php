<?php

namespace App\Console\Commands;

use App\Models\Admin\Appiontment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AppiontmentStatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:appiontmentStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update appiontment status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $appiontments = Appiontment::all();

        foreach ($appiontments as $appiontment) {
            $status = $appiontment->status;
            $inspection_date = $appiontment->inspection_date;
            $inspection_time = $appiontment->inspection_time;
            $inspection_datetime = Carbon::parse($inspection_date . ' ' . $inspection_time);

            if ($status == 'assigned') {
                if ($inspection_datetime < Carbon::now()) {
                    $appiontment->update([
                        'status' => 'late',
                    ]);
                }
            }
        }
    }
}
