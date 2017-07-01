<!DOCTYPE html>
<html>
<head>
        <link rel="icon" type="png" href="icon.png">
   <title>
                Filters joeydash
   </title>
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

   <center>
   <div class="alert alert-success">
   <h1 style="color:#fff"><b>Filters-Aero club CFI</b></h1>
  <strong>Step 1:-</strong> Upload <strong>csv</strong> file only.<br>
  <strong>Step 2:-</strong> Click show filter graph.<br>
  <strong>Step 3:-</strong> Switch between filters by scrolling.
</div>
<?php
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    $num=get_client_ip();
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("csv","jpeg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPG only";
      }
      if(empty($errors)==true) {
        move_uploaded_file($file_tmp,$num.".csv");
        setcookie('num', $num, time() + (86400 * 30), "/");
        echo '<div class="alert alert-info">
  <strong>Success!</strong> <br><a href="showgraph.php" class="btn btn-success">See filter graph</a>
</div>';
      }else{
         print_r($errors);
      }
      ?><ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?></li>
            <li>File size: <?php echo $_FILES['image']['size'];  ?></li>
            <li>File type: <?php echo $_FILES['image']['type'] ?></li>
         </ul><?php
   }
?>
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit" class="btn btn-primary" value="upload"/>
       </form>
       <div class="alert alert-danger">
  <strong>Csv data type</strong>  should have two rows only <strong>first row should be x-cordinate</strong> and <strong>second row should be its y-cordinate</strong>. 
</div>
  </center>
   </body>
</html>