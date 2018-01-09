<?php
class StudentTableSeeder extends Illuminate\Database\Seeder
{
    public function run()
    {
        App\Student::create([
            'first_name' => 'John',
            'last_name'  => 'Smith',
            'student_id' => 'G999999999',
            'dob'        => '1994-01-04',
			'gpa'        => 3.92,
        ]);

        App\Student::create([
            'first_name' => 'Jane',
            'last_name'  => 'Smith',
            'student_id' => 'G999999998',
            'dob'        => '1994-08-04',
			'gpa'        => 1.00,
        ]);        

        App\Student::create([
            'first_name' => 'Robert',
            'last_name'  => 'Jenkins',
            'student_id' => 'G999999997',
            'dob'        => '1994-03-04',
			'gpa'        => 2.00,
        ]);              
    }
}