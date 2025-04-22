<div class="row">
    @foreach ($departments as $data)
        <div class="col-lg-3 mt-4 cursor-pointer" onclick="serviceDataGet('{{ route('master.token.servicedataget', $data->id) }}')">
            <div class="card card-header text-center text-capitalize  border border-primary">
                <h3>{{ $data->name }}</h3>
            </div>
        </div>
    @endforeach
</div>
