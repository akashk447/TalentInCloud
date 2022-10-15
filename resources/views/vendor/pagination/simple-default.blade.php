@if ($paginator->hasPages())
    <div class="d-flex justify-content-end mb-3">
        <div class="pagination-wrap hstack gap-2">
            @if ($paginator->onFirstPage())
                <a class="page-item pagination-prev disabled" href="#">
                    Previous
                </a>
            @else
                <a class="page-item pagination-prev" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
            @endif

            <ul class="pagination listjs-pagination mb-0"></ul>
            @if ($paginator->hasMorePages())
                <a class="page-item pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            @else
                <a class="page-item pagination-next disabled" href="#" rel="next">Next</a>
            @endif

        </div>
    </div>
@endif
