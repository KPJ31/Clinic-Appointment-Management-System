@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Appointments</h3>
                <p class="text-muted mb-0">Scheduled patient visits with doctors.</p>
            </div>
            <a href="{{ url('/appoinments/create') }}" class="btn btn-primary">Add Appointment</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Doctor</th>
                        <th>Patient</th>
                        <th>Status</th>
                        <th>Reason</th>
                        <th style="width: 210px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments ?? [] as $appointment)
                        <tr>
                            <td class="text-center fw-semibold">{{ $appointment->id }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>{{ $appointment->doctor->name ?? $appointment->doctor_id }}</td>
                            <td>{{ $appointment->patient->name ?? $appointment->patient_id }}</td>
                            <td><span class="badge text-bg-secondary text-capitalize">{{ $appointment->status }}</span></td>
                            <td>{{ $appointment->reason }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ url('/appoinments/' . $appointment->id) }}" class="btn btn-info btn-sm text-white">View</a>
                                    <a href="{{ url('/appoinments/' . $appointment->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ url('/appoinments/' . $appointment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this appointment?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted fw-semibold py-4">No appointments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
