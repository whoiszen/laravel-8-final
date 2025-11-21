@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Pet Details</h2>
  <div>
    <a href="{{ route('pets.edit', $pet) }}" class="btn btn-primary btn-sm">Edit</a>
    <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this pet?')">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger btn-sm">Delete</button>
    </form>
    <a href="{{ route('pets.index') }}" class="btn btn-secondary btn-sm">Back</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">Name</dt>
      <dd class="col-sm-9">{{ $pet->name }}</dd>

      <dt class="col-sm-3">Type</dt>
      <dd class="col-sm-9">{{ $pet->type }}</dd>

      <dt class="col-sm-3">Age</dt>
      <dd class="col-sm-9">{{ $pet->age }}</dd>

      <dt class="col-sm-3">Status</dt>
      <dd class="col-sm-9">{{ ucfirst($pet->status) }}</dd>

      <dt class="col-sm-3">Adopter</dt>
      <dd class="col-sm-9">{{ $pet->adoption?->adopter?->name ?? '-' }}</dd>
    </dl>
  </div>
</div>
@endsection
