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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Genre</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('genre.store') }}" id="createGenre" method="POST"
                              >
                            @csrf
                            <dvi class="row g-1 justify-content-center align-items-center ">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Genre</label>
                                        <input type="text" class="form-control" name="genre" placeholder="create genre">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <a href="{{ route('user.index') }}" class="btn btn-danger mr-2">Cancel</a>
                                        <button class="btn btn-primary px-4">Confirm</button>
                                    </div>
                                </div>
                            </dvi>

                        </form>

                        <table class="table table-striped my-4" id="genreTable">
                            <thead>
                            <tr>
{{--                                <th class="no-sort"></th>--}}
                                <th scope="col">#</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Control</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            @forelse($generes as $genre)
                                <tr>
                                    <td>{{$genre->id}}</td>
                                    <td>{{$genre->genre}}</td>
                                    <td>
                                          <form action="{{ route('genre.destroy',$genre->id) }}" class="d-inline" method="post">
                                              @csrf
                                              @method('delete')
                                              <button class="btn btn-sm btn-danger">
                                                  <i class="fas fa-trash-alt fa-fw"></i>
                                              </button>
                                          </form>
                                          <a href="{{ route('genre.edit',$genre->id) }}" class="btn btn-sm btn-warning">
                                              <i class="fas fa-pencil-alt fa-fw"></i>
                                          </a>
                                    </td>
                                    <td>
                                        <p class="small mb-0">
                                            <i class="fas fa-calendar"></i>
                                            {{ $genre->created_at->format("Y-m-d") }}
                                        </p>
                                        <p class="mb-0 small">
                                            <i class="fas fa-clock"></i>
                                            {{ $genre->created_at->format("H:i a") }}
                                        </p>

                                    </td>
                                </tr>
                            @empty
                                <p class="text-danger fw-bolder text-center fa-2x my-3">There is no genre</p>
                            @endforelse
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {!! JsValidator::formRequest('\App\Http\Requests\StoreGenreRequest', '#createGenre') !!}


    <script>
        {{--$(document).ready(function(){--}}
        {{--    var table = $("#genreTable").DataTable({--}}
        {{--        ajax: '{{ route('genre.ssd') }}',--}}
        {{--         columns:[--}}
        {{--             {--}}
        {{--                 data: 'plus-icon',--}}
        {{--                 name: 'plus-icon',--}}
        {{--             },--}}
        {{--             {--}}
        {{--                 data: 'id',--}}
        {{--                 name: 'id',--}}
        {{--             },--}}

        {{--         ]--}}
        {{--    })--}}
        {{--});--}}
    </script>
@endsection