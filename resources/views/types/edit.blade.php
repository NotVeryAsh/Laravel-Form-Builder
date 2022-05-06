@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('types.update',$type) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-auto">
                        <label for="html_tag_name">HTML Tag Name</label>
                        <select type="text" name="html_tag_name" class="form-select mb-3" id="html_tag_name">
                            <option value="input" selected>input</option>
                            <option value="select">select</option>
                            <option value="textarea">textarea</option>
                        </select>

                        <label for="html_type">HTML Type (Optional)</label>
                        <input type="text" class="form-control" id="html_type" name="html_type" placeholder="text, email, password..." value="{{ $type->html_type }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-auto">
                        <label for="friendly_name">Friendly Name</label>
                        <input type="text" class="form-control" id="friendly_name" name="friendly_name" placeholder="Text, Email, Password..." value="{{ $type->friendly_name }}">
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="allow_multiple_options" name="allow_multiple_options" @if($type->allow_multiple_options) checked @endif>
                    <label class="form-check-label" for="allow_multiple_options">
                        Allow Multiple Options
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

@endsection
