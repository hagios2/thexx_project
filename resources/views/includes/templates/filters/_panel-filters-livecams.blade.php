<!-- Panel Filters -->
<div id="panel-filters" data-toggler=".active" data-animate="fade-in fade-out">
    <div id="wrapper-selection-sections">
        <!-- Your Custom selection  -->
        <section>
            <header>
                <h1>
                    Your Custom selection
                </h1>
            </header>
            <div class="filter-options">
                <ul>
                    <li>
                        <form method="get" action="{{ route('filters.store') }}" enctype="multipart/form-data">
                        {{-- <button >
                            New model
                        </button> --}}
                        @if (Session::has('new_model'))
                        <input class="filter button1" type="submit" value="New model" name="new_model_filter"/>
                        @else
                        <input class="filter" type="submit" value="New model" name="new_model_filter"/>
                        @endif
                        <input name="New_model" type="hidden"/>
                        
                        </form>
                    </li>
                    <li>
                        <form method="get" action="{{ route('filters.store') }}" enctype="multipart/form-data">
                            @if (Session::has('online_now'))
                            <input class="filter button1" type="submit" value="Online Now" name="online_now_filter"/>
                            @else
                            <input class="filter" type="submit" value="Online Now" name="online_now_filter"/>
                            @endif
                            <input  name="online_now" type="hidden"/>
                           
                        </form>
                    </li>
                    <li>
                      @if (Auth::check())
                       
                        <form method="get" action="{{ route('filters.store') }}" enctype="multipart/form-data">
                            @if (Session::has('favorites'))
                            <input  class="filter button1" type="submit" value="Favorites Only" name="favorites_filter"/>
                            @else
                            <input class="filter" type="submit" value="Favorites Only" name="favorites_filter"/>
                            @endif
                            <input name="favorites" type="hidden"/>
                            
                        </form>
                       
                       
                        @endif
                    </li>
                    <li>  
                        
                        <input class="filter" type="submit" value="HD Camera" name="online_now_filter"/>
                    </li>
                    {{-- <li>
                        
                        <input class="filter" type="submit" value="Does Cam2Cam" name="online_now_filter"/>
                    </li> --}}
                </ul>
            </div>
        </section>
        <!-- //Your Custom selection  -->
        <!-- Models Languages   -->
        <section>
            <header>
                <h1>
                    Models Languages/Speaks
                </h1>
            </header>
            <div class="filter-options">
                <ul>
                    <li>
                        <form method="get" action="{{ route('filters.store') }}" enctype="multipart/form-data">
                            @if (Session::has('english'))
                            <input  class="filter button1" type="submit" value="English" name="english_filter"/> 
                            @else
                            <input  class="filter" type="submit" value="English" name="english_filter"/>
                            @endif
                            {{-- <input name="english" type="hidden"/> --}}
                           
                        </form>
                    </li>
                    <li>
                        <form method="get" action="{{ route('filters.store') }}" enctype="multipart/form-data">
                            @if (Session::has('french'))
                            <input  class="filter button1" type="submit" value="French" name="french_filter"/>   
                            @else
                            <input  class="filter" type="submit" value="French" name="french_filter"/>
                            @endif
                            <input name="french" type="hidden"/>
                           
                            </form>
                    </li>
                    <li>
                        <form method="get" action="{{ route('filters.store') }}" enctype="multipart/form-data">
                            @if (Session::has('german'))
                            <input  class="filter button1" type="submit" value="German" name="german_filter"/> 
                            @else
                            <input  class="filter" type="submit" value="German" name="german_filter"/>
                            @endif
                            </button> 
                            <input name="german" type="hidden"/>
                         
                            </form>
                    </li>
                    <li>
                        <form method="get" action="{{ route('filters.store') }}" enctype="multipart/form-data">
                            @if (Session::has('portuguese'))
                            <input class="filter button1" type="submit" value="Portuguese" name="portuguese_filter"/>
                           @else
                           <input  class="filter" type="submit" value="Portuguese" name="portuguese_filter"/>
                           @endif
                            <input name="portuguese" type="hidden"/>
                          
                            </form>
                    </li>
                </ul>
            </div>
        </section>
        <!-- //Models Languages   -->
    </div>
    <!-- Footer options -->
    <footer class="footer-panel-filters">
        <div class="left-column-options">
            <ul>
                {{-- <li>
                    <form method="post" action="{{ route('filters.store') }}" enctype="multipart/form-data">
                        @if (Session::has('clear'))
                        <input class="filter button1" type="submit" value="clear" name="clear"/>
                       @else
                       <input  class="filter" type="submit" value="clear" name="clear"/>   
                       @endif
                        <input name="clear" type="hidden"/>
                      
                        </form>
                </li> --}}
            </ul>
        </div>
        {{-- <div class="right-column-options">
            <ul>
                <li>
                    <button data-toggle="panel-filters span-filters span-close-filters"><!-- When saving keep these rules to apply the close toggle effect and hide the filters division  -->
                        Save & View
                    </button>
                </li>
            </ul>
        </div> --}}
    </footer>
    <!-- //Footer options -->
</div>
<!-- //Panel Filters -->