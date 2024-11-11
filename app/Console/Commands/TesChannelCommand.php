<?php

namespace App\Console\Commands;

use App\Events\GotMessage;
use Illuminate\Console\Command;
use function Laravel\Prompts\text;

class TesChannelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send signal test';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label:"Who's ur name?",
            required:true
        );
        GotMessage::dispatch($name);
    }
}
