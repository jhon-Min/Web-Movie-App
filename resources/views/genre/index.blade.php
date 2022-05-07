@extends('layouts.app')

@section('title')
    All Genre
@endsection

@section('content')
    <section class="section">
        <x-bread-crumb title="Genre">
            <div class="breadcrumb-item">Genre Lists</div>
        </x-bread-crumb>
    </section>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Genre</h4>
                    <a href="{{ route('genre.create') }}" class="btn btn-primary">Add</a>
                </div>
                <div class="card-body">
                    @forelse(\App\Models\Genre::all() as $genre)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="genre{{$genre->id}}" checked>
                        <label class="form-check-label" for="genre{{$genre->id}}">
                            {{$genre->genre}}
                        </label>
                    </div>
                    @empty
                        <p class="text-danger fw-bolder text-center fa-2x">There is no genre</p>
                    @endforelse
                </div>
            </div>
        </div>

{{--        <div class="col-12 col-lg-6">--}}
{{--            <div class="card shadow-sm">--}}
{{--                <div class="card-header d-flex justify-content-between align-items-center">--}}
{{--                    <h4>Genre</h4>--}}
{{--                    <a href="{{ route('genre.create') }}" class="btn btn-primary">Add</a>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>--}}
{{--                        <label class="form-check-label" for="flexRadioDefault2">--}}
{{--                            Default checked radio--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-12 col-lg-6">--}}
{{--            <div class="card shadow-sm">--}}
{{--                <div class="card-header d-flex justify-content-between align-items-center">--}}
{{--                    <h4>Genre</h4>--}}
{{--                    <a href="{{ route('genre.create') }}" class="btn btn-primary">Add</a>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>--}}
{{--                        <label class="form-check-label" for="flexRadioDefault2">--}}
{{--                            Default checked radio--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection

@section('scripts')

@endsection
