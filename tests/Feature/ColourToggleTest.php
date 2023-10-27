<?php

namespace Tests\Feature;

use App\Livewire\ColourToggle;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ColourToggleTest extends TestCase
{
    use RefreshDatabase;

    public function testTheColourSchemeCanBeToggled()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(ColourToggle::class)
            ->call('toggle')
            ->assertSuccessful();

        $user->refresh();
        $this->assertTrue($user->getDarkMode());

        Livewire::actingAs($user)
            ->test(ColourToggle::class)
            ->call('toggle')
            ->assertSuccessful();

        $user->refresh();
        $this->assertFalse($user->getDarkMode());
    }
}
