<ul class="navbar-nav mr-auto">
	<li class="{{ Request::is('routeName*') ? 'active' : '' }}" role="menuitem">
		<a class="nav-link" href="{{route('activities.index')}}">@lang('activities.index')</a>
	</li>
	<li class="{{ Request::is('routeName*') ? 'active' : '' }}" role="menuitem">
		<a class="nav-link" href="{{route('ministers.index')}}">@lang('ministers.index')</a>
	</li>
	<li class="{{ Request::is('routeName*') ? 'active' : '' }}" role="menuitem">
		<a class="nav-link" href="{{route('districts.index')}}">@lang('districts.index')</a>
	</li>
	<li class="{{ Request::is('routeName*') ? 'active' : '' }}" role="menuitem">
		<a class="nav-link" href="{{route('comorbidities.index')}}">@lang('comorbidities.index')</a>
	</li>
</ul>
