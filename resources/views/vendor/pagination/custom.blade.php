@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="w-full">
        <div class="flex justify-end space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="btn btn-xs btn-outline btn-primary btn-disabled">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-xs btn-outline btn-primary">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            {{-- Page Number Links --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="btn btn-xs btn-outline btn-neutral cursor-default">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="btn btn-xs btn-primary cursor-default">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="btn btn-xs btn-outline btn-primary">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-xs btn-outline btn-secondary">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="btn btn-xs btn-outline btn-secondary btn-disabled cursor-not-allowed">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>
    </nav>
@endif
