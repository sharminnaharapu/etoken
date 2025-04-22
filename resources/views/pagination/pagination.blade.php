@if ($paginator->hasPages())
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex flex-wrap py-2 mr-3">
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->url(1) }}" class="btn btn-circle btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                        class="ki ki-bold-double-arrow-back icon-xs"></i></a>
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="btn btn-circle btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                        class="ki ki-bold-arrow-back icon-xs"></i></a>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span
                        class="btn btn-icon btn-circle btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $element }}</span>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span
                                class="btn btn-icon btn-circle btn-sm border-0 active  btn-hover-primary mr-2 my-1">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="btn btn-icon btn-circle btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="btn btn-circle btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                        class="ki ki-bold-arrow-next icon-xs"></i></a>
                <a href="{{ \Request::url() . '?page=' . $paginator->lastPage() }}"
                    class="btn btn-circle btn-icon btn-sm btn-light-primary mr-2 my-1"><i
                        class="ki ki-bold-double-arrow-next icon-xs"></i></a>
            @endif

        </div>
        <div class="d-flex align-items-center py-3">
            <span class=" text-dark">Displaying {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of
                {{ $paginator->total() }} records</span>
        </div>
    </div>
@endif
