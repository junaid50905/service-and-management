<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Admin\Appiontment;

class ReleaseBlockedEngineer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'release:blockedEngineer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command releases a blocked engineer';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $appiontments = Appiontment::all();

        foreach ($appiontments as $appiontment) {
            $reserve = $appiontment->reserve;

            if ($reserve == 'true') {
                Appiontment::where('id', $appiontment->id)->update([
                    'reserve' => 'false',
                    'blockedEngineerId' => -1
                ]);
            }
        }
    }
}
