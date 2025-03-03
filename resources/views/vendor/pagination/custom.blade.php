@if ($paginator->hasPages())
    <nav>
        <ul class="pagination flex justify-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="px-4 py-2 bg-gray-300 text-gray-500 rounded">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span class="px-4 py-2 bg-green-500 text-white rounded">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="px-4 py-2 bg-white text-green-500 rounded hover:bg-gray-200">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
