@extends('layouts.app')

@section('title')
    Edit Photo
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
                        <h4>Edit Photo</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('photo.update',$photo->id) }}" id="createForm" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label>Movie Name</label>
                                <br>
                                <select name="content_id" id="" class="form-control">
                                    @foreach (\App\Models\Content::all() as $content)
                                        <option value="{{ $content->id }} {{ $content->id==$photo->content->id?'selected':'' }}" >{{ $content->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Photos</label>
                                <input type="file" name="photo[]" class="form-control" multiple accept="image/jpeg,image,png,image/jpg">
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="">Photo</label>--}}
{{--                                <div class="d-flex p-3 overflow-scroll">--}}
{{--                                    <form action="{{ route('photo.store') }}" class="d-none" method="post" enctype="multipart/form-data" id="PhotoUploadForm">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="post_id" value="{{ $photo->content->id }}">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <label for="">Photo</label>--}}
{{--                                            <input type="file" name="photo[]" id="PhotoInput" multiple class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                    <div class="border border-3 rounded border-dark d-flex justify-content-center align-items-center UploadUi" id="UploadUi">--}}
{{--                                        <i class="fas fa-plus-circle"></i>--}}
{{--                                    </div>--}}
{{--                                    @foreach ($photo->photo as $image)--}}
{{--                                        <div class="position-relative me-1">--}}
{{--                                            <form action="{{ route('photo.destroy',$image->id) }}" class="position-absolute start-0 bottom-0" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('delete')--}}
{{--                                                <button class="btn btn-danger btn-sm">--}}
{{--                                                    <i class="fas fa-trash-alt fa-fw"></i>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                            <img src="{{ asset('storage/photo/'.$image->name) }}" width="100" class=" rounded" alt="image alt"/>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}


{{--                            </div>--}}

                            <div class="text-center">
                                <a href="{{ route('photo.index') }}" class="btn btn-danger mr-2">Cancel</a>
                                <button class="btn btn-primary px-4" >Confirm</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\StorePhotoRequest', '#createForm') !!}
    <script>
        let PhotoUploadForm=document.getElementById('PhotoUploadForm');
        let PhotoInput=document.getElementById('PhotoInput');
        let UploadUi=document.getElementById('UploadUi');

        UploadUi.addEventListener('click',function(){
            PhotoInput.click();

        })
        PhotoInput.addEventListener('change',function(){
            PhotoUploadForm.submit();
        })
    </script>
@endsection
