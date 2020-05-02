<!-- Courses Sidebar -->
<div class="mt-5 mb-2">
    <div class="sidebar_section">
        <div class="sidebar_section_title">Categories</div>
        <div class="sidebar_categories">
            <ul>
                <?php $categories1 = \App\Category::where('status',1)->with('classes')->get()->sortByDesc(function($q)
                {
                    return $q->classes->count();
                }); ?>

                @foreach($categories1 as $category2)
                <li><a href="{{route('returnToSearchPage',['category'=>$category2->idcategory])}}">{{$category2->category}} ( {{\App\Classes::where('category_idcategory',$category2->idcategory)->where('status',1)->get()->count() }} )</a></li>
                @endforeach

            </ul>
        </div>
    </div>
    {{--<div class="sidebar_section">--}}
        {{--<div class="sidebar_section_title">Latest Courses</div>--}}
        {{--<div class="sidebar_latest">--}}

            {{--<!-- Latest Course -->--}}
            {{--<div class="latest d-flex flex-row align-items-start justify-content-start">--}}
                {{--<div class="latest_image"><div><img src="{{ URL::asset('my_assets/images/latest_1.jpg')}}" alt=""></div></div>--}}
                {{--<div class="latest_content">--}}
                    {{--<div class="latest_title"><a href="course.html">How to Design a Logo a Beginners Course</a></div>--}}
                    {{--<div class="latest_price">Free</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<!-- Latest Course -->--}}
            {{--<div class="latest d-flex flex-row align-items-start justify-content-start">--}}
                {{--<div class="latest_image"><div><img src="{{ URL::asset('my_assets/images/latest_2.jpg')}}" alt=""></div></div>--}}
                {{--<div class="latest_content">--}}
                    {{--<div class="latest_title"><a href="course.html">Photography for Beginners Masterclass</a></div>--}}
                    {{--<div class="latest_price">$170</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<!-- Latest Course -->--}}
            {{--<div class="latest d-flex flex-row align-items-start justify-content-start">--}}
                {{--<div class="latest_image"><div><img src="{{ URL::asset('my_assets/images/latest_3.jpg')}}" alt=""></div></div>--}}
                {{--<div class="latest_content">--}}
                    {{--<div class="latest_title"><a href="course.html">The Secrets of Body Language</a></div>--}}
                    {{--<div class="latest_price">$220</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<!-- Latest Course -->--}}
            {{--<div class="latest d-flex flex-row align-items-start justify-content-start">--}}
                {{--<div class="latest_image"><div><img src="{{ URL::asset('my_assets/images/latest_3.jpg')}}" alt=""></div></div>--}}
                {{--<div class="latest_content">--}}
                    {{--<div class="latest_title"><a href="course.html">The Secrets of Body Language</a></div>--}}
                    {{--<div class="latest_price">$220</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
</div>