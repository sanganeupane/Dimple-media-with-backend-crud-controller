
@section('sideBar')
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('uploads/admins/'.Auth::guard('admin')->user()->image)}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{Auth::guard('admin')->user()->username}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </form>
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview">
                    <a href="{{route('admin')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-dashboard"></i>
                    </a>
                    <a href="{{route('add-admin-user')}}">
                        <i class="fa fa-users"></i> <span>Add-Admin</span> <i class="fa fa-success"></i>
                    </a>
                    <a href="{{route('show-admin-users')}}">
                        <i class="fa fa-film"></i> <span>Show Admins</span> <i class="fa fa-danger"></i>
                    </a>
                    <a href="{{route('addConfession')}}">
                        <i class="fa fa-flash"></i> <span>Confession</span> <i class="fa fa-danger"></i>
                    </a>
                    <a href="{{route('show-confession')}}">
                        <i class="fa fa-film"></i> <span>Show Confession</span> <i class="fa fa-danger"></i>
                    </a>

                    <a href="{{route('add-opinion')}}">
                        <i class="fa fa-gift"></i> <span>Opinion</span> <i class="fa fa-danger"></i>
                    </a>

                      <a href="{{route('show-opinion')}}">
                        <i class="fa fa-film"></i> <span>Show opinion</span> <i class="fa fa-danger"></i>
                    </a>

                    </a> <a href="{{route('add-news')}}">
                        <i class="fa fa-book"></i> <span>News </span> <i class="fa fa-danger"></i>
                    </a>

                    </a> <a href="{{route('show-news')}}">
                        <i class="fa fa-film"></i> <span>Show News </span> <i class="fa fa-danger"></i>
                    </a>


                    </a> <a href="{{route('add-about')}}">
                        <i class="fa fa-gamepad"></i> <span>Add About </span> <i class="fa fa-danger"></i>
                    </a>

                    </a> <a href="{{route('show-about')}}">
                        <i class="fa fa-film"></i> <span>show About </span> <i class="fa fa-danger"></i>
                    </a>


                    </a> <a href="{{route('add-ourteam')}}">
                        <i class="fa fa-user"></i> <span>Add Our Team Members </span> <i class="fa fa-danger"></i>
                    </a>

                    </a> <a href="{{route('show-ourteam')}}">
                        <i class="fa fa-film"></i> <span>Show Team Members </span> <i class="fa fa-danger"></i>
                    </a>

                    </a> <a href="{{route('admin-contact')}}">
                        <i class="fa fa-location-arrow"></i> <span>Add Contact </span> <i class="fa fa-danger"></i>
                    </a>

                    </a> <a href="{{route('show-contact')}}">
                        <i class="fa fa-film"></i> <span>Show Contact </span> <i class="fa fa-danger"></i>
                    </a>

                    </a> <a href="{{route('admin-privacy')}}">
                        <i class="fa fa-cloud"></i> <span>Add privacy policy  </span> <i class="fa fa-danger"></i>
                    </a>

                    </a> <a href="{{route('show-privacy')}}">
                        <i class="fa fa-film"></i> <span>Show privacy policy  </span> <i class="fa fa-danger"></i>
                    </a>

                    </a> <a href="{{route('admin-termspage')}}">
                        <i class="fa fa-star"></i> <span>Add Terms & conditions  </span> <i class="fa fa-danger"></i>
                    </a>


                    </a> <a href="{{route('show-termspage')}}">
                        <i class="fa fa-film"></i> <span>Show Terms & conditions  </span> <i class="fa fa-danger"></i>
                    </a>


                    </a> <a href="{{route('admin-talks')}}">
                        <i class="fa fa-star"></i> <span>Add Talks  </span> <i class="fa fa-danger"></i>
                    </a>


                    </a> <a href="{{route('show-talks')}}">
                        <i class="fa fa-film"></i> <span>Show Talks </span> <i class="fa fa-danger"></i>
                    </a>


                </li>
            </ul>
        </section>
    </aside>

@endsection
