@extends('layouts.app')

@section('main')
    <div class="row align-items-center g-4">
        <div class="col-lg-7">
            <h1 class="page-title mb-3">Clinic Appointment Management System</h1>
            <p class="lead text-secondary mb-4">
                Manage specializations, doctors, patients, appointments, and services from one clean frontend.
            </p>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('specialIndex') }}" class="btn btn-primary">View Specializations</a>
                <a href="{{ url('/specializations/create') }}" class="btn btn-outline-primary">Add Specialization</a>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card content-card p-4">
                <h5 class="fw-bold mb-3">Database Modules</h5>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="muted-box p-3 h-100">
                            <div class="fw-bold">Specializations</div>
                            <small class="text-muted">Name, description</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="muted-box p-3 h-100">
                            <div class="fw-bold">Doctors</div>
                            <small class="text-muted">Contact, fee, schedule</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="muted-box p-3 h-100">
                            <div class="fw-bold">Patients</div>
                            <small class="text-muted">DOB, gender, address</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="muted-box p-3 h-100">
                            <div class="fw-bold">Appointments</div>
                            <small class="text-muted">Date, time, status</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
