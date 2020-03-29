<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDashboard()
    {
        $this->browse(function (Browser $browser) {

            $randomNumber = rand(1000, 10000);
            $moduleName = "Module" . $randomNumber;
            $teacherName = "Teacher" . $randomNumber;


            $browser->visit('http://studymate.com/login')
                ->type('email', 'admin@studymate.com')
                ->type('password', 'admin1234')
                ->press('login')
                ->pause(2000)
                ->visit('http://studymate.com/teacher/create')
                ->assertSee('Add Teacher')
                ->type('name', $teacherName)
                ->pause(2000)
                ->press('save')
                ->pause(1000)
                ->assertSee($teacherName)
                ->pause(1000);

            $teachers = \App\Teacher::all();
            foreach ($teachers as $teacher) {

                if ($teacher->name == $teacherName) {
                    $teacher_id = $teacher->id;
                    $teacher1 = $teacher;
                }
            }

            $browser->visit('http://studymate.com/module/create')
                ->assertSee('Add a Module')
                ->type('name', $moduleName)
                ->check("input[name='teachers[]']")
                ->select('selectedCoordinator', $teacher_id)
                ->select('selectedBlock', 'block 1')
                ->pause(2000)
                ->press('save')
                ->pause(1000)
                ->assertSee($moduleName);

            $module = \App\Module::where('name', '=', $moduleName)->first();
            $module->teacher()->attach($teacher1);
            $module->save();
            $browser->visit('http://studymate.com/module/edit/' . $module->id)
                ->check("achieved[]")
                ->select('selectedTeacher', $teacher_id)
                ->press('save-module')
                ->pause(2000)
                ->visit('http://studymate.com/guest-dashboard')
                ->assertSee($moduleName);
        });
    }
        public function testEC()
    {
        $this->browse(function (Browser $browser) {

            $randomNumber = rand(1000, 10000);
            $moduleName = "Module".$randomNumber;
            $teacherName = "Teacher".$randomNumber;



            $browser->visit('http://studymate.com/login')
                ->type('email', 'admin@studymate.com')
                ->type('password', 'admin1234')
                ->press('login')
                ->pause(2000)

                ->visit('http://studymate.com/teacher/create')
                ->assertSee('Add Teacher')
                ->type('name', $teacherName)
                ->pause(2000)
                ->press('save')
                ->pause(1000)
                ->assertSee($teacherName)
                ->pause(1000);

            $teachers = \App\Teacher::all();
            foreach ($teachers as $teacher){

                if($teacher->name == $teacherName){
                    $teacher_id = $teacher->id;
                    $teacher1 = $teacher;
                }
            }

            $browser ->visit('http://studymate.com/module/create')
                ->assertSee('Add a Module')
                ->type('name', $moduleName)
                ->check("input[name='teachers[]']")
                ->select('selectedCoordinator', $teacher_id)
                ->select('selectedBlock', 'block 1')
                ->pause(2000)
                ->press('save')
                ->pause(1000)
                ->assertSee($moduleName);

            $randomEC = rand(1, 30);

            $module = \App\Module::where('name', '=', $moduleName)->first();
            $module->teacher()->attach($teacher1);
            $module->save();
            $browser->visit('http://studymate.com/module/edit/'.$module->id)
                ->check("achieved[]")
                ->select('selectedTeacher', $teacher_id)
                ->type('ecValue', $randomEC)
                ->press('save-module')
                ->pause(2000)
                ->visit('http://studymate.com/guest-dashboard')
                ->assertSee($randomEC);
        });
    }
}
