<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.11.3/main.min.js'></script>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

<link href="<?php echo base_url('assets/css/bootstrap-icons.css');?>" rel="stylesheet">

<link href="<?php echo base_url('assets/css/apexcharts.css');?>" rel="stylesheet">

<link href="<?php echo base_url('assets/css/tooplate-mini-finance.css');?>" rel="stylesheet">
</head>

<body>
    <header class="navbar sticky-top flex-md-nowrap">
        <div class="col-md-3 col-lg-3 me-0 px-3 fs-6">
            <a class="navbar-brand" href="index.html">List Des Rendez-Vous</a>
        </div>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="custom-form header-form ms-lg-3 ms-md-3 me-lg-auto me-md-auto order-2 order-lg-0 order-md-0" action="#" method="get" role="form">
            <input class="form-control" name="search" type="text" placeholder="Search" aria-label="Search">
        </form>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo site_url('admindashbord'); ?>">
                                Admin Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active disabled">
                                Liste Des Rendez-Vous
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="configurationdate.html">
                                Configuration Des Dates
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('serviceadminview'); ?>">
                                Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="adminfileinsert.html">
                                Insert A File 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo site_url('loginAsUserAdmin'); ?>">
                                Login As User
                            </a>
                        </li>

                        <li class="nav-item border-top mt-auto pt-2">
                            <a class="nav-link" href="<?php echo site_url('logoutadmin'); ?>">
                                Logout
                            </a>
                        </li>


                    </ul>
                </div>
            </nav>

            <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                <div class="title-group mb-3">
                    <h1 class="h2 mb-0">List Des Rendez-Vous</h1>
                </div>
                <div class="row my-4">
                    <div class="col-lg-12 col-12">
                        <div id="calendar"></div>
                    </div>
                </div>
                <footer class="site-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <p class="copyright-text">Copyright © Mini Finance 2048
                                    - Design: <a rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var data = "<?php echo site_url('ajaxRdv'); ?>";
            console.log('URL for AJAX request:', data);
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                selectHelper: true,
                events: [
                    {
                        id: 1,
                        title: 'Client: 1, Service: 2',
                        start: '2024-07-10',
                        end: '2024-07-10'
                    },
                    {
                        id: 2,
                        title: 'Client: 3, Service: 1',
                        start: '2024-07-14',
                        end: '2024-07-14'
                    },
                    {
                        id: 3,
                        title: 'Client: 4, Service: 3',
                        start: '2024-07-20',
                        end: '2024-07-21'
                    }
                ],
                select: function(info) {
                    var title = prompt('Enter Event Title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: info.startStr,
                            end: info.endStr,
                            allDay: info.allDay
                        });
                    }
                    calendar.unselect();
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>
