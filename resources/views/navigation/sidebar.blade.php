<div id="Sidebar">
    <div class="logo">
        <a href="{{ route(HOME) }}"><img src="{{ asset("images/logos/logo_emblem.png") }}" class="img-fluid"></a>
    </div>

    <div class="sidebar-list-group">
        <small>Fundamentals</small>
        <ul>
            <a href="{{ route('fundamentals.logo') }}"><li>Logo</li></a>
            <a href="{{ route('fundamentals.components') }}"><li>Components</li></a>
            <a href="{{ route('fundamentals.imagery')  }}"><li>Imagery</li></a>
        </ul>
    </div>

    <div class="sidebar-list-group">
        <small>Ruleset</small>
        <ul>
            <a href="{{ route('ruleset.variables') }}" disabled><li>Variables</li></a>
            <a href="{{ route('ruleset.palette') }}"><li>Palette</li></a>
            <a href="{{ route('ruleset.typography') }}"><li>Typography</li></a>
            <a href="{{ route('ruleset.borders') }}" disabled><li>Borders</li></a>
            <a href="{{ route('ruleset.spacing') }}" disabled><li>Spacing</li></a>
        </ul>
    </div>
</div>

