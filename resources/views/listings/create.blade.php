@extends('layouts.app')
@section('title', '| New Listing')

@section('stylesheets')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({
            selector:'#body',
            plugins: 'link',
            menubar: false
        });</script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Create New Listing</h1>
            <hr>
            {{--We add enctype="multipart/form-data" to allow file upload--}}
            <form action="{{ route('listings.store', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input id="title" name="title" type="text"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="company_name">Company Name:</label>
                    <input id="company_name" name="company_name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="logo">Company Logo:</label>
                    <input id="logo" name="logo" type="file">
                </div>
                <div class="form-group">
                    <label for="tags">Tags:</label>
                    {{--Add [] in select name atribute to get array of multiple selects instead of sum of selects (default)--}}
                    <select name="tags[]" id="tags" multiple="multiple" class="form-control">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <small>CTRL + Click to select multiple</small>
                </div>
                <div class="form-group">
                    <label for="body">Description:</label>
                    <textarea id="body" name="body" class="form-control" rows="15"></textarea>
                </div>
                <input type="submit" value="Post Listing" class="btn btn-success btn-block">
            </form>
        </div>
    </div>

@endsection