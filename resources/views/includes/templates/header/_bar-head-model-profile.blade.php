<!-- Table heade Model Profile  -->
<section id="table-header">
    <div id="inner-table-header">
        <header>
            @php
                if (isset($model_info)) {
                    $modelData = $model_info;
                }
            @endphp
            <h1>
                {{ $modelData->camera_man_name }} 
            </h1>
            <ul>
                <lh>
                    Performs:
                </lh>
                <li>
                    <a href="#" title="">
                        {{ $modelData->performs }}
                    </a>
                </li>
            </ul>
        </header>
        <div id="model-fast-info-section">
            @include('includes.templates.ratings._ratings-stream')
        </div>
    </div>
</section>
<!-- //Table header Model Profile  -->
