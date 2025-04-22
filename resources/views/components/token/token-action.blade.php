<div class="dropdown dropdown-inline">
    <span class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">{{ __('lang.action') }}</span>
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <ul class="navi navi-hover">
            {{-- <li class="navi-item">
                @if ($data->status == 'active')
                    <a href="{{ route('master.tokens.status', $data->id) }}"
                        class="navi-link ">
                        <span class="navi-icon">
                            <i class=" fa fa-arrow-down"></i>
                        </span>
                        <span
                            class="navi-text">{{ __('lang.inactive') }}</span>
                    </a>
                @elseif ($data->status == 'inactive')
                    <a href="{{ route('master.tokens.status', $data->id) }}"
                        class="navi-link">
                        <span class="navi-icon">
                            <i class=" fa fa-arrow-up"></i>
                        </span>
                        <span class="navi-text">
                            {{ __('lang.active') }}</span>
                    </a>
                @endif
            </li> --}}
            {{-- <li class="navi-item">
                <button type="button" title="{{ __('lang.view') }}"
                    class="navi-link btn w-100" data-toggle="modal"
                    data-target="#viewModal"
                    onclick="viewModalShow(`{{ route('master.service.show', $data->id) }}`)">
                    <span class="navi-icon">
                        <i class=" fa fa-eye"></i> {{ __('lang.view') }}
                    </span>
                </button>
            </li> --}}
            {{-- <li class="navi-item">
                <a href="{{ route('master.service.edit', $data->id) }}"title="{{ __('lang.edit') }}"
                    class="navi-link btn w-100">
                    <span class="navi-icon">
                        <i class=" fa fa-edit"></i> {{ __('lang.edit') }}
                    </span>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
