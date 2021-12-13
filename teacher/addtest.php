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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>add-test</title>
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
            <li><a href="addtest.php"class="active"><span>Add Test</span></a></li>
            <li><a href="addquestion.php" ><span>Add Question</span></a></li>
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
                                <form action="" autocomplete="off">
                  <div class="form-group">
                    <label for="student">Add Test</label>
                    <input type="text" class="form-control" placeholder="Add test" id="test" />
                  </div>
                  <div class="form-group">
                      <label for="class">Choose University</label>
                      <div class="contain-input">
                        <div class="list" id="list" style="width: 100%; float: left"></div>
                      </div>
                    </div>
                    <div class="form-group">
                <label for="class">Choose Class</label>
                <div class="contain-input">
                  <div class="listclass" id="listclass" style="width: 100%; float: left"></div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" style="margin-top: 10px" onclick="addtest();">
                Submit
              </button>
              </div>
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
        url: "ajax/cgetuni.php",
        data: { token: token },
        success: function (data) {
          $("#list").html(data);
        },
      });
    }

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

    function addtest() {
        var name = document.getElementById('test').value ;
        var uid = document.getElementById('university').value ;
        var classid = document.getElementById('class').value;
        var token='<?php echo password_hash("test",PASSWORD_DEFAULT);?>';
        if(name!=""){
            $.ajax(
				{
					type:'post',
					url:"ajax/addtest.php",
					data:{name:name,uid:uid,classid:classid,token:token},
					success:function(data)
					{
						if(data ==0){
              // alert('test added successfully');
              alert (data);

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
  $("form").submit(function (e) {
    e.preventDefault();
  });
</script>