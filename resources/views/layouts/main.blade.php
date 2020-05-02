@include('includes.header_start')

@yield('customLinks')


@include('includes.header_end')
@include('includes.top_bar')
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
@yield('pageSpecificContent')

@if(Route::currentRouteName() != 'signUp' && Route::currentRouteName() != 'login')
@include('includes.footer_start')
@endif
@include('includes.common_scripts')


@yield('customScript')


@include('includes.footer_end')



