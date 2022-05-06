@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">

                    This is a {{ $type->friendly_name }} field type

                    <{{ $type->html_tag_name }}
                    @isset($type->html_type)
                        type="{{ $type->html_type }}"
                    @endisset
                    name="{{ $type->slug }}"
                    >

                    @if($type->allow_multiple_options && $type->html_tag_name == 'select')

                        <option>Option...</option>
                        <option>Other option...</option>

                    @else

                        </{{ $type->html_tag_name }}>

                    @endif

                    @if($type->allow_multiple_options && $type->html_type == 'radio')

                        Other Option...
                        <{{ $type->html_tag_name }}
                        @isset($type->html_type)
                        type="{{ $type->html_type }}"
                        @endisset
                        name="{{ $type->slug }}"
                        >

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
