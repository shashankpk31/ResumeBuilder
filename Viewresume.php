<?php
include("Connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>Resume</title>
    <link rel="stylesheet" href="http://localhost/ResumeBuilder/Viewresume.css">
</head>

<body>
    <?php
    $Query = 'SELECT * FROM `resume_inputdata`  ';
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
      EOT;
    }

    ?>
    <script src="./index.js"></script>
</body>

</html>