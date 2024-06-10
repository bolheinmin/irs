<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $allPermissions = [
            'company-list',
            'company-show',
            'company-create',
            'company-edit',
            'company-delete',
            'university-list',
            'university-show',
            'university-create',
            'university-edit',
            'university-delete',
            'company-supervisor-list',
            'company-supervisor-show',
            'company-supervisor-create',
            'company-supervisor-edit',
            'company-supervisor-delete',
            'university-supervisor-list',
            'university-supervisor-show',
            'university-supervisor-create',
            'university-supervisor-edit',
            'university-supervisor-delete',
            'intern-list',
            'intern-show',
            'intern-create',
            'intern-edit',
            'intern-delete',
            'internship-list',
            'internship-show',
            'internship-create',
            'internship-edit',
            'internship-delete',
            'weekly-report-list',
            'weekly-report-show',
            'weekly-report-create',
            'weekly-report-edit',
            'weekly-report-delete',
            'intern-report-list',
            'intern-report-export',
            'intern-report-show',
            'intern-report-edit',
        ];

        $adminPermissions = [
            'company-list',
            'company-show',
            'company-create',
            'company-edit',
            'company-delete',
            'university-list',
            'university-show',
            'university-create',
            'university-edit',
            'university-delete',
            'company-supervisor-list',
            'company-supervisor-show',
            'company-supervisor-create',
            'company-supervisor-edit',
            'company-supervisor-delete',
            'university-supervisor-list',
            'university-supervisor-show',
            'university-supervisor-create',
            'university-supervisor-edit',
            'university-supervisor-delete',
            'intern-list',
            'intern-show',
            'intern-create',
            'intern-edit',
            'intern-delete',
            'internship-list',
            'internship-show',
            'internship-create',
            'internship-edit',
            'internship-delete',
            'intern-report-list',
            'intern-report-export',
            'intern-report-show'
        ];

        $companySupervisorPermissions = [
            'intern-report-list',
            'intern-report-export',
            'intern-report-show',
            'intern-report-edit',
        ];

        $uniSupervisorPermissions = [
            'intern-report-list',
            'intern-report-export',
            'intern-report-show',
        ];

        $internPermissions = [
            'weekly-report-list',
            'weekly-report-show',
            'weekly-report-create',
            'weekly-report-edit',
            'weekly-report-delete',
        ];

        // Create permissions
        foreach ($allPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        // Admin Role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions($adminPermissions);

        // Company Supervisor Role
        $companySupervisorRole = Role::firstOrCreate(['name' => 'company-supervisor']);
        $companySupervisorRole->syncPermissions($companySupervisorPermissions);

        // University Supervisor Role
        $universitySupervisorRole = Role::firstOrCreate(['name' => 'university-supervisor']);
        $universitySupervisorRole->syncPermissions($uniSupervisorPermissions);

        // Intern Role
        $internRole = Role::firstOrCreate(['name' => 'intern']);
        $internRole->syncPermissions($internPermissions);
    }
}
