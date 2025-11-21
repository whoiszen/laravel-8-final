@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Edit Adopter</h2>
  <a href="{{ route('adopters.show', $adopter) }}" class="btn btn-secondary btn-sm">Back</a>
</div>

<div class="card">
  <div class="card-body">
    <form action="{{ route('adopters.update', $adopter) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $adopter->name) }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Contact Number</label>
        <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number', $adopter->contact_number) }}">
      </div>
      <button class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection
