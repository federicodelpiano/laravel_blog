@extends('layouts.app')

@section('title', 'Laravel Blog')

@section('content')
<section class="container">
    <h1 class="text-center">Lastest Entries</h1>
    
    <hr>

    @foreach($entries as $entry)
        @include('entries.entry_preview')
        <hr>
    @endforeach

    <div class="row justify-content-center my-3">
        <div class="col-md-auto">
            {{ $entries->links() }}
        </div>
    </div>
</section>
@endsection