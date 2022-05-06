@extends('layouts.app')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a class="btn btn-primary"  href="/fields/types/create" role="button">Create</a>
    </div>

    @foreach($types as $type)
        <div class="card mb-3">
            <div class="card-body">
                <a href="/fields/types/{{ $type->slug }}" class="text-decoration-none fw-bold">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row g-3">
                            <div class="col-auto">
                                {{ $type->friendly_name }} ->
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-primary"  href="{{ route('types.edit',$type) }}" role="button">Edit</a>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-primary"  href="{{ route('types.show',$type) }}" role="button">Preview</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach

@endsection
