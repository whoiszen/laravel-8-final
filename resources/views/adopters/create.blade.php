@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Create Adopter</h2>
  <a href="{{ route('adopters.index') }}" class="btn btn-secondary btn-sm">Back</a>
</div>

<div class="card">
  <div class="card-body">
    <form action="{{ route('adopters.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Contact Number</label>
        <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}">
      </div>
      <button class="btn btn-primary">Create</button>
    </form>
  </div>
</div>
@endsection
