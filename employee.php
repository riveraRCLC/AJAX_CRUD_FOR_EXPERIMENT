<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>PHP Ajax CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
</head>

<body>


    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="bg-light p-2 m-2">
                        <h5 class="text-dark text-center">PHP Ajax CRUD operation</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Ticket</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i><span>Add Ticket</span></a>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Subject</th>
                            <th>Your Acct</th>
                            <th>To:</th>
                            <th>Body Of The Letter</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="employee_data">
                    </tbody>
                </table>

                <p class="loading">Loading Data</p>


            </div>
        </div>
    </div>

    
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>MyAcct</label>
                        <input type="email" id="email_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea class="form-control" id="address_input" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>To:</label>
                        <input type="text" id="phone_input" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" onclick="addEmployee()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_employee">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>MyAcct</label>
                        <input type="email" id="email_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea class="form-control" id="address_input" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>To:</label>
                        <input type="text" id="phone_input" class="form-control" required>
                        <input type="hidden" id="employee_id" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" onclick="editEmployee()" value="Save">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_employee">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" id="name_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>MyAcct</label>
                        <input type="email" id="email_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea class="form-control" id="address_input" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>To:</label>
                        <input type="text" id="phone_input" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="deleteEmployee()" value="Delete">
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
    <script>

       //////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
       $(document).ready(function () {
            employeeList();

        });
    
        function employeeList() {
            $.ajax({
                type: 'get',
                url: "employee-list.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    console.log(response);
                    var tr = '';
                    for (var i = 0; i < response.length; i++) {
                        var tid = response[i].tid;
                        var tsub = response[i].tsub;
                        var tuserid = response[i].tuserid;
                        var ttowhomid = response[i].ttowhomid;
                        var tbody = response[i].tbody;
                        tr += '<tr>';
                        tr += '<td>' + tid + '</td>';
                        tr += '<td>' + tsub + '</td>';
                        tr += '<td>' + tuserid + '</td>';
                        tr += '<td>' + ttowhomid + '</td>';
                        tr += '<td>' + tbody + '</td>';
                        tr += '<td><div class="d-flex">';
                        tr +=
                            '<a href="#viewEmployeeModal" class="m-1 view" data-toggle="modal" onclick=viewEmployee("' +
                            tid + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
                        tr +=
                            '<a href="#editEmployeeModal" class="m-1 edit" data-toggle="modal" onclick=viewEmployee("' +
                            tid +
                            '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                        tr +=
                            '<a href="#deleteEmployeeModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                            tid +
                            '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                        tr += '</div></td>';
                        tr += '</tr>';
                    }
                    $('.loading').hide();
                    $('#employee_data').html(tr);
                }
            });
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////    

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        function addEmployee() {
            var tsub2 = $('.add_epmployee #name_input').val();
            var tuserid2 = $('.add_epmployee #email_input').val();
            var ttowhomid2 = $('.add_epmployee #phone_input').val();
            var tbody2 = $('.add_epmployee #address_input').val();

            $.ajax({
                type: 'post',
                data: {
                    tsub: tsub2,
                    tuserid: tuserid2,
                    ttowhomid: ttowhomid2,
                    tbody: tbody2,
                },
                url: "employee-add.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    $('#addEmployeeModal').modal('hide');
                    employeeList();
                    alert(response.message);
                }

            })
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        function editEmployee() {
            var tsub2 = $('.edit_employee #name_input').val();
            var tuserid = $('.edit_employee #email_input').val();
            var ttowhomid = $('.edit_employee #phone_input').val();
            var tbody = $('.edit_employee #address_input').val();
            var tid = $('.edit_employee #employee_id').val();

            $.ajax({
                type: 'post',
                data: {
                    tsub: tsub2,
                    tuserid: tuserid2,
                    ttowhomid: ttowhomid2,
                    tbody: tbody2,
                    tid: tid2,
                },
                url: "employee-edit.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    $('#editEmployeeModal').modal('hide');
                    employeeList();
                    alert(response.message);
                }

            })
        }

        function viewEmployee() {
            $.ajax({
                type: 'get',
                data: {
                    tid: tid,
                },
                url: "employee-view.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    $('.edit_employee #name_input').val(response.tsub);
                    $('.edit_employee #email_input').val(response.tuserid);
                    $('.edit_employee #phone_input').val(response.ttowhomid);
                    $('.edit_employee #address_input').val(response.tbody);
                    $('.edit_employee #employee_id').val(response.tid);
                    $('.view_employee #name_input').val(response.tsub);
                    $('.view_employee #email_input').val(response.tuserid);
                    $('.view_employee #phone_input').val(response.ttowhomid);
                    $('.view_employee #address_input').val(response.tbody);
                }
            })
        }

        function deleteEmployee() {
            var id = $('#delete_id').val();
            $('#deleteEmployeeModal').modal('hide');
            $.ajax({
                type: 'get',
                data: {
                    id: id,
                },
                url: "employee-delete.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    employeeList();
                    alert(response.message);
                }
            })
        }
    </script>

</body>

</html>