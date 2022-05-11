@extends('layouts.app')

@section('title')
    Create Content
@endsection
@section('content')
    <section class="section">
        <x-bread-crumb title="Users">
            <div class="breadcrumb-item"><a href="{{ route('content.index') }}">Content lists</a></div>
            <div class="breadcrumb-item">Add Content</div>
        </x-bread-crumb>

        <div class="row">
            <div class="col-12 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Content</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('content.store') }}" id="createForm" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Content Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Director</label>
                                    <input type="text" class="form-control" name="director" placeholder="Director Name">
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label>Casts</label>
                                    <input type="text" class="form-control" name="casts" placeholder="Casts">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Relaese Date</label>
                                    <input type="text" class="form-control" name="releasedate" placeholder="Release Date">
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label>Poster</label>
                                    <input type="file" class="form-control" name="poster" accept="image/jpeg,image/png,image/jpg">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Trailer</label>
                                    <input type="file" class="form-control" name="trailer" accept="video/mp4">
                                </div>
                            </div>

                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select class="form-control select2" name="status">
                                        <option value="">-- Please Choose --</option>
                                        <option value="1">Publish</option>
                                        <option value="0">Unpublish</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Movie Type</label>
                                    <input type="text" class="form-control" name="movietype">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <br>
                                <textarea name="description" id="" cols="30" rows="30" class="form-control"></textarea>
                            </div>
                            <div class="form-row mb-2">

                            </div>
                            <div class="form-group">
                                <label>Genres</label>
                                <br>
                                @foreach (App\Models\Genre::all() as $genre)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="{{ $genre->id }}" name="genres[]" id="genre{{ $genre->id }}" {{ in_array($genre->id,old('genres',[])) ? 'checked':'' }}>
                                        <label class="form-check-label" for="genre{{ $genre->id }}">
                                            {{ $genre->genre }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-center">
                                <a href="{{ route('content.index') }}" class="btn btn-danger mr-2">Cancel</a>
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreContentRequest', '#createForm') !!}
    <script>

    </script>
@endsection
