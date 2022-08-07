@if ($paginator->lastPage() > 1)
    @php
        $query = str_replace('page=' . $paginator->currentPage(), '', request()->getQueryString());
        $query = $query && str_starts_with($query, '&') ? $query : '&' . $query;
    @endphp
    <div class="cards-control">
        <div class="btns">
            @if ($paginator->currentPage() != 1 && $paginator->lastPage() >= 5)
                <a href="?page=1{{ $query }}" class="card-btn">
                    <span class="btn-arrow"><i class="fa-solid fa-angles-right"></i></span>
                </a>
            @endif
            @if ($paginator->currentPage() != 1)
                <a class="card-btn" href="{{ $paginator->url($paginator->currentPage() - 1) }}{{ $query }}">
                    <span class="btn-arrow"><i class="fa-solid fa-angle-right"></i></span>
                </a>
            @endif
            @for ($i = max($paginator->currentPage() - 2, 1); $i <= min(max($paginator->currentPage() - 2, 1) + 4, $paginator->lastPage()); $i++)
                <a class="card-btn {{ $paginator->currentPage() == $i ? ' active' : '' }}"
                    href="{{ $paginator->url($i) }}{{ $query }}">{{ $i }}</a>
            @endfor
            @if ($paginator->currentPage() != $paginator->lastPage())
                <a class="card-btn" href="{{ $paginator->url($paginator->currentPage() + 1) }}{{ $query }}">
                    <span class="btn-arrow"><i class="fa-solid fa-angle-left"></i></span>
                </a>
            @endif
            @if ($paginator->currentPage() != $paginator->lastPage() && $paginator->lastPage() >= 5)
                <a class="card-btn" href="{{ $paginator->url($paginator->lastPage()) }}{{ $query }}">
                    <span class="btn-arrow"><i class="fa-solid fa-angles-left"></i></span>
                </a>
            @endif

        </div>

    </div>
@endif
