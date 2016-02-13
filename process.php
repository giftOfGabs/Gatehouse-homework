<?php
class insertInfo {
	public function createRecord(){
		$hostname='gateHouseMedia.db.11514922.hostedresource.com';
		$username='gateHouseMedia';
		$password='G3w31x11413!';
		$dbname='gateHouseMedia';

		$link=mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
		mysql_select_db($dbname);

		$name=addslashes($_POST['name']);
		$user_name=addslashes($_POST['userName']);
		$email=addslashes($_POST['email']);
		$color=addslashes($_POST['color']);

		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			$sqlInfo = "INSERT INTO userInfo SET userName= '$user_name', name= '$name', email= '$email'";
  			mysql_query($sqlInfo);
  			$sqlColor = "INSERT INTO color SET userName= '$user_name', color= '$color'";
  			mysql_query($sqlColor);

  			$sqlFetchInfo = "SELECT * FROM userInfo WHERE `userName`='$user_name'";
			$resultInfo = mysql_query($sqlFetchInfo);
			$n = mysql_num_rows($resultInfo);
			for ($i=0; $i<$n; $i++){
				$rowsInfo = mysql_fetch_array($resultInfo);
			}

			$sqlFetchColor = "SELECT * FROM color WHERE `userName`='$user_name'";
			$resultColor = mysql_query($sqlFetchColor);
			$k = mysql_num_rows($resultColor);
			for ($i=0; $i<$k; $i++){
				$rowsColor = mysql_fetch_array($resultColor);
			}

			$fetchuName=$rowsInfo['userName'];
			$fetchName=$rowsInfo['name'];
			$fetchEmail=$rowsInfo['email'];
			$fetchColor=$rowsColor['color'];

			require('layout/header.php');
			echo "<div class=\"container\">
			    <h2>Thanks for submitting</h2>
			    <label>Username</label>
			    <p>".$fetchuName."</p>
			    <label>Name</label>
			    <p>".$fetchName."</p>
			    <label>Email</label>
			    <p>".$fetchEmail."</p>
			    <label>Color</label>
			    <p>".$fetchColor."</p>
			  </div>";
			require('layout/footer.php');
		}else{
			require('layout/header.php');
  			echo "<div class=\"error\">
          	<h2>Please enter a valid email</h2>
        	</div>";
  			require('layout/formFields.php');
  			require('layout/footer.php');
		}
		mysql_close($link);
	}
}
$info = new insertInfo(); 
$info->createRecord();
 
?>