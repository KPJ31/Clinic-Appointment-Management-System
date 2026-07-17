@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Services</h3>
                <p class="text-muted mb-0">Clinic services and service fees.</p>
            </div>
            <a href="{{ url('/servies/create') }}" class="btn btn-primary">Add Service</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Fee</th>
                        <th style="width: 210px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services ?? [] as $service)
                        <tr>
                            <td class="text-center fw-semibold">{{ $service->id }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->description }}</td>
                            <td>{{ number_format($service->fee, 2) }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ url('/servies/' . $service->id) }}" class="btn btn-info btn-sm text-white">View</a>
                                    <a href="{{ url('/servies/' . $service->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ url('/servies/' . $service->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted fw-semibold py-4">No services found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
