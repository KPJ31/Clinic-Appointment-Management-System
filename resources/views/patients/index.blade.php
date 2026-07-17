@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Patients</h3>
                <p class="text-muted mb-0">Patient contact and profile records.</p>
            </div>
            <a href="{{ url('/patients/create') }}" class="btn btn-primary">Add Patient</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Blood Group</th>
                        <th style="width: 210px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patients ?? [] as $patient)
                        <tr>
                            <td class="text-center fw-semibold">{{ $patient->id }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->dob }}</td>
                            <td class="text-capitalize">{{ $patient->gender }}</td>
                            <td>{{ $patient->profile->boold_group ?? '-' }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ url('/patients/' . $patient->id) }}" class="btn btn-info btn-sm text-white">View</a>
                                    <a href="{{ url('/patients/' . $patient->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ url('/patients/' . $patient->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this patient?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted fw-semibold py-4">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
