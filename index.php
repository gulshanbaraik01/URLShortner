<?php
$con=mysqli_connect('localhost','root','','url');
if(isset($_GET)){
	foreach($_GET as $key=>$val){
		$l=mysqli_real_escape_string($con,$key);
		$l=str_replace('/','',$l);	
	
	$res=mysqli_query($con,"select link from shorturl where short_link='$l' and status='1'");
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		$link=$row['link'];
		mysqli_query($con,"update shorturl set hit_count=hit_count+1 where short_link='$l'");
		header('location:'.$link);
		die();
	}}
}
if(isset($_GET['l'])){
	
}
?>


<!DOCTYPE html>
<html language="English ">

<head>
  <title>URL Shortening</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/global.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>

    #logo {
    max-height: 36px;
    margin-right: 10px;
    margin-top: -3px;
    display: inline-block;
    }

    .navbar-inverse .navbar-nav>.active>a,
    .navbar-inverse .navbar-nav>.active>a:hover,
    .navbar-inverse .navbar-nav>.active>a:focus {
    
    border-color: transparent;
    

    }
  </style>

</head>

<body class="bg">
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:crimson;">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand navbar-link" href="index.php"><img src="logo.png" id="logo"><strong> URL Shortener
          </strong></a>
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span
            class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span
            class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav navbar-right">
          <li role="presentation"><a href="#"><strong>Home</strong></a></li>
          <li role="presentation"><a href="#"><strong>Contact Us</strong></a></li>
          <li role="presentation"><a href="#"><strong>About Us</strong></a></li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="row">
      
      <div class="col-md-2 col-sm-4 col-xs-2">
      </div>
      <div class="col-md-8 col-sm-8 col-xs-8">
        <form class="form-container" action="index.php" method="POST">
          <h1 style="text-align:center;">URL Shortener Form</h1><br>
          <div class="form-group">
            <strong> Link: </strong> <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="Enter the Link http://..." required>
          </div>
          <div class="form-group">
           <strong> Specifier: </strong>
            <input type="text" name="txt" class="form-control" id="exampleInputPassword1"
              placeholder="Specify Keyword" required>
          </div>

          <div class="form-group">
            <strong> Your Link: </strong>
             <input type="text" name="short_link" class="form-control" id="exampleInputPassword1"
               placeholder="string">
           </div>
          
          <button type="submit" name="submit" class="btn btn-" style="background-color: blueviolet;"><b>Generate Link</b></button>

          
            
        </form>
      </div>
    </div>

    <?php 
		 include('dbcon.php');
		 if(isset($_POST['submit'])){
			$link=$_POST['link'];
			$txt=$_POST['txt'];
			$short_link=$_POST['short_link'];
			
			$count=mysqli_num_rows(mysqli_query($con,"select * from shorturl where short_link='$short_link'"));
			if($count>0){
				echo "<script> alert('Short Link already exist'); </script>";
			}else{
				mysqli_query($con,"insert into shorturl(link,txt,short_link,status) values('$link','$txt','$short_link','1')");
				header('location:index.php');
				die();
			}
		 }
	?>

    <div class="row" >

      <div class="col-md-2 col-sm-4 col-xs-2">
      </div>
      <div class="col-md-8 col-sm-8 col-xs-8">

      <?php 
		 include('dbcon.php');
		 if(isset($_GET['type']) && $_GET['type']=='delete'){
			$id=mysqli_real_escape_string($con,$_GET['id']);
			mysqli_query($con,"delete from shorturl where id='$id'");
		 }
		 
		  if(isset($_GET['type']) && $_GET['type']=='status'){
			$id=mysqli_real_escape_string($con,$_GET['id']);
			$status=mysqli_real_escape_string($con,$_GET['status']);
			if($status=='active'){
				mysqli_query($con,"update shorturl set status='1' where id='$id'");
			}else{
				mysqli_query($con,"update shorturl set status='0' where id='$id'");
			}
		 }
        ?>
         
      <form class="form-container">
        <h2 style="text-align:center;">Shortened URL Details</h2><br>
       <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>S.No.</th>
            <th>Specifier</th>
            <th class="lth">Link</th>
            <th>Shortened Link</th>
            <th>Count</th>
            <th></th>
          </tr>
          <?php
			$sql=mysqli_query($con,"select * from shorturl");
			while($row=mysqli_fetch_assoc($sql)){
		  ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['txt']?></td>
                <td style="width:300px;"><a href="<?php echo $row['link']?>" target="_blank"><?php echo $row['link']?></a></td>
                <td><a href="<?php echo $row['short_link']?>"><?php echo "localhost/UrlShortner/" . $row['short_link']?></a></td>
                <td><?php echo $row['hit_count']?></td>
				<td>
					<a href="?id=<?php echo $row['id']?>&type=delete">Delete</a>
					<?php
						if($row['status']==1){
                    ?>
                    <a href="?id=<?php echo $row['id']?>&type=status&status=deactive">Active</a>
                    <?php
						}else{
                    ?>
                    <a href="?id=<?php echo $row['id']?>&type=status&status=active">Deactive</a>
                    <?php
					}
					?>
				</td>
            </tr>
            <?php } ?>

        </table>

                </div>
          </form>
      </div>



    </div>
 <br><br>

    <div class="row" style="background-color: crimson; width: auto; height: 110px; color: white;">

            <!-- Copyright -->
            <br>
            <center>
              <strong> Copyright @ 2020 URL Shortner Pvt. Ltd.
              <br>
              All rights reserved</strong>
              <br>
              <br>
              <a href="#">  <span> Privacy policy  </span> </a>&nbsp; |
              &nbsp; <a href="#">  <span> Terms of service </span> </a> </strong>&nbsp; |
              &nbsp;<a href="#">  <span>    Service Agreement  </span>   </a> &nbsp;|
              &nbsp;<a href="#">  <span>  Contact us  </span>  </a> 
              
           
            </center>
          <!-- Copyright -->




      </div>

</body>


</html>

