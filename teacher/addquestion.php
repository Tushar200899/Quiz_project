<!DOCTYPE html>
<?php
     session_start();
     if(!isset($_SESSION['id'])){
       header('location:teacherlogin');
     }
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/normalize.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>add-question</title>
</head>

<body>
  <div class="col-sm-12 padd-lr-off" style="padding: 0;">
    <div class="col-sm-3 padd-lr-off">
      <div class="sidebar">
        <div class="sidebar-brand">
          <h2><span></span>QUIZ</h2>
        </div>
        <div class="sidebar-menu">
          <ul>
            <li><a href="dashboard.php"><span>Dashboard</span></a></li>
            <li><a href="addstudent.php"><span>Add Student</span></a></li>
            <li><a href="addtest.php"><span>Add Test</span></a></li>
            <li><a href="addquestion.php" class="active"><span>Add Question</span></a></li>
            <li><a href="logout.php"><span>Logout</span></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-9 padd-lr-off">
      <div class="main-content">
        <div class="rrw">
          <div class="col-sm-12 padd-lr-off">
            <header>
              <h2>
                <label for=""><span class=""></span></label>
                Dashboard
              </h2>
              <div class="user-wrapper">
                <img src="" width="40px" height="40px" alt="">
                <div>
                  <h4>
                    <?php echo $_SESSION['name']?>
                  </h4>
                  <small>Teacher</small>
                </div>
              </div>
            </header>
          </div>
          <div class="col-sm-12">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
              <div class="main">
                <div class="title">
                  <h4>
                    ADD TEST
                  </h4>
                </div>
                <div class="container" style="display:contents;">
                  <form id="excelform" action="" autocomplete="off">
                    <div class="form-group">
                      <label for="class">Choose Test</label>
                      <select name="test" id="test" class="form-control">
                        <option value="0">SELECT TEST</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="fclass">CHOOSE FILE</label><br>
                      <input type="file" name="excel" id="excel">
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="addquestion();">
                      Submit
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-sm-2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function addquestion() {
      var excelform = document.getElementById('excelform');
      var data = new FormData(excelform);
      var token = "<?php echo password_hash("questiontoken", PASSWORD_DEFAULT); ?>"
      $.ajax({
        type: 'POST',
        url: "ajax/addfile.php",
        contentType: false,
        processData: false,
        data: data,
        success: function (data) {
          alert(data);
          if (data == 0) {
            alert('questions added successfully');
            window.location.reload();
          }
        }
      });

    }

    gettest();

    function gettest() {
      var token = "<?php echo password_hash("gettest", PASSWORD_DEFAULT); ?>"

      $.ajax({
        type: 'POST',
        url: "ajax/gettest.php",
        data: {
          token: token
        },
        success: function (data) {
          $('#test').html(data);
        }
      });
    }

  </script>
</body>

</html>
<script type="text/javascript">
  $('form').submit(function (e) {
    e.preventDefault();
  });</script>
</body>

</html>