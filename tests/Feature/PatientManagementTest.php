<?php

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function patientPayload(array $overrides = []): array
{
    return array_merge([
        'name' => 'John Patient',
        'phone' => '0771234567',
        'email' => 'john.patient@example.com',
        'dob' => '1995-04-12',
        'gender' => 'male',
        'address' => '123 Main Street',
        'boold_group' => 'O+',
        'emergency_contact' => '0777654321',
        'medical_note' => 'No known allergies.',
    ], $overrides);
}

test('patients index and create pages can be loaded', function () {
    $this->get(route('patientIndex'))->assertOk();
    $this->get(route('patientCreate'))->assertOk();
});

test('a patient can be created with profile details', function () {
    $response = $this->post(route('patientSave'), patientPayload());

    $response->assertRedirect(route('patientIndex'));
    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('patients', [
        'name' => 'John Patient',
        'email' => 'john.patient@example.com',
    ]);

    $this->assertDatabaseHas('patient_profiles', [
        'boold_group' => 'O+',
        'emergency_contact' => '0777654321',
        'medical_note' => 'No known allergies.',
    ]);
});

test('patient creation validates required fields', function () {
    $response = $this->post(route('patientSave'), []);

    $response->assertSessionHasErrors([
        'name',
        'phone',
        'email',
        'dob',
        'gender',
        'address',
    ]);
});

test('a patient can be updated', function () {
    $this->post(route('patientSave'), patientPayload());
    $patient = Patient::where('email', 'john.patient@example.com')->firstOrFail();

    $response = $this->put(route('patientUpdate', $patient), patientPayload([
        'name' => 'Jane Patient',
        'email' => 'jane.patient@example.com',
        'gender' => 'female',
        'boold_group' => 'A+',
    ]));

    $response->assertRedirect(route('patientIndex'));
    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('patients', [
        'id' => $patient->id,
        'name' => 'Jane Patient',
        'email' => 'jane.patient@example.com',
        'gender' => 'female',
    ]);

    $this->assertDatabaseHas('patient_profiles', [
        'patient_id' => $patient->id,
        'boold_group' => 'A+',
    ]);
});

test('a patient can be deleted with profile details', function () {
    $this->post(route('patientSave'), patientPayload());
    $patient = Patient::where('email', 'john.patient@example.com')->firstOrFail();

    $response = $this->delete(route('patientDelete', $patient));

    $response->assertRedirect(route('patientIndex'));
    $this->assertDatabaseMissing('patients', ['id' => $patient->id]);
    $this->assertDatabaseMissing('patient_profiles', ['patient_id' => $patient->id]);
});
