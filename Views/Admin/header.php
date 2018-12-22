<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>University Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <!--    <link href="css/bootstrap.min.cs" rel="stylesheet">-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/datepicker3.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!--Icons-->
    <script src="../assets/js/lumino.glyphs.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/sidebar-menu.css">

    <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
    <script src="../assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../Admin/index.php"><span>Admin </span> Dashboard</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                        <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                        <li><a href="../Admin/logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
    <!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <!--
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
    -->
    <ul class="sidebar-menu">
        <li>
            <a href="#">
                <i class="fa fa-bars"></i> <span>Department</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="../department/add_department.php"><i class="fa fa-circle-o"></i>Add Department</a></li>
                <li><a href="../department/view_department.php"><i class="fa fa-circle-o"></i>View All Department</a></li>
            </ul>
        </li>
        <li>
            <ul class="sidebar-submenu" style="display: none;">
                <li><a href="top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li class=""><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Course</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="../course/add_course.php"><i class="fa fa-circle-o"></i>Add Course</a></li>
                <li><a href="../course/course_assign_to_teacher.php"><i class="fa fa-circle-o"></i>Course Assign to Teacher</a></li>
                <li><a href="../course/enroll_student_in_course.php"><i class="fa fa-circle-o"></i>Enroll Student In a Course</a></li>
                <li><a href="../course/view_course_statics.php"><i class="fa fa-circle-o"></i>View Course Statics</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-bars"></i>
                <span>Teacher</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="../teacher/add_teacher.php"><i class="fa fa-circle-o"></i> Add Teacher</a></li>
                <li><a href="../teacher/view_teacher_list.php"><i class="fa fa-circle-o"></i> Teachers List</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-graduation-cap"></i> <span>Student</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="../student/register_student.php"><i class="fa fa-circle-o"></i> Register Student</a></li>
                <li><a href="../student/view_student_list.php"><i class="fa fa-circle-o"></i> Students List</a></li>
            </ul>
        </li>
        <li>
            <a href="../roomAllocation/room_allocation.php">
                <i class="fa fa-square"></i> <span>Allocate Classrooms</span>
                <!--              <small class="label pull-right label-danger">3</small>-->
            </a>
        </li>
        <li>
            <a href="../roomAllocation/view_room_allocation.php">
                <i class="fa fa-square"></i> <span>View Class Schedule and Room Allocation</span>
                <!--              <small class="label pull-right label-warning">12</small>-->
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-fonticons"></i> <span>Result</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="../student/save_result.php"><i class="fa fa-circle-o"></i> Save Student Result</a></li>
                <li><a href="../student/view_result.php"><i class="fa fa-circle-o"></i> View Result</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-minus-square"></i> <span>Unassign</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="../unassign/unassign_courses.php"><i class="fa fa-circle-o"></i> Unassign All Courses</a></li>
                <li><a href="../unassign/unallocate_rooms.php"><i class="fa fa-circle-o"></i> Unallocate All class Rooms</a></li>
            </ul>
        </li>
        <li><a href="../../documentation/index.html"><i class="fa fa-"></i> <span></span></a></li>
        <!--          <li class="sidebar-header">LABELS</li>-->
        <li><a href="#"><i class="fa fa--o text-"></i> <span></span></a></li>
        <li><a href="#"><i class="fa fa--o text-"></i> <span></span></a></li>
        <li><a href="#"> <span></span></a></li>
        <li><a href="#"> <span></span></a></li>
        <li><a href="#"> <span></span></a></li>
        <li><a href="#"> <span></span></a></li>
    </ul>
    <div class="attribution">Template by Team Codex</div>
</div>
<!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="../Admin/index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>

            <?php if ($_SERVER['REQUEST_URI'] === '/UMS/Views/Admin/index.php'){ ?>
                <li class="active">University of Washington</li>
            <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/department/add_department.php'){ ?>
                <li><a href="../department/view_department.php">View All Department</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/department/view_department.php') { ?>
                <li><a href="../department/add_department.php">Add Department</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/course/add_course.php') { ?>
                <li><a href="../course/course_assign_to_teacher.php">Course Assign to Teacher</a></li>
                <li><a href="../course/enroll_student_in_course.php">Enroll Student In a Course</a></li>
                <li><a href="../course/view_course_statics.php">View Course Statics</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/course/course_assign_to_teacher.php') { ?>
                <li><a href="../course/add_course.php">Add Course</a></li>
                <li><a href="../course/enroll_student_in_course.php">Enroll Student In a Course</a></li>
                <li><a href="../course/view_course_statics.php">View Course Statics</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/course/enroll_student_in_course.php') { ?>
                <li><a href="../course/add_course.php">Add Course</a></li>
                <li><a href="../course/course_assign_to_teacher.php">Course Assign to Teacher</a></li>
                <li><a href="../course/view_course_statics.php">View Course Statics</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/course/view_course_statics.php') { ?>
                <li><a href="../course/add_course.php">Add Course</a></li>
                <li><a href="../course/course_assign_to_teacher.php">Course Assign to Teacher</a></li>
                <li><a href="../course/enroll_student_in_course.php">Enroll Student In a Course</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/teacher/add_teacher.php') { ?>
                <li><a href="../teacher/view_teacher_list.php">Teachers List</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/teacher/view_teacher_list.php') { ?>
                <li><a href="../teacher/add_teacher.php">Add Teacher</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/student/register_student.php') { ?>
                <li><a href="../student/view_student_list.php">Students List</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/student/view_student_list.php') { ?>
                <li><a href="../student/register_student.php">Register Student</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/student/save_result.php') { ?>
                <li><a href="../student/view_result.php">View Result</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/student/view_result.php') { ?>
                <li><a href="../student/save_result.php">Save Student Result</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/unassign/unassign_courses.php') { ?>
                <li><a href="../unassign/unallocate_rooms.php">Unallocate All class Rooms</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/unassign/unallocate_rooms.php') { ?>
                <li><a href="../unassign/unassign_courses.php">Unassign All Courses</a></li>
           <?php } elseif ($_SERVER['REQUEST_URI'] === '/UMS/Views/student/studentInfo.php') { ?>
                <li><a href="../student/register_student.php">Register Student</a></li>
           <?php }?>


        </ol>
    </div>
    <!--/.row-->