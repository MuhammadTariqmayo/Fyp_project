<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{asset('adminpanel')}}/img/admin_profile.jpg" style="width: 70px; height: 70px" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">AcademyWorld</strong>
                             </span> <span class="text-muted text-xs block">Admin<b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                {{-- <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li> --}}
                                <li class="divider"></li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   <h4>Logout</h4>
                                   </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>
                                <!-- <li><a href="{{route('logout')}}">Logout</a></li> -->
                            </ul>
                        </div>
                        <div class="logo-element">
                            AUC
                        </div>
                    </li>
                    <li >
                        <a href="/home"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>

                    </li>

                    <li>

                      @if(Auth::user()->type == 'admin')
                         <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Super
                            admin
                         </span><span class="fa arrow"></span></a>
                              <ul class="nav nav-second-level collapse">
                                 <li><a href="{{route('committe.create')}}"> Create Committe</a></i>
                                 <li><a href="{{route('committe.index')}}">Committe List</a></li>

                                </ul>
                        @endif
                    </li>

                    <li>
                        @if(Auth::user()->type=='C.H'||Auth::user()->type=='C.M')
                          <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Committe</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('csv_file')}}">Register </a></li>
                               <li><a href="{{URL::to('csv_file_pagination')}}">List </a></li>

                            </ul>
                            @endif
                    </li>

                    <li>
                        @if(Auth::user()->type=='adviser'||Auth::user()->type=='superviser')
                           <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Supervisor/Adviser</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                  <!-- <li><a href="/">Create</a></li> -->
                                  <li><a href="{{URL::to('/supervisor')}}">List</a></li>
                                  <li><a href="{{URL::to('/adviserlist')}}">My List</a></li>
                                  <li><a href="{{URL::to('/idea')}}">create idea</a></li>
                                  <li><a href="{{URL::to('/myideas')}}">All ideas</a></li>
                                </ul>
                        @endif
                    </li>

                    <li>
                    @if(Auth::user()->type=='student')
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Students</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{URL::to('student_list')}}">Student List</a></li>
                            <li><a href="{{URL::to('mylist')}}">My List</a></li>
                            <li><a href="{{URL::to('superviser_adviser_ideas')}}">superviser\adviser All ideas</a></li>
                        </ul>
                        @endif
                    </li>

                    <!-- <li>
                        <a href="/"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Contact Us List</span><span class="fa arrow"></span></a>

                    </li>

                    <li>
                        <a href="/"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>

                    </li> -->




                </ul>

            </div>
        </nav>
