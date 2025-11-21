@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Record Adoption</h2>
  <a href="{{ route('adoptions.index') }}" class="btn btn-secondary btn-sm">Back</a>
</div>

<div class="card">
  <div class="card-body">
    <form action="{{ route('adoptions.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Pet</label>
        <select name="pet_id" class="form-select">
          @foreach($pets as $pet)
            <option value="{{ $pet->id }}">{{ $pet->name }} ({{ $pet->type }})</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Adopter</label>
        <select name="adopter_id" class="form-select">
          @foreach($adopters as $adopter)
            <option value="{{ $adopter->id }}">{{ $adopter->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Date Adopted</label>
        <input type="date" name="date_adopted" class="form-control" value="{{ old('date_adopted', date('Y-m-d')) }}">
      </div>
      <button class="btn btn-primary">Save Adoption</button>
    </form>
  </div>
</div>
@endsection
