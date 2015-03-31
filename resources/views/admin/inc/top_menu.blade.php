  <div class="collapse navbar-collapse" id="navbar-collapse">
    	@if (!Auth::guest())
      <ul class="nav navbar-nav">
        @foreach (Config::get('admin.menu') as $item)

            {{-- if it's a single item --}}
            @if (!isset($item['children']) || $item['children']==false)
              <li class="{{ (Request::url() == $item['url'])?'active':'' }}">
                <a href="{{ $item['url'] }}">
                  @if (isset($item['icon']) && $item['icon']!='' && $item['icon']!=' ')
                    <i class="{{ $item['icon'] }}"></i>
                  @endif
                  {{ $item['label'] }}
                  @if (Request::url() == $item['url'])
                    <span class="sr-only">(current)</span>
                  @endif
                  </a>
              </li>

            @else
            {{-- if it's a menu dropdown --}}
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if (isset($item['icon']) && $item['icon']!='' && $item['icon']!=' ')
                  <i class="{{ $item['icon'] }}"></i>
                @endif
                {{ $item['label'] }}
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                @foreach ($item['children'] as $subitem)
                  <li class="{{ (Request::url() == $subitem['url'])?'active':'' }}">
                    <a href="{{ $subitem['url'] }}">
                      @if (isset($subitem['icon']) && $subitem['icon']!='' && $subitem['icon']!=' ')
                        <i class="{{ $subitem['icon'] }}"></i>
                      @endif
                      {{ $subitem['label'] }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </li>

            @endif
        @endforeach
      </ul>
      @endif

      {{-- TODO: site-wide search --}}
      {{-- <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
        </div>
      </form> --}}

      <ul class="nav navbar-nav navbar-right">
        {{-- <li><a href="#">Link</a></li> --}}
        @if (Auth::guest())
        	<li><a href="{{ url('/auth/login') }}">Login</a></li>
        	<li><a href="{{ url('/auth/register') }}">Register</a></li>
        @else
        	<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
        		<ul class="dropdown-menu" role="menu">
        			<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
        		</ul>
        	</li>
        @endif
      </ul>

    </div><!-- /.navbar-collapse