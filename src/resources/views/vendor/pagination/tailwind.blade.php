@if ($paginator->hasPages())
<nav>
    <ul class="pagination-list">
        @if ($paginator->onFirstPage())
            <li><span class="page-item disabled">&#60;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="page-item">&#60;</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li><span class="page-item disabled">{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="page-item active">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="page-item">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="page-item">&#62;</a></li>
        @else
            <li><span class="page-item disabled">&#62;</span></li>
        @endif
    </ul>
</nav>
@endif