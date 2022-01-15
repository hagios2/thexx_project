<!-- Ratings options    -->
<ul class="rating-options">
    <li>
        @php
            if (isset($like_model[$model_data->user_id])) {
                $status = 1;
                $color = '#0040ff';
            }
            else {
                $status = 0;
                $color = '#818183';
            }
        @endphp
        <a id="model-{{ $model_data->user_id }}" status="{{ $status }}" onclick='likeStatus(this,"live","null")'>
        <svg color="red" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path id="path1{{$model_data->user_id}}" d="M1.04166 4.375C0.4675 4.375 0 4.8425 0 5.41666V8.75C0 9.32416 0.4675 9.79166 1.04166 9.79166H2.29166C2.52625 9.79166 2.74207 9.7125 2.91666 9.58082V4.375H1.04166Z" fill="{{ $color }}"/>
            <path id="path2{{$model_data->user_id}}" d="M10.0002 5.93766C10.0002 5.68725 9.901 5.45391 9.72891 5.28182C9.9235 5.06891 10.0227 4.78348 9.99557 4.48641C9.94682 3.95682 9.46973 3.54182 8.90891 3.54182H6.33516C6.46266 3.15473 6.66682 2.44516 6.66682 1.87516C6.66682 0.971406 5.89891 0.208496 5.41682 0.208496C4.98391 0.208496 4.67473 0.452246 4.66141 0.462246C4.61225 0.501836 4.5835 0.561836 4.5835 0.625156V2.03807L3.3835 4.63766L3.3335 4.66307V9.12891C3.67266 9.28891 4.10182 9.37516 4.37516 9.37516H8.19975C8.6535 9.37516 9.05059 9.06932 9.14391 8.64725C9.19182 8.43016 9.16391 8.21141 9.0685 8.02141C9.37641 7.86641 9.5835 7.54932 9.5835 7.18766C9.5835 7.04016 9.54975 6.89891 9.48559 6.771C9.7935 6.616 10.0002 6.29891 10.0002 5.93766Z" fill="{{ $color }}"/>
        </svg>
        
        </a>
          
            @php
                if ($favorite_page == FALSE) {
                    if (isset($likesCountData[$model_data->user_id])) {
                        $likecount=$likesCountData[$model_data->user_id];
                    }
                    else {
                        $likecount='0';
                    }
                }
                else {
                    if(isset($model_data->video_id))
                    {

                    
                    if (isset($likesCountData[$model_data->video_id])) {
                        $likecount=$likesCountData[$model_data->video_id];

                    }
                    else {
                        $likecount='0';
                    }
                }
                else{
                    $likecount='0'; 
                }
                }
            @endphp
            {{-- <span  id="like_count_change-{{ $model_data->user_id }}" class="wrapper-static-content" >
                {{$likecount}}
            </span> --}}
        
    </li>
    <li>
        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 0.5C3.70727 0.5 1.62811 1.75437 0.0938938 3.79181C-0.0312979 3.95873 -0.0312979 4.19193 0.0938938 4.35885C1.62811 6.39874 3.70727 7.65311 6 7.65311C8.29273 7.65311 10.3719 6.39874 11.9061 4.36131C12.0313 4.19438 12.0313 3.96118 11.9061 3.79426C10.3719 1.75437 8.29273 0.5 6 0.5ZM6.16447 6.59512C4.64253 6.69086 3.3857 5.43648 3.48144 3.91209C3.55999 2.65526 4.57871 1.63654 5.83553 1.55799C7.35747 1.46226 8.6143 2.71663 8.51856 4.24102C8.43756 5.4954 7.41884 6.51411 6.16447 6.59512ZM6.08837 5.43157C5.26849 5.48312 4.59098 4.80807 4.64498 3.98819C4.68671 3.31068 5.23658 2.76327 5.91408 2.71909C6.73397 2.66754 7.41148 3.34259 7.35747 4.16247C7.31329 4.84244 6.76342 5.38984 6.08837 5.43157Z" fill="#818183"/>
        </svg>
        <span class="wrapper-static-content">
            @php
                if ($favorite_page == 'false') {
                    if (isset($viewsCountData[$model_data->live_video_id])) {
                        $viewcount=$viewsCountData[$model_data->live_video_id];
                    }
                    else {
                        $viewcount='0';
                    }
                }
                else {
                    if (isset($viewsCountData[$model_data->video_id]) && $model_data->video_type == 'no_live') {
                        $viewcount = $viewsCountData[$model_data->video_id];
                    }
                    elseif (isset($viewsCountData[$model_data->video_id]) && $model_data->video_type == 'live') {
                        $viewcount = $viewsCountData['l-' . $model_data->video_id];
                    }
                    else {
                        $viewcount='0';
                    }
                }
            @endphp
            {{$viewcount}}
            <span class="static-content">views</span>
        </span>
    </li>
</ul>
<!-- //Ratings options    -->
