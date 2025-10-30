@extends('layouts.app')

@section('content')
  <div class="banner rounded mb-4" style="background-image: url('{{ asset('images/banner.png') }}');">
    <div class="container text-center">
      <h1 class="display-5">Adopt a Friend</h1>
      <p class="lead">Find a furry friend and give them a forever home.</p>
      <a href="{{ route('pets.index') }}" class="btn btn-accent btn-lg">View Pets</a>
    </div>
  </div>

  {{-- Dashboard stats --}}
  <div class="row mb-4">
    <div class="col-md-3 mb-3">
      <div class="card stat-card p-3">
        <div class="card-body">
          <h6 class="card-title">Total Pets</h6>
          <h3 class="mb-0">{{ $totalPets ?? 0 }}</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card stat-card p-3">
        <div class="card-body">
          <h6 class="card-title">Available</h6>
          <h3 class="mb-0">{{ $availablePets ?? 0 }}</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card stat-card p-3">
        <div class="card-body">
          <h6 class="card-title">Adopted</h6>
          <h3 class="mb-0">{{ $adoptedPets ?? 0 }}</h3>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card stat-card p-3">
        <div class="card-body">
          <h6 class="card-title">Adopters</h6>
          <h3 class="mb-0">{{ $totalAdopters ?? 0 }}</h3>
        </div>
      </div>
    </div>
  </div>

  {{-- Recent adoptions + Featured pets --}}
  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Recent Adoptions</h5>
          @if(isset($recentAdoptions) && $recentAdoptions->isNotEmpty())
            <ul class="list-unstyled mb-0">
              @foreach($recentAdoptions as $ad)
                <li class="mb-2">
                  <strong class="text-accent">{{ $ad->pet->name }}</strong>
                  by {{ $ad->adopter->name }} — <small class="text-muted">{{ \Carbon\Carbon::parse($ad->date_adopted)->format('M d, Y') }}</small>
                </li>
              @endforeach
            </ul>
          @else
            <p class="mb-0 text-muted">No recent adoptions.</p>
          @endif
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <h5 class="mb-3">Featured Pets</h5>
      <div class="row">
        @forelse ($featured as $pet)
          <div class="col-md-6 mb-3">
            <div class="card h-100">
              <div class="card-body">
                <h6 class="card-title">{{ $pet->name }}</h6>
                <p class="mb-1 small">{{ $pet->type }} — {{ $pet->age }} yrs</p>
                @if($pet->status === 'adopted')
                  <span class="badge badge-adopted">Adopted</span>
                @else
                  <span class="badge badge-available">Available</span>
                @endif
              </div>
            </div>
          </div>
        @empty
          <p class="text-muted">No featured pets at the moment.</p>
        @endforelse
      </div>
    </div>
  </div>
@endsection
