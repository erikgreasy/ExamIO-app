@extends('layouts.app')

@section('content')
    <div id="responses" class="text-white py-10 my-10 px-10">
        <h1>Info:</h1>

    </div>

    <script>
        window.auth_user = {!! json_encode([
            'id'     => auth()->user()->id,
            'name'   => auth()->user()->name
        ]) !!};
    </script>

@endsection