@extends(getPrimaryLayout())

@section(LAYOUT)
    <div class="column-2-sidebar">
        @include(getFragment(NAVIGATION))
        <div class="content">
            @include(getFragment(BREADCRUMBS))
            @include(getFragment(PAGE))
            @include('includes.footer')
        </div>
    </div>
@endsection


