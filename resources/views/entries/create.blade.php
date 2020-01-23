@extends('layouts.app')

@section('title', 'New Entry')

@section('content')
<div class="container">
    <h1>New Entry</h1>

    <hr>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ url('/entries') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                        >

                        @error('title')
                            <div class="invalid-feedback @error('title') d-block @enderror">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea
                            type="text"
                            name="content"
                            id="content"
                            rows="8"
                            class="form-control @error('content') is-invalid @enderror"
                            >{{ old('content') }}</textarea>

                            @error('content')
                                <div class="invalid-feedback @error('content') d-block @enderror">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection