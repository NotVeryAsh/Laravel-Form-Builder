@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">

                @if(isset($type->html_type) && $type->html_type == 'hidden')
                    Nothing to see here! :)
                @else

                    This is a {{ $type->friendly_name }} field type

                    <{{ $type->html_tag_name }}
                    @isset($type->html_type)
                        type="{{ $type->html_type }}"
                    @endisset
                    name="{{ $type->slug }}"
                    class="form-control"
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
                        class="form-control"
                        >

                    @endif
                @endif

                </div>
            </div>
        </div>
    </div>

@endsection
