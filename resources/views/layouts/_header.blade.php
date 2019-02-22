<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            {{--  <ul class="nav navbar-nav navbar-main">
                <li><a href="" >项目</a></li>
                <li><a href="{{ route('feature', ['space_id' => isset($space->space_id) ? $space->space_id : 0]) }}" class="active">需求</a></li>
                <li><a href="">缺陷</a></li>
                <li><a href="">统计</a></li>
            </ul>  --}}

            <ul class="nav navbar-nav navbar-right navbar-userinfo">
                @guest
                    <li><a href="{{ route('login') }}">登录</a></li>
                    <li><a href="{{ route('register') }}">注册</a></li>
                @else
                    {{--  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">新建项目</a></li>
                            <li><a href="#">新建需求</a></li>
                            <li><a href="#">新建缺陷</a></li>
                            <li><a href="#">新建日程</a></li>
                            <li><a href="#">新建会议</a></li>
                        </ul>
                    </li>  --}}

                    <li>
                        <a href="#" class="notifications-badge">
                            <span class="badge badge-hint" title="消息提醒">7</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach(Auth::user()->corps as $corp)
                            <li><a href="{{ route('corp.spaces', ['corp' => $corp->corp_id]) }}">{{ $corp->name }}</a></li>
                            @endforeach
                            <li><a href="{{ route('profile', Auth::user()) }}">我的主页</a></li>
                            <li><a href="{{ route('settings') }}">账号设置</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">退出登录</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                @endguest
            </ul>
        </div>

    </div>
</nav>