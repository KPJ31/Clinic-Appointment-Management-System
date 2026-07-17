<?php

use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function doctorPayload(array $overrides = []): array
{
    $specialization = Specialization::firstOrCreate([
        'name' => 'Cardiology',
    ], [
        'description' => 'Heart care',
    ]);

    $service = Service::firstOrCreate([
        'name' => 'Consultation',
    ], [
        'description' => 'General doctor consultation',
        'fee' => 2500,
    ]);

    return array_merge([
        'name' => 'Dr. Alex Smith',
        'phone' => '0771112222',
        'email' => 'alex.smith@example.com',
        'consulatation_fee' => 3500,
        'available_from' => '09:00',
        'available_to' => '17:00',
        'specialization_id' => $specialization->id,
        'service_ids' => [$service->id],
    ], $overrides);
}

test('doctors index and create pages can be loaded', function () {
    $this->get(route('doctorIndex'))->assertOk();
    $this->get(route('doctorCreate'))->assertOk();
});

test('a doctor can be created with services', function () {
    $payload = doctorPayload();

    $response = $this->post(route('doctorSave'), $payload);

    $response->assertRedirect(route('doctorIndex'));
    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('doctors', [
        'name' => 'Dr. Alex Smith',
        'email' => 'alex.smith@example.com',
        'specialization_id' => $payload['specialization_id'],
    ]);

    $this->assertDatabaseHas('doctor_service', [
        'service_id' => $payload['service_ids'][0],
    ]);
});

test('doctor creation validates required fields', function () {
    $response = $this->post(route('doctorSave'), []);

    $response->assertSessionHasErrors([
        'name',
        'phone',
        'email',
        'consulatation_fee',
        'available_from',
        'available_to',
        'specialization_id',
    ]);
});
