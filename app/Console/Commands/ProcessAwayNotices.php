<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AwayNotice;
use Carbon\Carbon;

class ProcessAwayNotices extends Command
{
    protected $signature = 'loyola:process-away';

    protected $description = 'Automatically process returning members';

    public function handle()
    {
        $today = Carbon::today();

        AwayNotice::where('status','Approved')

            ->whereDate('return_date','<=',$today)

            ->update([

                'status'=>'Returned'

            ]);

        $this->info('Away Notices Processed.');

        return Command::SUCCESS;
    }
}