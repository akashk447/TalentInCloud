<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.php" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.php" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>Menu</li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="index.php">
                        <i class="ri-dashboard-2-line"></i> <span data-key="r-dashboard">Dashboard</span>
                    </a>

                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Jobs</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#resumebuzz-clients" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-building-4-line"></i> <span data-key="r-clients">Clients</span>
                    </a>
                    <div class="collapse menu-dropdown" id="resumebuzz-clients">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="add-organisation.php" class="nav-link" data-key="r-clients"> Add Organization</a>
                            </li>
                            <li class="nav-item">
                                <a href="add-contacts.php" class="nav-link" data-key="r-clients"> Add Contacts </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-clients.php" class="nav-link" data-key="r-clients"> Add Location </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage-clients.php" class="nav-link" data-key="r-clients"> Manage Clients </a>
                            </li>
                           

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#resumebuzz-jobs" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class=" ri-briefcase-line"></i> <span data-key="r-jobs">Jobs</span>
                    </a>
                    <div class="collapse menu-dropdown" id="resumebuzz-jobs">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="job.php" class="nav-link" data-key="r-jobs"> Add a job </a>
                            </li>
                            <li class="nav-item">
                                <a href="view-job.php" class="nav-link" data-key="r-jobs"> Manage Job </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#resumebuzz-candidates" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-user-3-line"></i> <span data-key="r-candidates">Candidates</span>
                    </a>
                    <div class="collapse menu-dropdown" id="resumebuzz-candidates">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="r-candidates"> Add Candidates</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="r-candidates"> Manage Candidates</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#resumebuzz-interviewes" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class=" ri-calendar-2-line"></i> <span data-key="r-interviews">Interviewes</span>
                    </a>
                    <div class="collapse menu-dropdown" id="resumebuzz-interviewes">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="r-interviews"> Demo Interviewes</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#resumebuzz-management" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class=" ri-article-line"></i> <span data-key="r-management">Task Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="resumebuzz-management">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="r-management"> Demo Taskmanagement</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="reports.php">
                        <i class=" ri-pie-chart-line"></i> <span data-key="r-settings">Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="setting.php">
                        <i class=" ri-settings-2-line"></i> <span data-key="r-settings">Settings</span>
                    </a>
                </li>
                <li class="menu-title"><i class="ri-more-fill"></i> <span>Quick Links</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="setting.php">
                        <i class=" ri-lifebuoy-line"></i> <span data-key="r-settings">Help Center</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="setting.php">
                        <i class=" ri-file-shield-2-line"></i> <span data-key="r-settings">Terms Of Service</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="setting.php">
                        <i class="ri-fingerprint-line"></i> <span data-key="r-settings">Privacy Policy</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>