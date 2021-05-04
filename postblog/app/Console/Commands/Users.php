<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class Users extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:list {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all user from user table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $headers = ["ID","Name","Email"];
        $users= user::select('id','name','email')->where('id',$this->argument('id'))->get();
        $this->table($headers,$users);
    }
}
