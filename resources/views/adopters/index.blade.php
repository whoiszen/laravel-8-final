@extends('layouts.app')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h2 class="text-white mb-1">Adopters</h2>
      <p class="text-muted mb-0">List of adopters and their adopted pets</p>
    </div>
    <div class="btn-group">
      <a href="{{ route('adopters.create') }}" class="btn btn-primary btn-sm">New Adopter</a>
      <a href="{{ route('pets.index') }}" class="btn btn-accent btn-sm">View Pets</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Adopted Pets</th>
          </tr>
        </thead>
        <tbody class="text-white">
          @foreach($adopters as $adopter)
            <tr>
              <td>{{ $loop->iteration + ($adopters->currentPage() - 1) * $adopters->perPage() }}</td>
              <td class="text-accent fw-medium">{{ $adopter->name }}</td>
              <td>{{ $adopter->contact_number }}</td>
              <td>
                @if($adopter->adoptions->isEmpty())
                  <em class="text-muted">None</em>
                @else
                  <ul class="mb-0 list-unstyled">
                    @foreach($adopter->adoptions as $adoption)
                      <li class="mb-1">
                        <span class="text-accent">{{ $adoption->pet->name ?? '—' }}</span>
                        <small class="text-muted">({{ $adoption->pet->type ?? '' }}) — {{ $adoption->date_adopted }}</small>
                      </li>
                    @endforeach
                  </ul>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer bg-transparent border-0 d-flex justify-content-center">
      {{ $adopters->links('pagination::bootstrap-5') }}
    </div>
  </div>
@endsection
