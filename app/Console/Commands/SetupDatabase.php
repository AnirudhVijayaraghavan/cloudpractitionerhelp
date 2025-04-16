<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $this->call('migrate:fresh');
        $this->call('db:seed', ['--class' => 'QuestionsSeeder']);
        $this->call('db:seed', ['--class' => 'UsersSeeder']);
        $this->info('Database setup complete!');
    }
}
