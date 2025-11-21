@extends('layouts.app')

@section('content')
<div class="my-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold mb-0">🐾 Adoption Records</h2>
        <div class="btn-group">
            <a href="{{ route('adoptions.create') }}" class="btn btn-primary btn-sm">New Adoption</a>
            <a href="{{ url('/') }}" class="btn btn-accent btn-sm">Back to Home</a>
        </div>
    </div>

    <div class="card shadow-sm rounded-3">
        <div class="card-body p-0">
            <table class="table table-striped table-hover text-center align-middle mb-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Pet Name</th>
                        <th>Type</th>
                        <th>Adopter</th>
                        <th>Contact Number</th>
                        <th>Date Adopted</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($adoptions as $adoption)
                        <tr>
                            {{-- Display clean sequential numbering + optional real ID --}}
                            <td>
                                {{ $loop->iteration + ($adoptions->currentPage() - 1) * $adoptions->perPage() }}

                            </td>

                            <td>{{ $adoption->pet->name }}</td>
                            <td>{{ $adoption->pet->type }}</td>
                            <td>{{ $adoption->adopter->name }}</td>
                            <td>{{ $adoption->adopter->contact_number }}</td>
                            <td>{{ \Carbon\Carbon::parse($adoption->date_adopted)->format('F d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted py-4">
                                No adoption records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="card-footer bg-transparent border-0 d-flex justify-content-center">
                {{ $adoptions->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
