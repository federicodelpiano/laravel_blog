<form method="post" action="{{ url('/entries') }}">
    @csrf
    <div class="form-group custom-form-group">
        <label for="title">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            class="form-control custom-text-input @error('title') is-invalid @enderror"
            value="{{ old('title') }}"
        >

        @error('title')
            <div class="invalid-feedback @error('title') d-block @enderror">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group custom-form-group">
        <label for="content">Content</label>
        <textarea
            type="text"
            name="content"
            id="content"
            rows="8"
            class="form-control custom-textarea @error('content') is-invalid @enderror"
            >{{ old('content') }}</textarea>

            @error('content')
                <div class="invalid-feedback @error('content') d-block @enderror">{{ $message }}</div>
            @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary primary-button">Save</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary cancel-button">Cancel</a>
    </div>
</form>