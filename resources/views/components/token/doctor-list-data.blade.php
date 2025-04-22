<div class="table-scroll">
    <table class="table">
        <thead class="bg-primary-o-50">
            <tr>
                <th class=" p-1 text-center border border-primary">{{ __('lang.no') }}</th>
                <th class=" p-1 text-center border border-primary">{{ __('lang.token_no') }}</th>
                <th class=" p-1 text-center border border-primary">{{ __('lang.doctor') }}</th>
                <th class=" p-1 text-center border border-primary">{{ __('lang.department') }}</th>
                <th class=" p-1 text-center border border-primary">{{ __('lang.room') }}</th>
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
        <tbody>
            @foreach ($users as $key => $data)
                <tr>
                    <td class="text-center p-0 px-1 border border-primary">{{ $key + $users->firstItem() }}</td>
                    <td class="text-center p-0 px-1 border border-primary">{{ $data->token_number }}</td>
                    <td class="text-center p-0 px-1 border border-primary">{{ $data->doctor->name }}</td>
                    <td class="text-center p-0 px-1 border border-primary">{{ $data->department->name }}</td>
                    <td class="text-center p-0 px-1 border border-primary">{{ $data->room->name??'' }}</td>
                    <td class="text-center p-0 px-1 border border-primary">{{ $data->phone }}</td>
                    <td class="text-center p-0 px-1 border border-primary">{{ $data->name }}</td>
                    <td class="text-center p-0 px-1 border border-primary">{{ $data->atendby->name?? '' }}</td>
                    <td class="text-center p-0 px-1 border border-primary">{{ datefirmet($data->call_time) }}</td>
                    <td class="text-center p-0 px-1 border border-primary">{{ onlaydate($data->date) }}</td>
                    <td class="text-center p-0 px-1 border border-primary">
                        <span class="label label-lg label-light-{{ badgeStatus($data->status) }} label-inline text-capitalize">{{ $data->status }}</span0>
                    </td>
                    <td class="text-center p-0 px-1 border border-primary">
                        @if ($data->status == 'pending')
                        <a href="{{ route($nexturl,$data->id) }}" class="btn btn-primary btn-sm">
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
{{ $users->withQueryString()->links('pagination.pagination', ['paginator' => $users]) }}
