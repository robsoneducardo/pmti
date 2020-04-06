<ul class="navbar-nav mr-auto">
	<li class="{{ Request::is('routeName*') ? 'active' : '' }}" role="menuitem">
		<a class="nav-link" href="{{route('activities.index')}}">@lang('activities.index')</a>
	</li>
	<li class="{{ Request::is('routeName*') ? 'active' : '' }}" role="menuitem">
		<a class="nav-link" href="{{route('ministers.index')}}">@lang('ministers.index')</a>
	</li>
</ul>
