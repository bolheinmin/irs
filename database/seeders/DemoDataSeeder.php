<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanySupervisor;
use App\Models\Intern;
use App\Models\Internship;
use App\Models\University;
use App\Models\UniversitySupervisor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Company
        $company = Company::create([
            'name' => 'Solution Hub',
            'type' => 'IT Company',
            'website' => 'www.solutionhub.com',
            'address' => 'Nay Pyi Taw'
        ]);

        // University
        $university = University::create([
            'name' => 'University of Computer Studies(Thaton)',
            'type' => 'Computer University',
            'website' => 'www.ucst.gov.mm',
            'address' => 'Thaton'
        ]);

        $intern = Intern::create([
            'name'  => 'Intern User',
            'email'  => 'intern@gmail.com',
            'password'  => '$2y$12$NdeaD1rnD4iW8dUq.ArUeuEc51XJKaBru.saBe7soUNES9vdZJ0rm', // password
            'university_id'  => $university->id,
            'profile'  => null,
            'phone'  => '0934664738',
            'roll_no'  => '123',
            'nrc_no'  => '12345',
            'date_of_birth'  => '2024-06-09',
            'gender'  => 'male',
            'education'  => 'test',
            'specialization'  => 'cs',
            'class_project'  => 'test',
            'activity'  => 'test',
            'skill'  => 'test',
            'qualification'  => 'test',
            'address'  => 'test',
        ]);

        $internUser = User::create([
            'name' => 'Intern User',
            'email' => 'intern@gmail.com',
            'password' => '$2y$12$NdeaD1rnD4iW8dUq.ArUeuEc51XJKaBru.saBe7soUNES9vdZJ0rm',
            'intern_id' => $intern->id
        ]);

        // Assign the 'intern' role to the user
        $role = Role::where('name', 'intern')->first();
        if ($role) {
            $internUser->assignRole($role);
        }


        // Internship Seeding
        Internship::create([
            'intern_id' => $intern->id,
            'company_id' => $company->id,
            'start_date' => '2024-06-09',
            'end_date' => '2024-06-09',
            'description' => '2023-2024 Internship'
        ]);

        // Company Supervisor Seeding
        $companySupervisor = CompanySupervisor::create([
            'name'  => 'SH Supervisor',
            'email'  => 'shsupervisor@gmail.com',
            'password'  => '$2y$12$NdeaD1rnD4iW8dUq.ArUeuEc51XJKaBru.saBe7soUNES9vdZJ0rm', // password
            'phone'  => '0934664738',
            'position'  => 'Web Developer',
            'company_id'  => $company->id,
            'address'  => 'test',
        ]);

        $companySupervisorUser = User::create([
            'name' => 'SH Supervisor',
            'email' => 'shsupervisor@gmail.com',
            'password' => '$2y$12$NdeaD1rnD4iW8dUq.ArUeuEc51XJKaBru.saBe7soUNES9vdZJ0rm',
            'company_supervisor_id' => $companySupervisor->id
        ]);

        // Assign the 'company-supervisor' role to the user
        $role = Role::where('name', 'company-supervisor')->first();
        if ($role) {
            $companySupervisorUser->assignRole($role);
        }

        // University Supervisor Seeding
        $universitySupervisor = UniversitySupervisor::create([
            'name'  => 'Uni Supervisor',
            'email'  => 'supervisor@gmail.com',
            'password'  => '$2y$12$NdeaD1rnD4iW8dUq.ArUeuEc51XJKaBru.saBe7soUNES9vdZJ0rm', // password
            'phone'  => '0934664738',
            'position'  => 'Web Developer',
            'university_id'  => $university->id,
            'address'  => 'test',
        ]);

        $universitySupervisorUser = User::create([
            'name' => 'Uni Supervisor',
            'email' => 'unisupervisor@gmail.com',
            'password' => '$2y$12$NdeaD1rnD4iW8dUq.ArUeuEc51XJKaBru.saBe7soUNES9vdZJ0rm',
            'university_supervisor_id' => $universitySupervisor->id
        ]);

        // Assign the 'university-supervisor' role to the user
        $role = Role::where('name', 'university-supervisor')->first();
        if ($role) {
            $universitySupervisorUser->assignRole($role);
        }
    }
}
