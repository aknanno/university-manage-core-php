/**
 * Created by mehedi on 2/5/17.
 */

$(document).ready(function() {
    $('#department').on('click', function() {
        var department = $(this).serialize();
        //console.log(department);

        $.ajax({
            url: 'get_department_data.php',
            dataType: 'json',
            type: 'post',
            data: department,
            success: function(data) {
                var teachers = data.teacher;
                var courses = data.course;
                var teacher = '<option name="teacher_name">Select teacher</option>';
                var course = '<option>Select a course</option>';
                var i = 0
                for (i; i < teachers.length; i++) {
                    teacher = teacher + '<option name="teacher_name">' + teachers[i].teacher_name + '</option>';

                }
                var j = 0;
                for (j; j < courses.length; j++) {
                    course = course + '<option>' + courses[j].course_code + '</option>';
                }

                $("#teacher").html(teacher);
                $("#courseCode").html(course);
            }
        });
    });


    $('#teacher').on('click', function() {
        var teacher = $('#teacher').serialize();
        //console.log(teacher);
        $.ajax({
            url: 'get_department_data.php',
            dataType: 'json',
            type: 'post',
            data: teacher,
            success: function(data) {
                //console.log(data);
                $('#creditToBeTaken').val(data.teacherCredit);
                $('#remainingCredit').val(data.remainingCread);
            }
        });
    })


    $('#courseCode').on('change', function() {
        var courseCode = $('#courseCode').serialize();
        //console.log(courseCode);
        $.ajax({
            url: 'get_department_data.php',
            dataType: 'json',
            type: 'post',
            data: courseCode,
            success: function(data) {
                $('#name').val(data.courseName);
                $('#credit').val(data.courseCredit);

                var coreseCredit = $('#credit').val(),
                    remaining_redit = $('#remainingCredit').val();


                $('#no').click(function() {
                    $('#dialog').dialog("close");
                    $('#name, #credit').val(" ");
                });

                $('#yes').click(function() {
                    $('#dialog').dialog("close");
                });

                // Assign course unique checking is here.
                if (!data.uniqueAssign) {
                    $('#dialog_uniqueAssign').dialog(function() {

                    });

                    $('#close').click(function() {
                        $('#dialog_uniqueAssign').dialog("close");
                        $('#name, #credit').val(" ");
                    });
                } else {
                    // If assign credit more then remaining credit then work this block.
                    if ((remaining_redit - coreseCredit) < 0) {
                        $('#dialog').dialog(function() {

                        });
                    }
                }

            }
        });
    }) // for course assign to teacher.........

    // for Course statics page...........
    $('#departmentCourseStasits').on('change', function() {
        var departmentName = $(this).serialize();
        //console.log(departmentName);

        $.ajax({
            url: 'course_static.php',
            dataType: 'json',
            type: 'post',
            data: departmentName,
            success: function(data) {
                var course = '<tr>';
                var serial = 1;
                var allCourse = data.allcourses;
                var assignCourse = data.assigncourse;
                //console.log(assignCourse);
                for (var i = 0; i < allCourse.length; i++) {
                    var assignTo = 'Not Assigned Yet';
                    for (var j = 0; j < assignCourse.length; j++){
                        if (allCourse[i].course_code == assignCourse[j].assign_course_code) {
                            assignTo = assignCourse[j].assign_teacher_name;
                            continue;
                        }
                    }
                    course = course + '<tr><td>'+ serial +'</td><td>' + allCourse[i].course_code + '</td><td>' + allCourse[i].course_name + '</td><td>' + allCourse[i].semester_name + '</td><td>' + assignTo + '</td></tr>'
                    serial++;
                }

                $('#courseStatics').html(course);
            }
        });
    });


    // for student registration.
    $('#studentContact').on('click', function() {
        var email = $('#studentEmail').serialize();
        //console.log(email);

        $.ajax({
            url: 'student_ajax_action.php',
            dataType: 'json',
            type: 'post',
            data: email,

            success: function (data) {
                console.log(data);
                if (data){
                    $('#emailUniqueError').html("This email is used for another student.");
                    $('#emailUniqueError').show('5000', function () {
                        $('#studentEmail').val(" ");
                    });
                    $('#studentEmail').on('click', function () {
                        $('#emailUniqueError').hide('slow');
                    });
                    //$('#emailUniqueError').hide('slow');

                }
            }
        });
    });


    // for Rooms Allocation page.
    $('#departmentInRoomAllocation').on('click', function() {
        var department = $(this).serialize();
        //console.log(department);

        $.ajax({
            url: 'room_allocation_ajax_action.php',
            dataType: 'json',
            type: 'post',
            data: department,
            success: function(data) {
                //console.log(data);
                var course = '';
                for (var i = 0; i < data.length; i++) {
                    course = course + '<option value="'+ data[i].course_code +'" >' + data[i].course_name + '</option>';
                }
                $('#courseInRoomAllocation').html(course);
            }
        });
    });

    // for Enroll Student in course.
    $('#regNo').on('click', function() {
        var regNo = $(this).serialize();
        //console.log(regNo);

        $.ajax({
            url: 'enroll_ajax_action.php',
            dataType: 'json',
            type: 'post',
            data: regNo,
            success: function(data) {
                //console.log(data.allCourse);
                $('#studentName').val(data.studentInfo.student_name);
                $('#studentEmail').val(data.studentInfo.student_email);
                $('#departmentInEnrollCourse').val(data.studentInfo.student_department);
                var allCourse = '<option value="">Select a Course</option>';
                for (var i = 0; i < data.allCourse.length; i++) {
                    allCourse = allCourse + '<option value="'+ data.allCourse[i].course_code +'">'+ data.allCourse[i].course_name +'</option>';
                    $('#courseNameInEnroll').html(allCourse);
                }
            }
        });
    });

    // for save result.
    $('#regNoInResult').on('click', function() {
        var regNo = $(this).serialize();
        //console.log(regNo);

        $.ajax({
            url: 'result_ajax_action.php',
            dataType: 'json',
            type: 'post',
            data: regNo,
            success: function(data) {
                //console.log(data.studentInfo);
                $('#studentNameInResult').val(data.studentInfo.student_name);
                $('#studentEmailInResult').val(data.studentInfo.student_email);
                $('#departmentInResult').val(data.studentInfo.student_department);
                $('#courseInReslut').empty();
                if (data.enrollCourse) {
                    var enrollCourse = '<option value="">Select a Course</option>';
                    for (var i = 0; i < data.enrollCourse.length; i++) {
                        enrollCourse = enrollCourse + '<option value="'+ data.enrollCourse[i].enroll_id +'">'+ data.enrollCourse[i].course_name +'</option>';
                    }
                }else{
                    var enrollCourse = '<option value="">No Course Enrolled Yet</option>';
                }
                $('#courseInReslut').html(enrollCourse);
            }
        });
    });

    // for view result.
    $('#regNoInViewResult').on('click', function() {
        var regNo = $(this).serialize();
        //console.log(regNo);

        $.ajax({
            url: 'view_result_ajax_action.php',
            dataType: 'json',
            type: 'post',
            data: regNo,
            success: function(data) {
                //console.log(data.studentInfo);
                $('#studentNameInViewResult').val(data.studentInfo.student_name);
                $('#studentEmailInViewResult').val(data.studentInfo.student_email);
                $('#departmentInViewResult').val(data.studentInfo.student_department);
                //$('#courseInViewReslut').empty();
                var result = data.result;
                //console.log(result);
                var serial = 1;
                var tableResult = '';
                if (result) {
                    for (var i = 0; i < result.length; i++) {
                        var code = result[i].enroll_course_code,
                            name = result[i].course_name,
                            grade = result[i].grade_letter;
                            if (result[i].grade_letter) {
                                grade = result[i].grade_letter;
                            }else{
                                grade = 'Not Graded Yet';
                            }
                        tableResult = tableResult + '<tr><td>'+serial+'</td><td>'+code+'</td><td>'+name+'</td><td>'+grade+'</td></tr>';
                        serial++;
                    }
                }else{
                    tableResult = '<tr><td>'+0+'</td><td>No Course</td><td>enrolled</td><td>yet</td></tr>';
                }
                $('#viewResult').html(tableResult);
            }
        });
    });

    // for unassign courses.........
    $('#unCorse').on('submit', function () {
        var that = $('#unassignCourse'),
            contents = that.val();
        //console.log(contents);
        $('#dialog_unassign').dialog();
        $('#yes').on('click', function () {
            $('#dialog_unassign').dialog("close");
            $.ajax({
                url: 'unassign_course_ajax_action.php',
                dataType: 'json',
                type: 'post',
                data: {'unassignButton': contents},
                success: function (data) {
                    if (data){
                        alert("All courses are unassigned !");
                    }else {
                        console.log("Something going wrong !");
                    }
                }
            });
        });
        $('#no').on('click', function () {
            $('#dialog_unassign').dialog("close");
            console.log("No action");
        });

        return false;
    });

    // for unallocate Rooms.........
    $('#unRooms').on('submit', function () {
        var that = $('#unallocateRooms'),
            contents = that.val();
        console.log(contents);
        $('#dialog_unallocate').dialog();
        $('#yes').on('click', function () {
            $('#dialog_unallocate').dialog("close");
            $.ajax({
                url: 'unallocate_room_ajax_action.php',
                dataType: 'json',
                type: 'post',
                data: {'unallocateButton': contents},
                success: function (data) {
                    if (data){
                        alert("Successfully unallocated !")
                    }
                }
            });
        });
        $('#no').on('click', function () {
            $('#dialog_unallocate').dialog("close");
            console.log("No action");
        });

        return false;
    });// for unallocate Rooms.........

    // for students list......
    $('#departmentInStudentList').on('click', function () {
        var content = $(this).serialize();
        //console.log(content);
        $.ajax({
            url: 'student_list_ajax_action.php',
            dataType: 'json',
            type: 'post',
            data: content,
            success: function (data) {
                //console.log(data);
                var serial = 1;
                var studentList = '';
                for (var i = 0; i < data.length; i++){
                    var regNo = data[i].registration_no,
                        name = data[i].student_name,
                        email = data[i].student_email,
                        department = data[i].student_department;
                    studentList = studentList + '<tr><td>'+ serial +'</td><td>'+ regNo +'</td><td>'+ name +'</td><td>'+ email +'</td><td>'+ department +'</td></tr>';
                    serial++;
                }
                $('#studentList').html(studentList);
            }
        });
    });

    // for teachers list......
    $('#departmentInTeacherList').on('click', function () {
        var content = $(this).serialize();
        //console.log(content);
        $.ajax({
            url: 'teacher_list_ajax_action.php',
            dataType: 'json',
            type: 'post',
            data: content,
            success: function (data) {
                //console.log(data);
                var serial = 1;
                var teachertList = '';
                for (var i = 0; i < data.length; i++){
                    var name = data[i].teacher_name,
                        email = data[i].teacher_email,
                        designation = data[i].designation,
                        department = data[i].teacher_department;
                    teachertList = teachertList + '<tr><td>'+ serial +'</td><td>'+ name +'</td><td>'+ email +'</td><td>'+ designation +'</td><td>'+ department +'</td></tr>';
                    serial++;
                }
                $('#teacherList').html(teachertList);
            }
        });
    });

    // for view room alocation ........
    $('#departmentInRoomAllocation').on('click', function () {
        $('#viewRoomAllocation').empty();
        var content = $(this).serialize();
        //console.log(content);
        $.ajax({
            url: 'view_room_allocation_ajax_action.php',
            dataType: 'json',
            type: 'post',
            data: content,
            success: function (data) {
                //console.log(data);
                var serial = 1;
                var allocation = '';
                for(var i = 0; i < data.allcourse.length; i++){
                    var shedule = '<td>'+ data.allocationRoom[data.allcourse[i].course_code] +'</td>';
                    if (!data.allocationRoom[data.allcourse[i].course_code]){
                        shedule = '<td>Not Scheduled Yet</td>'
                    }
                    allocation = allocation + '<tr><td>'+ serial +'</td><td>'+ data.allcourse[i].course_code +'</td><td>'+ data.allcourse[i].course_name +'</td>'+ shedule +'</tr>';
                    //shedule = '';
                    serial++;
                }

                $('#viewRoomAllocation').html(allocation);
            }
        });
    });
}); // document .ready function()


// //for remove 'X' close button from right corner of the dialog box
// $('#dialog_uniqueAssign').dialog({
//     open: function(event, ui) {
//         $(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
//     }
// });
// 
 