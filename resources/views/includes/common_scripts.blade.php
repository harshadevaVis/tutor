<script src="{{ URL::asset('my_assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ URL::asset('my_assets/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ URL::asset('my_assets/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('my_assets/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{ URL::asset('my_assets/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{ URL::asset('my_assets/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{ URL::asset('my_assets/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{ URL::asset('my_assets/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{ URL::asset('my_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ URL::asset('my_assets/plugins/easing/easing.js')}}"></script>
<script src="{{ URL::asset('my_assets/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{ URL::asset('my_assets/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> {{-- Sweet alert. only js no css but working--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script><!-- select2 cdn -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQNrIiVxt0HaB1KTfBgPv8H1yZWUPz838&libraries=places&language=en&callback=initMap&types=geocode" async defer></script><!-- google place autocomplete api -->
<script  type="text/javascript">
    $(document).ready(function () {
        $(".select2").select2();
        {{--$('.main_nav li a').each(function(){--}}
            {{--if ($(this).prop('href') == window.location.href) {--}}
                {{--$(this).addClass('active'); $(this).parents('li').addClass('active');--}}
            {{--}--}}
            {{--else if("{{\Illuminate\Support\Facades\Route::currentRouteName()}}" == 'home'){--}}
                {{--$('#home').addClass('active');--}}
                {{--$('#home').parents('li').addClass('active');--}}
            {{--}--}}
            {{--else{--}}
                {{--$(this).removeClass('active'); $(this).parents('li').removeClass('active');--}}
            {{--}--}}
        {{--});--}}
    } );

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

