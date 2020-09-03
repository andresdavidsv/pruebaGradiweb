<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OwnersModuleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function it_show_the_owners_list()
    {
        $this->get('/owners')
            ->assertStatus(200);
            // ->assertSee('Listado de Propietarios');
    }
}
