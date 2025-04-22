<div class="row">
        @foreach ($service as $data)
            <div class="col-lg-3 mt-4 cursor-pointer" onclick="tokengeneral('{{ route('master.token.tokengeneral', $data->id) }}')">
                <div class="card card-header text-center text-capitalize  border border-primary">
                    <h3>{{ $data->name }}</h3>
                </div>
            </div>
        @endforeach
    </div>

