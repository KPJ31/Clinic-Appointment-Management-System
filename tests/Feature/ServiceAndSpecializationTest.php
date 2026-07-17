<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a specialization can be created', function () {
    $response = $this->post(route('specialSave'), [
        'name' => 'Dermatology',
        'description' => 'Skin treatment',
    ]);

    $response->assertRedirect(route('specialIndex'));
    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('specializations', [
        'name' => 'Dermatology',
    ]);
});

test('a service can be created', function () {
    $response = $this->post(route('serviceSave'), [
        'name' => 'Lab Test',
        'description' => 'Basic lab test',
        'fee' => 1200,
    ]);

    $response->assertRedirect(route('serviceIndex'));
    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('services', [
        'name' => 'Lab Test',
        'fee' => 1200,
    ]);
});

test('main resource pages can be loaded', function () {
    $this->get('/')->assertOk();
    $this->get(route('specialIndex'))->assertOk();
    $this->get(route('specialCreate'))->assertOk();
    $this->get(route('serviceIndex'))->assertOk();
    $this->get(route('serviceCreate'))->assertOk();
});
