<?php

namespace App\Console\Commands;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteCompletedTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-completed-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task yang telah selesai akan di Hapus dalam waktu 7 hari';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('status_work' , 'selesai')
                            ->where('updated_at', '<=', Carbon::now()->subDays(7))
                            ->get();

        foreach ($tasks as $task){
            $tasks->delete();
            $this->info('Task ID' . $task->id . 'sudah dihapus dengan halus');
        }
    }

    
}
