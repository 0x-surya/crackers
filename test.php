<?php
include('./includes/head.php');

if (!isset($_SESSION['user_id'])) {
  header("Location: ./signin.php");
}

include('./includes/db.php');
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$reg_num = $_SESSION['reg_num'];
$user_id = $_SESSION['user_id'];


if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $des = $_POST['des'];

  $date = date("Y-m-d");
  $time = date("h-i-s");

  $target_dir = "files/";

  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  $newfilename = $target_dir . $date . "_" . $time . "_" . basename($_FILES["file"]["name"]);

  $uploadOk = 1;

  $time = date("h:i:s");

  if (move_uploaded_file($_FILES["file"]["tmp_name"],  $newfilename)) {
    $qur = "INSERT INTO `report`(`user_id`, `title`, `date`, `reg_num`, `name`, `des`, `file`, `time`) VALUES ('$user_id', '$title', '$date', '$reg_num', '$name', '$des', '$newfilename', '$time')";
    $res = mysqli_query($con, $qur);

    if ($res) {
      echo "<script>alert('Uploaded Succesfully')</script>";
    }
  } else {
    echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
  }
}


?>
<!-- End Navbar -->
<div class=" shadow-lg mx-4 card-profile-bottom bg-white rounded mt-5">
  <div class="card-body p-3">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            Welcome Back! <?php echo $name ?>
          </h5>
          <p class="mb-0 font-weight-bold text-sm">
            <?php echo $role ?>
          </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">

      </div>
    </div>
  </div>
</div>
<div class="container-fluid py-4 ">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Meet Link</label>
                <?php
                $qur = "SELECT * FROM `meet_link`";
                $res = mysqli_query($con, $qur);

                $data = mysqli_fetch_assoc($res);


                ?>
                <div class="row">
                  <div class="col-md-10">
                    <input class="form-control" type="text" value="<?php echo $data['link'] ?>">
                  </div>
                  <div class="col-md-2">
                    <a href="<?php echo $data['link'] ?>" class="btn btn-primary" target="_blank">Join Meet</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <label for="example-text-input" class="form-control-label">Course Module Table</label>
              <div class="align-items-center d-flex justify-content-center">
                <div class="col-md-10 mt-1">
                  <table class="table table-striped table-bordered ">
                    <thead>
                      <th class="text-center">Week count</th>
                      <th class="text-center">Learning Module</th>
                      <th class="text-center">Task</th>
                    </thead>

                    <tbody>
                      <?php
                      $qur = "SELECT * FROM `module_table` WHERE `course_name` = '$role'";
                      $res = mysqli_query($con, $qur);


                      while ($row = mysqli_fetch_assoc($res)) {
                      ?>
                        <tr>
                          <td class="text-center"><?php echo $row['week_no'] ?></td>
                          <td class="text-center"><a href="#"><?php echo $row['topic'] ?></a></td>
                          <td class="text-center"><a href="#"><?php echo $row['task'] ?></a></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="justify-content-center align-items-center col-md-12 row mt-4">
              <label for="example-text-input" class="form-control-label">Report Submission</label>
              <div class="col-md-10 mt-3">
                <div>
                  <div class="from align-items-center justify-content-center">
                    <form method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title of the Report</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title of the report" name="title">
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">File Upload</label>
                        <input type="file" name="file" id="" class="form-control">
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Report Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="des"></textarea>
                      </div>
                      <input type="submit" value="Submit" class="btn btn-primary" name="submit">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>


    <?php
    include "./includes/footer.php";
    ?>