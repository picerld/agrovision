<div class="flex flex-wrap items-center justify-between w-full gap-2 py-4 pt-6">
    <div class="block max-w-sm text-sm font-normal text-gray-500 me-2 sm:mb-0">
        Showing
        <span class="font-semibold text-gray-800">{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}</span>
        of
        <span class="font-semibold text-gray-800">{{ $paginator->total() }}</span>
        pages
    </div>
    <nav class="flex items-center gap-x-1">
        @if ($paginator->onFirstPage())
            <button type="button" class="btn btn-sm btn-outline" disabled>Previous</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm btn-outline">Previous</a>
        @endif

        <div class="flex items-center gap-x-1">
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                @if ($page == $paginator->currentPage())
                    <button type="button"
                        class="btn btn-sm btn-outline btn-square aria-[current='page']:text-border-primary aria-[current='page']:bg-primary/10"
                        aria-current="page">{{ $page }}</button>
                @else
                    <a href="{{ $url }}"
                        class="btn btn-sm btn-outline btn-square aria-[current='page']:text-border-primary aria-[current='page']:bg-primary/10">{{ $page }}</a>
                @endif
            @endforeach
        </div>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm btn-outline">Next</a>
        @else
            <button type="button" class="btn btn-sm btn-outline" disabled>Next</button>
        @endif
    </nav>
</div>
