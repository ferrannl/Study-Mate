<?php

namespace Tests\Unit;

use App\Teacher;
use PHPUnit\Framework\TestCase;


class TeacherModuleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTeacherModule()
    {
        $teacher = new \app\Teacher();

       $teacher->name = 'karel hansenson';
       $teacher->save();
       $module = new \App\Module();
       $module->name = 'ModuleTest';
       $module->teacher()->attach($teacher->id);
       $module->coordinator = $teacher->id;
       $module->block_name = 'block 1';
       $module->save();

       $this->assertTrue($module->teacher()->first()->name == $teacher->name);
    }
}
