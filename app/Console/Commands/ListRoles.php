<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class ListRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a list of all roles stored in the db.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $roles = Role::all()->pluck('name');
        foreach($roles as $role) {
            echo $role . "\n";
        }
        return 0;
    }
}
