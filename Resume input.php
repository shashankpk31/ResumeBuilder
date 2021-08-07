
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
  <link rel="stylesheet" href="./ResumeBuilder.css">
  <link rel="icon" href="./Asset/Logo.png" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
  <div class="content">
    <div class="head">
      <h1>Resume Building Form</h1>
    </div>
    <div class="container">
      <fieldset>
        <legend>Fill The Form To create </legend>
        <form method="POST" enctype="multipart/form-data">
          <label for="name">Name</label>
          <input type="text" name="Username" value="" placeholder="Username here" />
          <label for="Image" id="">Image</label>
          <input type="file" value="" name="Image" placeholder="User's Image here" />
          <label for="Experience" id="">Experience Details</label>
          <input type="Text" value="" name="Exp1" placeholder="Experience1 here" />
          <input type="Text" value="" name="Exp2" placeholder="Experience2 here" />
          <input type="Text" value="" name="Exp3" placeholder="Experience3 here" />
          <label for="Project" id="">Project Details</label>
          <input type="Text" value="" name="Proj1" placeholder="Project1 here" />
          <input type="Text" value="" name="Proj2" placeholder="Project2 here" />
          <label for="Educational" id="">Educational Details</label>
          <input type="Text" value="" name="Edu1" placeholder="College Educational details" />
          <input type="Text" value="" name="Edu2" placeholder="Intermediate Educational details" />
          <input type="Text" value="" name="Edu3" placeholder="high School Educational details" />
          <label for="Contact" id="">Contact Details</label>
          <input type="Text" value="" name="con1" placeholder="Location here" />
          <input type="Text" value="" name="con2" placeholder="Email here" />
          <input type="number" name="con3" placeholder="Phone here" />
          <input type="Text" value="" name="con4" placeholder="GitHub here" />
          <label for="Skill" id="">Skills & Summary</label>
          <input type="Text" value="" name="skill1" placeholder="skill1 here" />
          <input type="Text" value="" name="skill2" placeholder="skill2 here" />
          <input type="Text" value="" name="skill3" placeholder="skill3 here" />
          <input type="Text" value="" name="skill4" placeholder="skill4 here" />
          <button type="submit" name="upload" class="btn">Upload</button>
        </form>
      </fieldset>
    </div>
  </div>
  <?php
  if (isset($_POST['upload'])) {
    $img_loc = $_FILES['Image']['tmp_name'];
    $img_name = $_FILES['Image']['name'];
    $uname = $_POST['Username'];
    $Exp = array($_POST['Exp1'], $_POST['Exp2'], $_POST['Exp3']);
    $Proj = array($_POST['Proj1'], $_POST['Proj2']);
    $Edu = array($_POST['Edu1'], $_POST['Edu2'], $_POST['Edu3']);
    $con = array($_POST['con1'], $_POST['con2'], $_POST['con3'], $_POST['con4']);
    $skill = array($_POST['skill1'], $_POST['skill2'], $_POST['skill3'], $_POST['skill4']);
    $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_des = "Image/" . $uname . "." . $img_ext;
    if (($img_ext != 'jpg') && ($img_ext != 'png') && ($img_ext != 'jpeg')) {
      echo "<script>alert('UnSucessFull bcoz invalid image');</script>";
      exit();
    }

    $query = "INSERT INTO `resume_inputdata`( `Name`, `Image`, `Exp1`, `Exp2`, `Exp3`, `Proj1`, 
    `Proj2`, `ColEdu`, `IntEdu`, `HighEdu`, `Loc`, `Email`, `Phone`, `GitHub`, `Skill1`, `Skill2`,
    `Skill3`, `Skill4`) VALUES ('$uname','$img_des','$Exp[0]','$Exp[1]','$Exp[2]',
    '$Proj[0]', '$Proj[1]','$Edu[0]','$Edu[1]','$Edu[2]','$con[0]','$con[1]','$con[2]','$con[3]','$skill[0]',
    '$skill[1]','$skill[2]','$skill[3]')";

    if (mysqli_query($conn, $query)) {
      echo "<script>alert('SucessFull');</script>";
      move_uploaded_file($img_loc, $img_des);
    } else {
      echo "<script>alert('UnSucessFull');</script>";
    }
    header("Location: http://localhost/ResumeBuilder/Viewresume.php");
  }
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>