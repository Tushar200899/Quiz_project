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
                        <li><a href="#" ><span>Dashboard</span></a></li>
                        <li><a href="adduniversity.php" ><span>Add University</span></a></li>
                        <li><a href="addclass.php" class="active"><span>Add Class</span></a></li>
                        <li><a href="addteacher.php"><span>Add Teacher</span></a></li>
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
                                            <label for="class">University</label>
                                            <div class="contain-input">
                                                <div class="list" id="list" style="width: 100%; float: left"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Class:</label>
                                            <input type="text" class="form-control" placeholder="Enter class" id="cname">
                                        </div>
                                        <button type="submit" onclick="addclass();" class="btn btn-primary">Submit</button>
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
        getuni();
        function getuni() {
          var token = '<?php echo password_hash("getuni",PASSWORD_DEFAULT);?>';
  
          $.ajax({
            type: "post",
            url: "ajax/getuni.php",
            data: { token: token },
            success: function (data) {
              $("#list").html(data);
            },
          });
        }
      </script>s
      <script type="text/javascript">
      function addclass() {
          var name = document.getElementById('cname').value ;
          var uid = document.getElementById('university').value ;
          var token='<?php echo password_hash("class",PASSWORD_DEFAULT);?>';
          if(name!=""){
              $.ajax(
                  {
                      type:'post',
                      url:"ajax/addclass.php",
                      data:{name:name,uid:uid,token:token},
                      success:function(data)
                      {
                          if(data ==0){
                              alert('Class added successfully');
                          }
                          else{
                              alert(data);
                          }
                      }
                  });
          }
          
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