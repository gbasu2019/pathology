<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;

class CreateRoles extends Command
{
    protected $signature = 'roles:seed';
    protected $description = 'Insert default roles';

    public function handle()
    {
        $roles = [
            'Admin',
            'Doctor',
            'Receptionist',
            'LabTechnician',
            'Accounts'
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate([
                'RoleName' => $role
            ]);
        }

        $this->info('Roles inserted successfully!');
    }
}