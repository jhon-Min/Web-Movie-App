
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Server</h4>
                <a href="{{ route('quality.create') }}" class="btn btn-primary">Add</a>
            </div>
            <div class="card-body">
                @forelse(\App\Models\Server::all() as $server)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="genre{{$server->id}}" checked>
                        <label class="form-check-label" for="genre{{$server->id}}">
                            {{$server->name}}
                        </label>
                    </div>
                @empty
                    <p class="text-danger fw-bolder text-center fa-2x">There is no Server</p>
                @endforelse
            </div>
        </div>


