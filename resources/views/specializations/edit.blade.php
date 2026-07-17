@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Edit Specialization</h3>
                <p class="text-muted mb-0">Update the department information.</p>
            </div>
            <a href="{{ url('/specializations') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <form action="{{ route('specialUpdate', $specialization->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $specialization->name ?? '') }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $specialization->description ?? '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Specialization</button>
        </form>
    </div>
@endsection
