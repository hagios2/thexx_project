<!-- PageNavigation -->
<div id="page-navigation">
    <ul>
        @php
            if ($page_no - 1 == 0) {
                $inactive = 'inactive';
            }
            else {
                $inactive = '';
            }
        @endphp

        @for($i = 1 ; $i < $total_pages ; $i++)
            @if ($i == 1)
            <li id="previous">
                <a title="Previous page" class="{{ $inactive }} pagination" data-page="{{ $page_no - 1 }}">
                    <svg width="15" height="24" viewBox="0 0 15 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6676 23.3797C12.9423 24.0956 11.7662 24.0956 11.0408 23.3797L0.824786 13.2963C0.0994039 12.5804 0.0994038 11.4196 0.824786 10.7036L11.0408 0.620267C11.7662 -0.0956955 12.9422 -0.0956956 13.6676 0.620266C14.393 1.33623 14.393 2.49703 13.6676 3.21299L4.76504 12L13.6676 20.7869C14.393 21.5029 14.393 22.6637 13.6676 23.3797Z" fill="#05BE70"/>
                    </svg>
                </a>
            </li>
            @endif

            @if ($i == $page_no)
                <li>
                    <a id="page-{{ $i }}" title="{{ $i }}" data-page="{{ $i }}" class="active pagination">
                        {{ $i }}
                    </a>
                </li>
            @else
                <li>
                    <a class="pagination" id="page-{{ $i }}" title="{{ $i }}" data-page="{{ $i }}">
                        {{ $i }}
                    </a>
                </li>
            @endif

            @if ($i == $total_pages - 1)
            @php
                if ($page_no == $total_pages - 1) {
                    $inactive = 'inactive';
                }
                else {
                    $inactive = '';
                }
            @endphp
            <li id="next">
                <a class="{{ $inactive }} pagination" data-page="{{ $page_no + 1 }}" title="Next page">
                    <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.832698 0.387731C1.28606 -0.0597449 2.02111 -0.0597449 2.47447 0.387731L8.85948 6.68981C9.31284 7.13729 9.31284 7.86279 8.85948 8.31027L2.47447 14.6123C2.02111 15.0598 1.28606 15.0598 0.832698 14.6123C0.379335 14.1649 0.379335 13.4394 0.832698 12.9919L6.39682 7.50004L0.832698 2.00818C0.379335 1.56071 0.379335 0.835206 0.832698 0.387731Z" fill="#05BE70"/>
                    </svg>
                </a>
            </li>
            @endif
        @endfor
    </ul>
</div>
<!-- PageNavigation -->
