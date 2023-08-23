@if (Auth::guard('admin')->user() !== null)
    @include('partials.admin-sidebar')
@endif

@if (Auth::guard('traitor')->user() !== null)
    @include('partials.traitor-sidebar')
@endif
