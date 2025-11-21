@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Create Pet</h2>
  <a href="{{ route('pets.index') }}" class="btn btn-secondary btn-sm">Back</a>
</div>

@if(session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card">
  <div class="card-body">
    <form action="{{ route('pets.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type" class="form-control" value="{{ old('type') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control" value="{{ old('age') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
          <option value="available">Available</option>
          <option value="adopted">Adopted</option>
        </select>
      </div>
      <button class="btn btn-primary">Create</button>
    </form>
  </div>
</div>
@endsection
