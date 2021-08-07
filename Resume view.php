<?php
include("Connection.php");
?>
<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: Login.php");
}


?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/ResumeBuilder/Viewresume.css">
  <title>Resume Builder</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Resume Builder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/ResumeBuilder/welcome.php">Home </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost/ResumeBuilder/Resume%20input.php">ResumeBuild</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/ResumeBuilder/Resume%20view.php">Resume view</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    
    </ul>

      <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome " . $_SESSION['username'] ?></a>
          </li>
        </ul>
      </div>


    </div>
  </nav>


  <?php
  $user = $_SESSION['username'];
  $Query = "SELECT * FROM `resume_inputdata` ";
  $result = mysqli_query($conn, $Query);
  while ($row_fetch = mysqli_fetch_assoc($result)) {
    echo <<<EOT
        <div class="container">
        <div class="head">
          <img
            src="http://localhost/ResumeBuilder/$row_fetch[Image]"
            alt=""
            class="imgcode"
          />
          <div class="name"><p>$row_fetch[Name]</p></div>
        </div>
        <div class="contl" id="contl">
          <div class="contl-item" id="item-1">
            <div class="itemhead">Experience</div>
            <div class="itemcontent">
            $row_fetch[Exp1] <br />
            $row_fetch[Exp2] <br />
              2020-Present <br />
              <ul class="ul">
                <li>
                $row_fetch[Exp3]
                </li>
                <li>
                  I use Reactjs as a tool for Frontend Developent For more than
                  0.5 years
                </li>
              </ul>
            </div>
          </div>
          <div class="contl-item" id="item-2">
            <div class="itemhead">Projects</div>
            <div class="itemcontent">
              <h3>$row_fetch[Proj1]</h3>
              <ul class="ul">
                <li>
                  This is basicaly a Student Project Tracking System Created By
                  the help of MERN Stack
                </li>
                <li>https://github.com/Random</li>
              </ul>
              <h3>$row_fetch[Proj2]</h3>
              <ul class="ul">
                <li>
                  This is basicaly a Blog management System Created By the help of
                  Node & Express Stack
                </li>
                <li>https://github.com/Random</li>
              </ul>
            </div>
          </div>
          <div class="contl-item" id="item-3">
            <div class="itemhead">Education</div>
            <div class="itemcontent">
              <p>$row_fetch[ColEdu]</p>
              <p>$row_fetch[IntEdu]</p>
              <p>$row_fetch[HighEdu]</p>
              <ul class="ul">
                <li>Cummulative GPA 8.3</li>
                <li>
                  Relevent skills: Data Structure & Algo, Nodejs And React
                  ,Computer Networks,Operating System
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="contr" id="contr">
          <div class="contr-item" id="items-1">
            <div class="itemhead2">Contacts</div>
            <div class="itemcontent2">
              <ul>
                <li><i class="bx bxs-map"></i>&nbsp;$row_fetch[Loc]</li>
                <li>
                  <i class="bx bxs-envelope-open"></i>&nbsp;$row_fetch[Email]
                </li>
                <li><i class="bx bxs-phone"></i>&nbsp;$row_fetch[Phone]</li>
                <li><i class="bx bxl-github"></i>&nbsp;$row_fetch[GitHub]</li>
              </ul>
            </div>
          </div>
          <div class="contr-item" id="items-2">
            <div class="itemhead2">Skills & Summary</div>
            <div class="itemcontent2">
              <ul class="ul">
                <li>$row_fetch[Skill1]</li>
                <li>$row_fetch[Skill2]</li>
                <li>$row_fetch[Skill3]</li>
                <li>$row_fetch[Skill4]</li>
                
              </ul>
            </div>
          </div>
        </div>
      </div> 
      <hr>
      EOT;
  }

  ?>

  <hr>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>