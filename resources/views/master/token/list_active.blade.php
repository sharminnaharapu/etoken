@extends('master.layuot.mane')

@section('token')
    menu-item-open
@endsection
@section('current_token')
    menu-item-active
@endsection
@section('title')
    {{ __('lang.current_token') }}
@endsection
@section('toolbar-right')
    <span class="text-muted font-weight-bold mr-4">{{ __('lang.current_token') }}</span>
@endsection
@section('toolbar-laft')
    <a href="{{ url(url()->previous()) }}" class="btn btn-light-primary font-weight-bolder btn-sm">{{ __('lang.back') }}</a>
@endsection
@section('CSS')
    @vite('resources/js/app.js')
@endsection
@section('master-content')
    <div class="row">

        <div class=" col-lg-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">{{ __('lang.current_token') }}</h3>
                </div>
                <div class="card-body p-2">
                    <div class="table-scroll">
                        <table class="table">
                            <thead class="bg-primary-o-50">
                                <tr>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.no') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.token_no') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.department') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.service') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.counter') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.phone') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.name') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.atend_by') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.call_time') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.token_date') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.status') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.call') }}</th>
                                    <th class=" p-1 text-center border border-primary">{{ __('lang.action') }}</th>
                                </tr>
                            </thead>
                            <tbody id="appendableBody">
                                @foreach ($tokens as $key => $data)
                                    <tr>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $key + $tokens->firstItem() }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->token_number }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->department->name }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->service->name }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->counter->name ?? '' }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->phone }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->name }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ $data->atendby->name ?? '' }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ datefirmet($data->call_time) }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">{{ onlaydate($data->date) }}</td>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            <span class="label label-lg label-light-{{ badgeStatus($data->status) }} label-inline text-capitalize">{{ $data->status }}</span0>
                                        </td>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            @if ($data->status == 'pending')
                                            <a href="{{ route('master.token.next',$data->id) }}" class="btn btn-primary btn-sm">
                                                <i class="far fa-arrow-alt-circle-right"></i>{{ __('lang.next') }}
                                            </a>
                                            @endif
                                        </td>
                                        <td class="text-center p-0 px-1 border border-primary">
                                            <x-token.token-action></x-token.token-action>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $tokens->withQueryString()->links('pagination.pagination', ['paginator' => $tokens]) }}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.addEventListener('load', () => {
            window.Echo.channel('TokenGenerate').listen('TokenGenerateEvent', ({token})=> {
                window.location.reload()
            })
        })
    </script>
@endsection
