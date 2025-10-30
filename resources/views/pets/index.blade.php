@extends('layouts.app')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h2>Pets</h2>
      <p class="mb-0 text-muted">Available and Adopted Pets shown here!</p>
    </div>
    <a href="{{ route('adopters.index') }}" class="btn btn-accent btn-sm">View Adopters</a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table table-striped table-hover text-center align-middle mb-0">
        <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Type</th>
        <th>Age</th>
        <th>Status</th>
        <th>Adopter</th>
        <th>Adopted On</th>
      </tr>
        </thead>
        <tbody>
          @foreach($pets as $pet)
           <tr>
                <td>{{ $loop->iteration + ($pets->currentPage() - 1) * $pets->perPage() }}</td>
                <td>{{ $pet->name }}</td>
                <td>{{ $pet->type }}</td>
                <td>{{ $pet->age }}</td>
                <td>
            @if($pet->status === 'adopted')
              <span class="badge badge-adopted">Adopted</span>
                    @else
                        <span class="badge badge-available">Available</span>
                    @endif
                </td>
                <td>{{ $pet->adoption?->adopter?->name ?? '-' }}</td>
                <td>{{ $pet->adoption?->date_adopted ?? '-' }}</td>
        </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer bg-transparent border-0 d-flex justify-content-center">
      {{ $pets->links('pagination::bootstrap-5') }}
    </div>
  </div>
@endsection
