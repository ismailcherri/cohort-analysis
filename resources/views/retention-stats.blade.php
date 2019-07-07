@extends('index')

@section('title', 'Retention Stats')

@section('content')
    <div class="content">
        <div id="app"></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
