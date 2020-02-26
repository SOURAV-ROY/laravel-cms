@if ($paginator->hasPages())

    <nav class="flexbox mt-30">
        @if ($paginator->onFirstPage())
            <a class="btn btn-outline-info disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-info">
                <i class="ti-arrow-left fs-9 mr-4"></i> Previous
            </a>
        @endif
        @if ($paginator->hasMorePages())
            <a class="btn btn-primary" href="{{ $paginator->nextPageUrl() }}">
                Next <i class="ti-arrow-right fs-9 ml-4"></i>
            </a>
        @else
            <a class="btn btn-outline-primary disabled">Next <i class="ti-arrow-right fs-9 ml-4"></i></a>
        @endif
    </nav>

@endif

{{--@if ($paginator->hasPages())--}}
{{--    <nav>--}}
{{--        <ul class="pagination">--}}
{{--            --}}{{-- Previous Page Link --}}
{{--            @if ($paginator->onFirstPage())--}}
{{--                <li class="page-item disabled" aria-disabled="true">--}}
{{--                    <span class="page-link">@lang('pagination.previous')</span>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}"--}}
{{--                       rel="prev">@lang('pagination.previous')</a>--}}
{{--                </li>--}}
{{--            @endif--}}

{{--            --}}{{-- Next Page Link --}}
{{--            @if ($paginator->hasMorePages())--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li class="page-item disabled" aria-disabled="true">--}}
{{--                    <span class="page-link">@lang('pagination.next')</span>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--@endif--}}

