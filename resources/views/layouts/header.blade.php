<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->

        <!--  notification end -->
    </div>
    <div class="top-menu">

        <form action="{{route('auth.logout')}}" method="post">

            <ul class="nav pull-right top-menu">
                <li>
                    @method("delete")
                    @csrf
                    <button class="logout">Quiter</button>
                </li>
            </ul>
        </form>
    </div>
</header>