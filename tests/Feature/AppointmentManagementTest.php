<?php

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function appointmentPayload(array $overrides = []): array
{
    $doctorResponse = test()->post(route('doctorSave'), doctorPayload([
        'email' => 'appointment.doctor@example.com',
    ]));
    $doctorResponse->assertSessionHasNoErrors();

    $patientResponse = test()->post(route('patientSave'), patientPayload([
        'email' => 'appointment.patient@example.com',
    ]));
    $patientResponse->assertSessionHasNoErrors();

    return array_merge([
        'appointment_date' => '2026-08-20',
        'appointment_time' => '10:30',
        'reason' => 'Regular checkup',
        'status' => 'confirmed',
        'doctor_id' => Doctor::where('email', 'appointment.doctor@example.com')->firstOrFail()->id,
        'patient_id' => Patient::where('email', 'appointment.patient@example.com')->firstOrFail()->id,
    ], $overrides);
}

test('appointments index and create pages can be loaded', function () {
    $this->get(route('appointmentIndex'))->assertOk();
    $this->get(route('appointmentCreate'))->assertOk();
});

test('an appointment can be created', function () {
    $payload = appointmentPayload();

    $response = $this->post(route('appointmentSave'), $payload);

    $response->assertRedirect(route('appointmentIndex'));
    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('appointments', [
        'appointment_date' => '2026-08-20',
        'appointment_time' => '10:30',
        'reason' => 'Regular checkup',
        'status' => 'confirmed',
        'doctor_id' => $payload['doctor_id'],
        'patient_id' => $payload['patient_id'],
    ]);
});

test('appointment creation validates required fields', function () {
    $response = $this->post(route('appointmentSave'), []);

    $response->assertSessionHasErrors([
        'appointment_date',
        'appointment_time',
        'reason',
        'status',
        'doctor_id',
        'patient_id',
    ]);
});

test('an appointment can be updated', function () {
    $payload = appointmentPayload();
    $this->post(route('appointmentSave'), $payload);
    $appointment = Appointment::firstOrFail();

    $response = $this->put(route('appointmentUpdate', $appointment), array_merge($payload, [
        'appointment_time' => '11:15',
        'status' => 'completed',
    ]));

    $response->assertRedirect(route('appointmentIndex'));
    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('appointments', [
        'id' => $appointment->id,
        'appointment_time' => '11:15',
        'status' => 'completed',
    ]);
});
