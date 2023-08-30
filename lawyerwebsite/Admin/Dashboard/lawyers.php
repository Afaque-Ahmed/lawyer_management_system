<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">




<?php
include 'includes/header.php';
?>
<?php
if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = $_GET['type'];
    $id = $_GET['id'];
    if ($type == 'delete') {
        $delete = "DELETE FROM `lawyer_details` WHERE `id` = $id  ";
        $pdo_statement = $pdo_con->prepare($delete);
        $pdo_statement->execute();
?>
        <!-- <script type="text/javascript">
            alert("Client has been Delete!!!");
            
        </script> -->

        <script>
            window.location.href = ("http://localhost/lawyerwebsite/Admin/Dashboard/lawyers.php")
        </script>

<?php  }
}
?>

<div class="container">
    <div class="row">
        <div style="background-color: #D7B679; border-radius: 10px;" class="col-md-12">
            <div class="pagetitle mt-2 ">
                <h1 class="text-dark">Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                        <li class="breadcrumb-item active text-dark">Lawyers</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div style="overflow-x:scroll !important;" class="row">
        <div class="card-body">
            <div class="col-md-12 mt-3 ">

                <table id="table_id" class="table table-bordered text-center " width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Statu</th>
                            <th scope="col">Id</th>
                            <th scope="col">User_Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Cnic</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Gender</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Country</th>
                            <th scope="col">Lawyer Type</th>
                            <th scope="col">Case Done</th>
                            <th scope="col">Short About</th>
                            <th scope="col">About Me</th>
                            <th scope="col">Personal Statement</th>
                            <th scope="col">Qualification</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Experience</th>
                            <th width='500px;' scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $show = "select * from lawyer_details";
                        $pdo_statement = $pdo_con->prepare($show);
                        $pdo_statement->execute();
                        $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

                        if ($pdo_statement->rowCount() > 0) {
                            $i = 1;
                            foreach ($result as $row) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['Id'] ?></td>
                                    <td><?php echo $row['User_Id'] ?></td>
                                    <td><?php echo $row['first_name'] ?></td>
                                    <td><?php echo $row['last_name'] ?></td>
                                    <td><?php echo $row['lawyer_email'] ?></td>
                                    <td><?php echo $row['cnic'] ?></td>
                                    <td><?php echo $row['mobile_number'] ?></td>
                                    <td><?php echo $row['image'] ?></td>
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['dob'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['city'] ?></td>
                                    <td><?php echo $row['country'] ?></td>
                                    <td><?php echo $row['lawyer_type'] ?></td>
                                    <td><?php echo $row['lawyer_case_done'] ?></td>
                                    <td><?php echo $row['short_about'] ?></td>
                                    <td><?php echo $row['about_me'] ?></td>
                                    <td><?php echo $row['lawyer_personal_statement'] ?></td>
                                    <td><?php echo $row['highest_qualification'] ?></td>
                                    <td><?php echo $row['specialization'] ?></td>
                                    <td><?php echo $row['experience_level'] ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button name="btn_delete" class="badge" style="background-color: #D7B679;">
                                                    <?php echo "<a class='badge badge-danger' href='?type=delete&id=" . $row['Id'] . "'>Delete</a>&nbsp;"; ?>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php  }
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



<?php include 'includes/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).css('width', '100%');
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        });
    });
</script>