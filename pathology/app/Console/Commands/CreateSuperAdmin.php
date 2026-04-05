<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-super-admin';

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
    $role = Role::where('RoleName', 'Super Admin')->first();

    User::updateOrCreate(
        ['email' => 'superadmin@test.com'],
        [
            'name' => 'Super Admin',
            'password' => Hash::make('password'),
            'role_id' => $role->PK_RoleID
        ]
    );

    $this->info('Super Admin created!');
}
}
