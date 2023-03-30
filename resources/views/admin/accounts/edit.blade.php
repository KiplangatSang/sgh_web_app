@extends('layouts.post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div id="editor">
            <p>This is the editor content.</p>
        </div>
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'editor' );
        </script>
    </div>
</div>
@endsection
