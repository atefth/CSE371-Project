<?php

use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semesters = [
        ['name' => 'Spring\'06', 'division' => 'Spring', 'year' => 2006],
        ['name' => 'Summer\'06', 'division' => 'Summer', 'year' => 2006],
        ['name' => 'Fall\'06', 'division' => 'Fall', 'year' => 2006],
        ['name' => 'Spring\'07', 'division' => 'Spring', 'year' => 2007],
        ['name' => 'Summer\'07', 'division' => 'Summer', 'year' => 2007],
        ['name' => 'Fall\'07', 'division' => 'Fall', 'year' => 2007],
        ['name' => 'Spring\'08', 'division' => 'Spring', 'year' => 2008],
        ['name' => 'Summer\'08', 'division' => 'Summer', 'year' => 2008],
        ['name' => 'Fall\'08', 'division' => 'Fall', 'year' => 2008],
        ['name' => 'Spring\'09', 'division' => 'Spring', 'year' => 2009],
        ['name' => 'Summer\'09', 'division' => 'Summer', 'year' => 2009],
        ['name' => 'Fall\'09', 'division' => 'Fall', 'year' => 2009],
        ['name' => 'Spring\'10', 'division' => 'Spring', 'year' => 2010],
        ['name' => 'Summer\'10', 'division' => 'Summer', 'year' => 2010],
        ['name' => 'Fall\'10', 'division' => 'Fall', 'year' => 2010],
        ['name' => 'Spring\'11', 'division' => 'Spring', 'year' => 2011],
        ['name' => 'Summer\'11', 'division' => 'Summer', 'year' => 2011],
        ['name' => 'Fall\'11', 'division' => 'Fall', 'year' => 2011],
        ['name' => 'Spring\'12', 'division' => 'Spring', 'year' => 2012],
        ['name' => 'Summer\'12', 'division' => 'Summer', 'year' => 2012],
        ['name' => 'Fall\'12', 'division' => 'Fall', 'year' => 2012],
        ['name' => 'Spring\'13', 'division' => 'Spring', 'year' => 2013],
        ['name' => 'Summer\'13', 'division' => 'Summer', 'year' => 2013],
        ['name' => 'Fall\'13', 'division' => 'Fall', 'year' => 2013],
        ['name' => 'Spring\'14', 'division' => 'Spring', 'year' => 2014],
        ['name' => 'Summer\'14', 'division' => 'Summer', 'year' => 2014],
        ['name' => 'Fall\'14', 'division' => 'Fall', 'year' => 2014],
        ['name' => 'Spring\'15', 'division' => 'Spring', 'year' => 2015],
        ['name' => 'Summer\'15', 'division' => 'Summer', 'year' => 2015],
        ['name' => 'Fall\'15', 'division' => 'Fall', 'year' => 2015],
        ];
        foreach ($semesters as $key => $semester) {
            Semester::create($semester);
        }
    }
}
