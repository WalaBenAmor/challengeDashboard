<div class="navbar-default sidebar" role="navigation">

    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">

            <ul class="nav" id="side-menu">

                <li>

                </li>
                <li>

                </li>
                @if (auth()->user()->isOrganizer())
                <li>



                <li> <a href="{{ url('create_challenge') }}"><i class="fa fa-dashboard fa-fw"></i> Create Challenge</a> </li>
                <li> <a href="{{ url('all_challenge') }}"><i class="fa fa-dashboard fa-fw"></i> Display challenges</a></li>

                </li>
                @endif
                @if (auth()->user()->isParticipant())
                <li>


                <li>


                    <a href="{{ url('ongoing_challenge') }}"><i class="fa fa-files-o fa-fw"></i> Display Ongoing challenges</a> </li>
                <li> <a href="{{ url('all_challenge') }}"><i class="fa fa-files-o fa-fw"></i> All challenges</a>

                </li>

                </li>
                @endif
                @if (auth()->user()->isAdmin())
                <li>



                <li>

                    <a href="{{ url('approve_guest') }}"><i class="fa fa-files-o fa-fw"></i> Approve Guest</a> </li>
                <li> <a href="{{ url('all_challenge') }}"><i class="fa fa-files-o fa-fw"></i>All challenges</a>

                </li>

                </li>
                @endif


            </ul>


        </ul>

    </div>

    <!-- /.sidebar-collapse -->

</div>

<!-- /.navbar-static-side -->