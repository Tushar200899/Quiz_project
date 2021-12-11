<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/normalize.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>add-university</title>
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
            <li><a href="#"><span>Dashboard</span></a></li>
            <li><a href="adduniversity.php"><span>Add University</span></a></li>
            <li><a href="addclass.php"><span>Add Class</span></a></li>
            <li><a href="addteacher.php" class="active"><span>Add Teacher</span></a></li>
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
                  <h4><?php echo $_SESSION['name']?></h4>
                  <small>Admin</small>
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
                    ADD UNIVERSITY
                  </h4>
                </div>
                <div class="container" style="display:contents;">
                  <form action="" autocomplete="off">
                    <div class="form-group">
                      <label for="teacher">Add Teacher:</label>
                      <input type="text" class="form-control" placeholder="Enter name" id="tname" />
                    </div>
                    <div class="form-group">
                      <label for="email">email:</label>
                      <input type="text" class="form-control" placeholder="Enter email" id="email" />
                    </div>
                    <div class="form-group">
                      <label for="class">University</label>
                      <div class="contain-input">
                        <div class="list" id="list" style="width: 100%; float: left"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="class">class</label>
                      <div class="contain-input">
                        <div class="listclass" id="listclass" style="width: 100%; float: left"></div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="addteacher();">
                      Submit
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-sm-2"></div>
          </div>
          <div class="col-sm-12" style="display:inline-block;">
            <div class="container-fluid">
              <div class="getdisteacher table-responsive" id="getdisteacher"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    getuni();
    function getuni() {
      var token = '<?php echo password_hash("getuni",PASSWORD_DEFAULT);?>';

      $.ajax({
        type: "post",
        url: "ajax/cgetuni.php",
        data: { token: token },
        success: function (data) {
          $("#list").html(data);
        },
      });
    }
  </script>
  <script type="text/javascript">
    // getcls();
    function getcls() {
      var token = '<?php echo password_hash("getcls",PASSWORD_DEFAULT);?>';
      var uid = document.getElementById('university').value;
      $.ajax({
        type: "post",
        url: "ajax/getcls.php",
        data: { token: token, uid: uid },
        success: function (data) {
          $("#listclass").html(data);
        },
      });
    }
  </script>
  <script type="text/javascript">
    function addteacher() {
      var name = document.getElementById('tname').value;
      var email = document.getElementById('email').value;
      var uid = document.getElementById('university').value;
      var classid = document.getElementById('class').value;
      var token = "<?php echo password_hash("teacher",PASSWORD_DEFAULT);?>"

      $.ajax(
        {
          type: 'post',
          url: "ajax/addt.php",
          data: { name: name, email: email, uid: uid, classid: classid, token: token },
          success: function (data) {
            alert(data);
            window.location.reload();
          }
        });
    }
    displayteacher();
    function displayteacher() {
      var token = '<?php echo password_hash("displayteacher",PASSWORD_DEFAULT);?>';

      $.ajax(
        {
          type: 'post',
          url: "ajax/displayteacher.php",
          data: { token: token },
          success: function (data) {
            // alert(data);
            $('#getdisteacher').html(data);
          }
        });


    }
    function deleted(i){
      alert(i);
      var token= '<?php echo password_hash("deleteteacher",PASSWORD_DEFAULT);?>';
      $.ajax(
        {
          type: 'post',
          url: "ajax/delete.php",
          data:{i:i, token: token},
          success: function (data) {
            if(data == 0){
              alert("Teacher Deleted Successfully");
              window.location.reload();                
            }
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