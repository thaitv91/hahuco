@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>Trang trước</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Trang trước</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Trang sau</a></li>
        @else
            <li class="disabled"><span>Trang sau</span></li>
        @endif
    </ul>
@endif
