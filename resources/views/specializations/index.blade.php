@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Specializations</h3>
                <p class="text-muted mb-0">Medical departments available in the clinic.</p>
            </div>
            <a href="{{ route('specialCreate') }}" class="btn btn-primary">Add Specialization</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="width: 210px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($specializations ?? [] as $specialization)
                        <tr>
                            <td class="text-center fw-semibold">{{ $specialization->id }}</td>
                            <td>{{ $specialization->name }}</td>
                            <td>{{ $specialization->description }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ url('/specializations/' . $specialization->id) }}" class="btn btn-info btn-sm text-white">View</a>
                                    <a href="{{ url('/specializations/' . $specialization->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ url('/specializations/' . $specialization->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this specialization?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted fw-semibold py-4">
                                No specializations found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
