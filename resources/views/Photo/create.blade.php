@extends('layouts.app')

@section('title')
    Create Photo
@endsection
@section('content')
    <section class="section">
        <x-bread-crumb title="Photo">
            <div class="breadcrumb-item"><a href="{{ route('photo.index') }}">Photo lists</a></div>
            <div class="breadcrumb-item">Add Photo</div>
        </x-bread-crumb>

        <div class="row">
            <div class="col-12 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Photo</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('photo.store') }}" id="createForm" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Movie Name</label>
                                <br>
                                <select name="content_id" id="" class="form-control">
                                    @foreach (\App\Models\Content::all() as $content)
                                        <option value="{{ $content->id }} {{ $content->id==old('content_id')?'selected':'' }}" >{{ $content->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Photos</label>
                                <input type="file" name="photo[]" class="form-control" multiple accept="image/jpeg,image,png,image/jpg">
                            </div>

                            <div class="text-center">
                                <a href="{{ route('photo.index') }}" class="btn btn-danger mr-2">Cancel</a>
                                <button class="btn btn-primary px-4">Confirm</button>
                            </div>
                        </form>


                    </div>a
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\StorePhotoRequest', '#createForm') !!}
    <script>

    </script>
@endsection
