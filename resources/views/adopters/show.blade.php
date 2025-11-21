@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Adopter Details</h2>
  <div>
    <a href="{{ route('adopters.edit', $adopter) }}" class="btn btn-primary btn-sm">Edit</a>
    <form action="{{ route('adopters.destroy', $adopter) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this adopter?')">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger btn-sm">Delete</button>
    </form>
    <a href="{{ route('adopters.index') }}" class="btn btn-secondary btn-sm">Back</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">Name</dt>
      <dd class="col-sm-9">{{ $adopter->name }}</dd>

      <dt class="col-sm-3">Contact</dt>
      <dd class="col-sm-9">{{ $adopter->contact_number }}</dd>

      <dt class="col-sm-3">Adopted Pets</dt>
      <dd class="col-sm-9">
        @if($adopter->pets->isEmpty())
          <em class="text-muted">None</em>
        @else
          <ul class="mb-0">
            @foreach($adopter->pets as $pet)
              <li>{{ $pet->name }} ({{ $pet->type }})</li>
            @endforeach
          </ul>
        @endif
      </dd>
    </dl>
  </div>
</div>
@endsection
