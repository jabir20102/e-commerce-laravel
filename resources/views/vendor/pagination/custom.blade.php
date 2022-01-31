
@if ($paginator->hasPages())
<ul class="page-numbers">
    @if ($paginator->onFirstPage())
        <li class="disabled"><span class="page-number-item">Previous</span></li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span class="page-number-item" >Previous</span></a></li>
    
    @endif


  
    @foreach ($elements as $element)
       
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif


       
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li><span class="page-number-item current" >{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}"><span class="page-number-item" >{{ $page }}</span></a></li>
                    
                @endif
            @endforeach
        @endif
    @endforeach


    
    @if ($paginator->hasMorePages())
    
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><span class="page-number-item" >Next</span></a></li>
        
    @else
        <li class="disabled"><span class="page-number-item">Next </span></li>
    @endif
</ul>
@endif 
