<?php

use App\Http\Livewire\Occupation\OccupationCreate;
use App\Models\Occupation;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;

it('should be able to create a new occupation', function () {
    $user = User::factory()->create();

    actingAs($user);

    livewire(OccupationCreate::class)
        ->set('name', 'Teste')
        ->call('store')
        ->assertHasNoErrors();

    assertDatabaseCount(Occupation::class, 1);
});
