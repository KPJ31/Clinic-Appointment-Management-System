@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Add Doctor</h3>
                <p class="text-muted mb-0">Create a doctor record linked to a specialization.</p>
            </div>
            <a href="{{ url('/doctors') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <form action="{{ url('/doctors') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="specialization_id" class="form-label">Specialization</label>
                    <select id="specialization_id" name="specialization_id" class="form-select" required>
                        <option value="">Select specialization</option>
                        @foreach($specializations ?? [] as $specialization)
                            <option value="{{ $specialization->id }}" @selected(old('specialization_id') == $specialization->id)>{{ $specialization->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-4">
                    <label for="consulatation_fee" class="form-label">Consultation Fee</label>
                    <input type="number" step="0.01" id="consulatation_fee" name="consulatation_fee" class="form-control" value="{{ old('consulatation_fee') }}" required>
                </div>
                <div class="col-md-4">
                    <label for="available_from" class="form-label">Available From</label>
                    <input type="time" id="available_from" name="available_from" class="form-control" value="{{ old('available_from') }}" required>
                </div>
                <div class="col-md-4">
                    <label for="available_to" class="form-label">Available To</label>
                    <input type="time" id="available_to" name="available_to" class="form-control" value="{{ old('available_to') }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Save Doctor</button>
        </form>
    </div>
@endsection
