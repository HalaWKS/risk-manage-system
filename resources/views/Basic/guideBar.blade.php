<div class="transparent-container">

    {{--登陆成功导航栏--}}
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-inverse open-hover" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex2-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand" style="font-family: 'Open Sans'; font-style: italic;">
                        RiskManage
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex2-collapse">
                    <ul class="nav navbar-nav">
                        <li style="font-family: 微软雅黑; font-size: small;"><a
                                    href="{{url("/home")}}">风险列表</a></li>
                        @if( Auth::user()->type == 'developer' )
                            <li style="font-family: 微软雅黑; font-size: small;"><a
                                        href="{{url("/myrisk")}}">我的跟踪</a></li>
                        @endif
                        @if( Auth::user()->type == 'pm' )
                            <li style="font-family: 微软雅黑; font-size: small;"><a
                                        href="{{url("/createrisk")}}">创建风险</a></li>
                            <li style="font-family: 微软雅黑; font-size: small;"><a
                                        href="{{url("/createproject")}}">创建项目</a></li>
                            <li style="font-family: 微软雅黑; font-size: small;"><a
                                        href="{{url("/createrisktype")}}">添加风险类型</a></li>
                            <li class="dropdown" style="font-family: 微软雅黑; font-size: small;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">风险管理计划<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url("/showAllPlan")}}">查看所有计划</a></li>
                                    <li><a href="{{url("/createRiskManagePlan")}}">新建计划</a></li>
                                </ul>
                            </li>
                        @endif
                        <li style="font-family: 微软雅黑; font-size: small;"><a
                                    href="{{url("/statistic")}}">数据统计</a></li>

                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="搜索">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li style="font-family: 微软雅黑; font-size: small;">
                            <a href="{{url('/logout')}}">注销</a>
                        </li>
                        <li style="font-family: 微软雅黑; font-size: small;">
                            <a href="#">{{ Auth::user()->name }}</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>

    @for($i = 0; $i < 3; $i++)
        <br>
    @endfor

</div>