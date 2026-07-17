@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Doctors</h3>
                <p class="text-muted mb-0">Doctor contact, consultation, and availability records.</p>
            </div>
            <a href="{{ url('/doctors/create') }}" class="btn btn-primary">Add Doctor</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Fee</th>
                        <th>Available</th>
                        <th>Specialization</th>
                        <th style="width: 210px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($doctors ?? [] as $doctor)
                        <tr>
                            <td class="text-center fw-semibold">{{ $doctor->id }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ number_format($doctor->consulatation_fee, 2) }}</td>
                            <td>{{ $doctor->available_from }} - {{ $doctor->available_to }}</td>
                            <td>{{ $doctor->specialization->name ?? $doctor->specialization_id }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ url('/doctors/' . $doctor->id) }}" class="btn btn-info btn-sm text-white">View</a>
                                    <a href="{{ url('/doctors/' . $doctor->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ url('/doctors/' . $doctor->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this doctor?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted fw-semibold py-4">No doctors found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
