<!-- <?php // header("refresh:2")
      ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="dashboard.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>Admin</title>
</head>

<body>
  <div class="Container">
    <div class="SideNav">
      <div class="NavLogo">HMSC</div>
      <div class="NavAdminImg">
        <!-- <img
            class="nav_img"
            src="https://images.pexels.com/photos/91227/pexels-photo-91227.jpeg"
          /> -->
        <h4 class="Admin_log">Admin</h4>
      </div>
      <div class="NavButtonPatent">

        <a href="patientList.php" class="patient">Patient List</a>

        <a href="doctorList.php" class="patient">Doctor List</a>
        <a href="doctorList.php" class="patient">Appointment Detalis</a>
        <a href="doctorList.php" class="patient">Prescription List</a>

      </div>
    </div>

    <div class="Dashboard">
      <!-- <div class="Search">
        <form class="d-flex SBg" role="search">
          <input class="btn_inp form-control me-2 shadow-none" type="search" placeholder="Search" aria-label="Search" class="" />
          <button class="btn_search btn btn-outline-success" type="submit">
            Search
          </button>
        </form>
      </div> -->
      <div class="AdminInfo">
        <div class="InfoLogo">
          <!-- <img
              class="Img"
              src="https://images.pexels.com/photos/91227/pexels-photo-91227.jpeg"
            /> -->
        </div>
        <div class="InfoDes">
          <?php include_once "config.php";
          $sql = "SELECT * FROM admintb ";
          $result = mysqli_query($conn, $sql) or dir("query fiald");
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>

              <div class="Text">Welcome to Dashboard</div>
              <div class="Text_2"><?php echo strtoupper($row["username"]); ?></div>
          <?php

            }
          }

          ?>
        </div>
      </div>

      <div class="card_list">
        <div class="Card01">
          <div class="Card">
            <div class="Profile">
              <!-- <img
                  class="profile_img"
                  src="https://images.pexels.com/photos/91227/pexels-photo-91227.jpeg"
                  alt=""
                  srcset=""
                /> -->
            </div>
            <div class="Doctors">Doctors</div>
            <div class="DoctorCrud">
              <div class="Gender">
                <!-- <div class="Male">
                    <h3>25</h3>
                    <h4>Male</h4>
                  </div>
                  <div class="Male">
                    <h3>25</h3>
                    <h4>Female</h4>
                  </div> -->
              </div>
              <div class="Crud">
                <div class="crud_1">
                  <i class="bi bi-person-fill-add btn btn-success " type="submit" role="button" data-bs-toggle="modal" data-bs-target="#add"></i>
                  <i class="bi bi-pencil-square btn btn-warning " type="submit" role="button" data-bs-toggle="modal" data-bs-target="#edit"></i>
                </div>
                <div class="delete">
                  <i class="bi bi-person-dash-fill btn btn-danger " type="submit" role="button" data-bs-toggle="modal" data-bs-target="#delete"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="Card01">
          <div class="Card">
            <div class="Profile">
              <!-- <img
                  class="profile_img"
                  src="https://images.pexels.com/photos/91227/pexels-photo-91227.jpeg"
                  alt=""
                  srcset=""
                /> -->
            </div>
            <div class="Doctors">Patient</div>
            <div class="DoctorCrud">
              <div class="Gender">
                <!-- <div class="Male">
                    <h3>25</h3>
                    <h4>Male</h4>
                  </div>
                  <div class="Male">
                    <h3>25</h3>
                    <h4>Female</h4>
                  </div> -->
              </div>
              <div class="Crud">
                <div class="crud_1">
                  <i class="bi bi-person-fill-add btn btn-success " type="submit" role="button"></i>
                  <i class="bi bi-pencil-square btn btn-warning " type="submit" role="button"></i>
                </div>
                <div class="delete">
                  <i class="bi bi-person-dash-fill btn btn-danger " type="submit" role="button"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- add Doctor Modal -->
  <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <?php include_once "config.php";

          if (isset($_POST["addDoctor"])) {
            $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
            $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $userName = mysqli_real_escape_string($conn, $_POST["userName"]);
            $pass = mysqli_real_escape_string($conn, md5($_POST["pass"]));

            $sql1 = "INSERT INTO `usertable`(`userId`, `firstName`, `lastName`, `userName`, `password`, `role`, `email`) VALUES  ('$firstName','$lastName','$userName','$pass','$role','$email')";
            $result = mysqli_query($conn, $sql1);
            if ($result) {
              header("location:doctorList.php"); //it's not work 
            }
          }

          ?>
          <form class="row g-3" method="POST">
            <div class="col-md-6">
              <label for="" class="form-label">First Name</label>
              <input type="text" name="firstName" class="form-control shadow-none" />
            </div>
            <div class="col-md-6">
              <label for="" class="form-label">Last Name</label>
              <input type="text" name="lastName" class="form-control shadow-none" />
            </div>
            <div class="col-md-6">
              <label for="" class="form-label">Phone Number</label>
              <input type="phone" name="lastName" class="form-control shadow-none" />
            </div>
            <div class="col-md-6">
              <label for="" class="form-label">Gender</label>
              <div class="row d-flex">
                <div class="col-6">
                  Male
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked />
                </div>
                <div class="col-6">
                  Female
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" name="email" class="form-control shadow-none" id="inputEmail4" />
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" name="pass" class="form-control shadow-none" />
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary" name="addDoctor">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- edit Doctor Modal -->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit doctor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" method="post">
            <div class="mb-6">
              <label for="" class="form-label">ID</label>
              <input type="text" class="form-control shadow-none" />
            </div>
            <div class="col-md-6">
              <label for="" class="form-label">First Name</label>
              <input type="text" class="form-control shadow-none" />
            </div>
            <div class="col-md-6">
              <label for="" class="form-label">Last Name</label>
              <input type="text" class="form-control shadow-none" />
            </div>
            <div class="col-md-6">
              <label for="" class="form-label">Phone Number</label>
              <input type="phone" class="form-control shadow-none" />
            </div>
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control shadow-none" id="inputEmail4" />
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Old Password</label>
              <input type="password" class="form-control shadow-none" id="inputPassword4" />
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">New Password</label>
              <input type="password" class="form-control shadow-none" id="inputPassword4" />
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- delete Doctor Modal -->
  <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit doctor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" method="post">
            <div class="mb-6">
              <label for="" class="form-label">ID</label>
              <input type="text" class="form-control shadow-none" />
            </div>
            <div class="mb-6">
              <label for="" class="form-label">Phone Number</label>
              <input type="text" class="form-control shadow-none" />
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>