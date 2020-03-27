<?php

namespace Tests\Browser;

use App\Module;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditModuleTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = \App\User::find(1);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/module/edit/1')
                ->pause(4000)
                ->type('name', 'ITSMANN')
                ->check("input[name='teachers[]']")
                ->select('@selectedCoordinator', 1)
                ->select('@selectedTeacher', 1)
                ->select('@selectedBlock', 'block 1')
                ->check("input[name='achieved[]']")
                ->type('@ecValue', 1)
                ->click('@save-module')
                ->pause(4000)
                ->assertPathIs('/admin-dashboard')
                ->assertSee('ITSMANN');
        });
    }
}
