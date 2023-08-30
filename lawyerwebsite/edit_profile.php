<?php

include 'include/connection.php';
include 'include/header.php';
?>


<?php



if (isset($_REQUEST['btn_update'])) {
    $id = $_GET['id'];
    // Update start
    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $destination = "Images/lawyer_images/" . $image;
    move_uploaded_file($temp_name, $destination);
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $phone = $_REQUEST['phone_number'];
    $gender = $_REQUEST['gender'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $country = $_REQUEST['country'];
    $date = $_REQUEST['date'];
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    $dob = $date . "/" . $month . "/" . $year;
    $lawyer_type = $_REQUEST['lawyer_type'];
    $specialization = $_REQUEST['specialization'];
    $experience_level = $_REQUEST['experience'];
    $case_done = $_REQUEST['case_done'];
    $highest_qualification = $_REQUEST['qualification'];
    $short_about = $_REQUEST['short_about'];
    $about_me = $_REQUEST['about_you'];
    $personal_statement = $_REQUEST['personal_statement'];

    $update = "UPDATE `lawyer_details` SET `first_name`=:Update_firstname,`last_name`=:Update_lastname,`mobile_number`=:Update_phone,`image`=:Update_image,`gender`=:Update_gender,`dob`=:Update_dob,`country`=:Update_country,`city`=:Update_city,`address`=:Update_address,`lawyer_type`=:Update_lawyer_type,`lawyer_case_done`=:Update_case_done,`short_about`=:Update_short_about,`about_me`=:Update_about_me,`lawyer_personal_statement`=:Update_personal_statement,`highest_qualification`=:Update_qualification,`specialization`=:Update_specialization,`experience_level`=:Update_experince  WHERE `Id` = $id ";


    $pdo_statement = $pdo_con->prepare($update);
    $pdo_statement->bindValue(':Update_firstname', $first_name, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_lastname', $last_name, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_phone', $phone, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_image', $image, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_gender', $gender, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_dob', $dob, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_country', $country, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_city', $city, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_address', $address, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_lawyer_type', $lawyer_type, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_case_done', $case_done, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_short_about', $short_about, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_about_me', $about_me, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_personal_statement', $personal_statement, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_qualification', $highest_qualification, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_specialization', $specialization, PDO::PARAM_STR);
    $pdo_statement->bindValue(':Update_experince', $experience_level, PDO::PARAM_STR);
    $pdo_statement->execute();

?>
    <script>
        alert("Record updated successfully");
    </script>
<?php } ?>




<?php
$query = "SELECT * FROM `lawyer_details` WHERE User_Id = '" . $_SESSION['id'] . "' limit 1  ";
$pdo_statement = $pdo_con->prepare($query);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {  ?>




    <div class="container  ">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $row['Id'] ?>" name="id">
                    <!--Names-->
                    <div class="row m-3">
                        <div class="col-md-2">
                            <label>First Name</label>
                        </div>
                        <div class="col-md-4">
                            <input value="<?php echo $row['first_name'] ?>" class="form-control" type="text" name="first_name">
                        </div>
                        <div class="col-md-2">
                            <label>Last Name</label>
                        </div>
                        <div class="col-md-4">
                            <input value="<?php echo $row['last_name'] ?>" class="form-control" type="text" name="last_name">
                        </div>
                    </div>
                    <!--Image and Phone-->
                    <div class="row m-3">
                        <div class="col-md-2">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-4">
                            <input value="<?php echo $row['mobile_number'] ?>" class="form-control" type="text" name="phone_number">
                        </div>
                        <div class="col-md-2">
                            <label>Image</label>
                        </div>
                        <div class="col-md-4">
                            <input value="<?php echo $row['image'] ?>" class="form-control" type="file" name="image">
                        </div>
                    </div>
                    <!--Country and City and Address-->
                    <div class="row m-3">
                        <div class="col-md-2">
                            <label>Country</label>
                        </div>
                        <div class="col-md-10">
                            <select name="country">
                                <option selected value="Pakistan">Pakistan</option>
                            </select>
                        </div>
                        <!--City-->
                        <div class="col-md-2">
                            <label>City</label>
                        </div>
                        <div class="col-md-4">
                            <select name="city">

                                <?php
                                if ($row['city'] == "Karachi") { ?>
                                    <option selected value="Karachi">Karachi</option>
                                    <option value="Hydrabad">Hydrabad</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Sailkot">Sailkot</option>

                                <?php } elseif ($row['city'] == "Hydrabad") { ?>
                                    <option selected value="Hydrabad">Hydrabad</option>
                                    <option value="Karachi">Karachi</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Sailkot">Sailkot</option>

                                <?php } elseif ($row['city'] == "Lahore") { ?>
                                    <option selected value="Lahore">Lahore</option>
                                    <option value="Hydrabad">Hydrabad</option>
                                    <option value="Karachi">Karachi</option>
                                    <option value="Sailkot">Sailkot</option>


                                <?php } elseif ($row['city'] == "Sailkot") { ?>
                                    <option selected value="Sailkot">Sailkot</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Hydrabad">Hydrabad</option>
                                    <option value="Karachi">Karachi</option>

                                <?php }
                                ?>

                            </select>
                        </div>
                        <!--Address-->
                        <div class="col-md-2">
                            <label>Address</label>
                        </div>
                        <div class="col-md-4">
                            <input value="<?php echo $row['address'] ?>" type="text" name="address" class="form-control">
                        </div>
                    </div>
                    <!-- Date Of Birth -->
                    <div class="row m-3">
                        <div class="col-md-2">
                            <label>Date</label>
                        </div>
                        <div class="col-md-4">
                            <select name="date">
                                <option selected disabled>Choose Date</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Month</label>
                        </div>
                        <div class="col-md-4">
                            <select name="month">
                                <option selected disabled>Choose month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November ">November </option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Year</label>
                        </div>
                        <div class="col-md-10">
                            <select name="year">
                                <option selected disabled>Choose Year</option>

                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                            </select>
                        </div>
                    </div>
                    <!-- Lawyer Types and Experience and Specialization-->
                    <div class="row m-3">
                        <div class="col-md-2">
                            <label>Lawyer Type</label>
                        </div>
                        <div class="col-md-4">
                            <select name="lawyer_type">
                                <option selected disabled>Choose Type</option>
                                <option value="Family Laywer">Family Laywer</option>
                                <option value="Criminal Laywer">Criminal Laywer</option>
                                <option value="Property Laywer">Property Laywer</option>
                                <option value="Divorce Laywer">Divorce Laywer</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Specialization</label>
                        </div>
                        <div class="col-md-4">
                            <select name="specialization">
                                <option selected disabled>Choose Specialization</option>
                                <option value="Criminal Laywer">Criminal Laywer</option>
                                <option value="Family Laywer">Family Laywer</option>
                                <option value="Personal Laywer">Personal Laywer</option>
                                <option value="Property Laywer">Property Laywer</option>
                                <option value="Divorce Laywer">Divorce Laywer</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Experience</label>
                        </div>
                        <div class="col-md-10">
                            <select name="experience">
                                <option selected disabled>Choose Experience</option>
                                <option value="2 to 5 years">2 to 5 years</option>
                                <option value="5 to 10 years">5 to 10 years</option>
                                <option value="10 to 15 years">10 to 15 years</option>
                                <option value="15 to 20 years">15 to 20 years</option>
                            </select>
                        </div>
                    </div>
                    <!--Case Done and Personal statement-->
                    <div class="row m-3">
                        <div class="col-md-2">
                            <label>Case Done</label>
                        </div>
                        <div class="col-md-4">
                            <input value="<?php echo $row['lawyer_case_done'] ?>" type="text" name="case_done" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label>Personal statement</label>
                        </div>
                        <div class="col-md-4">
                            <input value="<?php echo $row['lawyer_personal_statement'] ?>" type="text" name="personal_statement" class="form-control">
                        </div>
                    </div>
                    <!--Short about and About you-->
                    <div class="row m-3">

                        <div class="col-md-2">
                            <label>Short About</label>
                        </div>
                        <div class="col-md-4">
                            <input value="<?php echo $row['short_about'] ?>" type="text" name="short_about" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label>About You</label>
                        </div>
                        <div class="col-md-4">
                            <input value="<?php echo $row['about_me'] ?>" type="text" name="about_you" class="form-control">
                        </div>
                    </div>
                    <!--Gender And Education-->
                    <div class="row m-3">
                        <div class="col-md-2">
                            <label>Education</label>
                        </div>
                        <div class="col-md-4">
                            <select name="qualification">
                                <option selected disabled>Choose Qualification</option>
                                <option value="Masters">Masters</option>
                                <option value="LLB">LLB</option>
                                <option value="LLM">LLM</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Gender</label>
                        </div>
                        <div class="col-md-4">
                            <?php
                            if ($row['gender'] == "Male") { ?>
                                <div class="form-check form-check-inline">
                                    <input checked class="form-check-input" type="radio" name="gender" value="Male">
                                    <label class="form-check-label" for="">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Female">
                                    <label class="form-check-label" for="">Female</label>
                                </div>

                            <?php } elseif ($row['gender'] == "Female") { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Male">
                                    <label class="form-check-label" for="">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input checked class="form-check-input" type="radio" name="gender" value="Female">
                                    <label class="form-check-label" for="">Female</label>
                                </div>

                            <?php }
                            ?>
                        </div>
                    </div>
                    <!--Submit Button-->
                    <div class="text-center mt-5 mb-5 ">
                        <button type="submit" name="btn_update" class="btn" style="background-color: #D7B679;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php  } ?>






<?php include 'include/footer.php' ?>