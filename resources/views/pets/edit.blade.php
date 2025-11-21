@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Edit Pet</h2>
  <a href="{{ route('pets.show', $pet) }}" class="btn btn-secondary btn-sm">Back</a>
</div>

<div class="card">
  <div class="card-body">
    <form action="{{ route('pets.update', $pet) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $pet->name) }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type" class="form-control" value="{{ old('type', $pet->type) }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control" value="{{ old('age', $pet->age) }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
          <option value="available" {{ old('status', $pet->status) === 'available' ? 'selected' : '' }}>Available</option>
          <option value="adopted" {{ old('status', $pet->status) === 'adopted' ? 'selected' : '' }}>Adopted</option>
        </select>
      </div>
      <button class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection
