@extends('layouts.app')

@section('title')
    Create Genre
@endsection

@section('content')
    <section class="section">
        <x-bread-crumb title="Users">
            <div class="breadcrumb-item"><a href="{{ route('genre.index') }}">Genre Lists</a></div>
            <div class="breadcrumb-item">Add Genre</div>
        </x-bread-crumb>

        <div class="row">

        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Server</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('server.store') }}" id="createServer" method="POST"
                          enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="form-group">
                            <label>Server Name</label>
                            <input type="text" class="form-control" name="serverName" placeholder="create genre">
                        </div>

                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Server Icon</label>
                            <input class="form-control" type="file"  id="formFileMultiple" name="serverIcon" multiple>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Url</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="serverUrl" placeholder="server url">
                        </div>

                        <div class="text-center">
                            <a href="{{ route('user.index') }}" class="btn btn-danger mr-2">Cancel</a>
                            <button class="btn btn-primary px-4">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection

@section('scripts')
{{--    {!! JsValidator::formRequest('\App\Http\Requests\StoreGenreRequest', '#createGenre') !!}--}}
    {{--    {!! JsValidator::formRequest('\App\Http\Requests\StoreServerRequest', '#createServer') !!}--}}
    <script>

    </script>
@endsection
