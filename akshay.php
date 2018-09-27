<?php

$error='';
$name='';

function clean_text($string)
{
	$string = trim($string);
	$string = stripcslashes($string);
	$string =htmlspecialchars($string);
	return $string;

}

if(isset($_POST["submit"]))
{
	if(empty($POST["name"]))
	{
		$error .='<p><label class="text-danger">Please Enter your name</label>';

	}
	else
	{
		$name = clean_text($_POST["name"]);
		if(!preg_match("/^[a-zA-Z]*$", $name))
		{
			$error .= '<p><label class="text-danger">only letters and white spaces are allowed</label></p>';

		}
	}
	if($error=='')
	{
		$file_open= fopen("contact_data.csv","a");
		$no_rows =count(file("contact_data.csv"))
		if($no_rows > 1 )
		{
			$no_rows =($no_rows - 1) + 1 ;
			$form_data =array(
				'sr_no' => $no_rows,
				'name' =>$name	

			);	

			fputcsv($file_open, $form_data);
			$error ='<label class="text-success"> Thank you for contacting us</label>';
			$name ='';

		}
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h2 align="center">Contact Us</h2>
	<div class="col-md-6" style="margin: 0 auto;float: none;">
		<form method="post">
			<h3 align="center">contact form</h3>
			<br />
			<?php echo $error;?>
			<div class="form-group">
				<label>Enter Name</label>
				<input type="text" name="name" placeholder="enter name" class="form-control" value="<?php echo $name ?>"  />
			</div>
			<div class="form-control" align="center">
				<input type="submit" name="submit" class="btn btn-info" value="submit"/>
				

			</div>
		</form>
</body>
</html>