<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Profession;
use Illuminate\Support\Str;

class ProfessionTableSeeder extends Seeder
{

    public function run()
    {
        $professions = [
            'Acting professional',
            'Accountant',
            'Administration professional',
            'Advertising professional',
            'Air Hostess',
            'Airline',
            'Architect',
            'Artist',
            'Banking Professional',
            'Business Person',
            'Chartered Accountant',
            'Chef',
            'Civil Engineer',
            'Clerk',
            'Company Secretary',
            'Consultant',
            'Content Writer',
            'Customer Care Professional',
            'Defense Employee',
            'Dentist',
            'Designer',
            'Doctor',
            'Education Professional',
            'Engineer (Non-Civil)',
            'Entertainment Professional',
            'Fashion Designer',
            'Finance Professional',
            'Government Employee',
            'Healthcare Professional',
            'Hotel & Hospitality Professional',
            'Human Resources Professional',
            'Interior Designer',
            'IT Professional',
            'Journalist',
            'Lawyer',
            'Lecturer',
            'Manager',
            'Marketing Professional',
            'Media Professional',
            'Medical Professional',
            'Merchant Navy',
            'Model',
            'Musician',
            'Nurse',
            'Pharmacist',
            'Pilot',
            'Police',
            'Private Job',
            'Professor',
            'Public Relations Professional',
            'Research Scholar',
            'Retired',
            'Sales Professional',
            'Scientist',
            'Self Employed',
            'Service',
            'Social Worker',
            'Software Professional',
            'Student',
            'Teacher',
            'Technician',
            'Travel Professional',
            'Writer',
            'Other',
        ];

        foreach ($professions as $name) {
            Profession::create([
                'name' => $name,
                'slug' => Str::slug($name, '_'),
                'status' => 1
            ]);
        }
    }
}
