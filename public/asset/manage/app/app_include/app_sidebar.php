<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="../app-assets/dist/img/mission-shakti.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 50px;height: 50px;">
      <span class="brand-text font-weight-light">Mission Shakti</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="home" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <?php
            if (($_SESSION['type'] == 'Super Admin') OR ($_SESSION['type'] == 'Supervisor')) {
                ?> 

                <!--User control Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>User Control<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Menu items for User Control -->
                        <li class="nav-item">
                            <a href="supervisor_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Supervisor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="coordinator_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Coordinator</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="trainee_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trainee</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/User control Menu -->

                <!--Application control Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Application<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Menu items for Application Control -->
                        <li class="nav-item">
                            <a href="training_application_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Training</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="erickshaw_application_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-Rickshaw</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/Application control Menu -->

                <!--Event control Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Event<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Menu items for Event Control -->
                        <li class="nav-item">
                            <a href="event_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Event List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/Event control Menu -->

                <!--AWS control Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>AWS<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Menu items for Event Control -->
                        <li class="nav-item">
                            <a href="channel_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Channel List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="live_channel_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Live Channel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="live_recording" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Live Recording</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/AWS control Menu -->

                <!--Report control Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Report<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Menu items for Report Control -->
                        <li class="nav-item">
                            <a href="training_application_report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Training</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="erickshaw_application_report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-Rickshaw</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="event_report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="trainee_report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trainee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="program_tracker" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Program Tracker</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/Report control Menu -->

            <?php } ?>

            <!-- Profile Section -->
            <li class="nav-header">Profile</li>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../app-assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
                    <!-- <a href="#" class="small-box-footer"><?php echo $_SESSION['type']; ?></a> -->
                </div>
            </div>
            <!-- End Profile Section -->

            <li class="nav-item menu-open">
                <a href="logout" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>

    <!-- /.sidebar -->
  </aside>