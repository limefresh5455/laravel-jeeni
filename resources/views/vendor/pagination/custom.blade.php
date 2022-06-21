@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link m-1" aria-hidden="true"><i class="bi bi-arrow-left-short"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a
                        class="page-link m-1 bg-danger text-white hover-dark"
                        href="{{ $paginator->previousPageUrl() }}" tabindex="-1"
                        aria-disabled="true"
                    >
                        <i class="bi bi-arrow-left-short"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link page-link m-1 hover-red">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item" aria-current="page">
                                <span class="page-link m-1 border-danger text-danger">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link m-1 hover-red" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a
                        class="page-link m-1 bg-danger text-white hover-dark"
                        href="{{ $paginator->nextPageUrl() }}"
                    >
                        <i class="bi bi-arrow-right-short"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link m-1" aria-hidden="true"><i class="bi bi-arrow-right-short"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
