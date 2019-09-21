  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
{{--       <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> --}}

      <!-- search form (Optional) -->
{{--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> --}}
      <!-- /.search form -->

      <!-- Sidebar Menu -->


      <ul class="sidebar-menu" data-widget="tree">
        <li class="header br-menu-link ">KINH DOANH</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="menu_dashboard"><a href="{{route('home.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="" id="menu_customer"><a href="#{{-- {{route('customer.list')}} --}}"><i class="fa fa-list-alt"></i> <span>Danh sách khách hàng</span></a></li>
        <li class=""><a href="#"><i class="fa fa-list-alt"></i> <span>Quản lý nhóm</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-cab"></i> <span>Lái thử</span> 
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-list"></i> <span>Tạo mới lái thử</span></a></li>
        <li><a href="#"><i class="fa fa-list-alt"></i> <span>Danh sách lái thử</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Hợp đồng</span> 
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-list"></i> <span>Danh sách hợp đồng</span></a></li>
        <li><a href="#"><i class="fa fa-list-alt"></i> <span>Tiến độ hợp đồng</span></a></li>
        <li><a href="#"><i class="fa fa-list-alt"></i> <span>Danh sách khách hàng</span></a></li>
          </ul>
        </li>

      </ul>


      <ul class="sidebar-menu" data-widget="tree">
        <li class="header br-menu-link ">SALE ADMIN</li>
        <!-- Optionally, you can add icons to the links -->
        <li class=""><a href=""><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="dskh"><a href="#"><i class="fa fa-list-alt"></i> <span>Danh sách hợp đồng</span></a></li>
        <li class=""><a href="#"><i class="fa fa-list-alt"></i> <span>Kho xe</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Báo cáo</span> 
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-list"></i> <span>Danh sách hợp đồng</span></a></li>
        <li><a href="#"><i class="fa fa-list-alt"></i> <span>Tiến độ hợp đồng</span></a></li>
          </ul>
        </li>
        
      </ul>



      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">KHO PHỤ KIỆN</li>
        <!-- Optionally, you can add icons to the links -->
        <li class=""><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>        
        <li><a href="#"><i class="fa fa-cog"></i> <span>Yêu cầu lắp phụ kiện</span></a></li>
        <li><a href="#"><i class="fa fa-truck"></i> <span>Danh sách phụ kiện</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-th-list"></i> <span>Báo cáo</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-bar-chart"></i> <span>Báo kho</span></a></li>
            <li><a href="#"><i class="fa fa-bar-chart"></i> <span>Báo cáo yêu cầu lắp phụ kiện</span></a></li>
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">CÀI ĐẶT HỆ THỐNG</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="user" id='menu_user'><a href="#{{-- {{route('user.list')}} --}}" ><i class="fa fa-user"></i> <span  >Người dùng</span></a></li>
        <li class="group" id='menu_group'><a href="#{{-- {{route('group.list')}} --}}"><i class="fa fa-object-group"></i> <span>Nhóm</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-taxi"></i> <span>Quản lý xe</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-taxi"></i> <span>Quản lý hãng xe</span></a></li>
            <li><a href="#"><i class="fa fa-taxi"></i> <span>Model xe</span></a></li>
          </ul>
        </li>
         <li><a href="#"><i class="fa fa-link"></i> <span>Cài đặt Mail</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>