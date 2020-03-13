<div class="navbar-default sidebar" role="navigation">

    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">

            <!-- <li>

                <a href="{{ url('register') }}"><i class="fa fa-dashboard fa-fw"></i> register</a>

            </li>
            <li>

                <a href="{{ url('login') }}"><i class="fa fa-dashboard fa-fw"></i> login</a>

            </li> -->
            <li>

            </li>
            <li>
                
            </li>

            <li>

                <a href="#"><i class="fa fa-files-o fa-fw"></i> Orginazer<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="{{ url('create_challenge') }}">Create Challenge</a>

                    </li>

                    <li>

                        <a href="{{ url('all_challenge') }}">Display challenges</a>

                    </li>

                </ul>

                <!-- /.nav-second-level -->

            </li>

            <li>

                <a href="#"><i class="fa fa-files-o fa-fw"></i> Participant<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="{{ url('ongoing_challenge') }}">Display Ongoing challenges</a>

                    </li>

                    <li>

                        <a href="{{ url('all_challenge') }}">All challenges</a>

                    </li>

                </ul>

                <!-- /.nav-second-level -->

            </li>

            <!--  <li>

                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Admin</a>

            </li>--> <li>

                <a href="#"><i class="fa fa-files-o fa-fw"></i> Admin<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="{{ url('approve_guest') }}">Approve Guest</a>

                    </li>

                    <li>

                        <a href="{{ url('all_challenge') }}">All challenges</a>

                    </li>

                </ul>

                <!-- /.nav-second-level -->

            </li>




        </ul>

    </div>

    <!-- /.sidebar-collapse -->

</div>

<!-- /.navbar-static-side -->