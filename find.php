<?php 
include('config.php');
include('variable.php');
try {
	
	if(isset($_POST['signu_submit_button'])){
		
		//Validation
		if(empty($_POST['user_first_name'])){
				$message = "Sorry! User First Name is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_last_name'])){
				$message = "Sorry! User Last Name is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_full_name'])){
				$message = "Sorry! User Full Name is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_userpass'])){
				$message = "Sorry! User Password is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_userpass_conf'])){
				$message = "Sorry! User Confirm Password is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif($_POST['user_userpass'] != $_POST['user_userpass_conf']){
				$message = "Sorry! User Password not Matched!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif($_POST['user_usertype']=="user_usertype"){
				$message = "Sorry! User Type is not Selected!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif($_POST['user_sex']=="user_sex"){
				$message = "Sorry! User Gender is not Selected!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif($_POST['user_religion']=="user_religion"){
				$message = "Sorry! User Religion is not Selected!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_dob_date'])){
				$message = "Sorry! User Date of Birth is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_phone'])){
				$message = "Sorry! User Phone Number is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_email'])){
				$message = "Sorry! User Email Address is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_address_street'])){
				$message = "Sorry! User Street Address is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif($_POST['user_address_country']=="user_address_country"){
				$message = "Sorry! User Country is not Selected!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif($_POST['user_address_division']=="user_address_division"){
				$message = "Sorry! User Division is not Selected!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif($_POST['user_address_district']=="user_address_district"){
				$message = "Sorry! User District is not Selected!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif($_POST['user_address_city']=="user_address_city"){
				$message = "Sorry! User City is not Selected!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_address_ps'])){
				$message = "Sorry! User Police Station is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_address_po'])){
				$message = "Sorry! User Post Office is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		elseif(empty($_POST['user_address_pocode'])){
				$message = "Sorry! User Post Code is Not Given!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		else{
		//Assignment
			function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
			}
			
			if(isset($_POST['user_first_name'])){
				//$user_first_name = $_POST['user_first_name'];
				$user_first_name = test_input($_POST['user_first_name']);				
			}
			if(isset($_POST['user_last_name'])){
				$user_last_name = test_input($_POST['user_last_name']);				
			}			
			if(isset($_POST['user_full_name'])){
				$user_full_name = test_input($_POST['user_full_name']);				
			}
			if(isset($_POST['user_userid'])){
				$user_userid = test_input($_POST['user_userid']);				
			}
			if(isset($_POST['user_userpass'])){
				$user_userpass = test_input($_POST['user_userpass']);
				$user_userpass = MD5($_POST['user_userpass']);
			}
			if(isset($_POST['user_userpass_conf'])){
				$user_userpass_conf = test_input($_POST['user_userpass_conf']);	
				$user_userpass_conf = md5($_POST['user_userpass_conf']);
			}
			if(isset($_POST['user_usertype'])){
				$user_usertype = test_input($_POST['user_usertype']);				
			}
			if(isset($_POST['user_sex'])){
				$user_sex = test_input($_POST['user_sex']);	
				
				if($user_sex=="Male"){$user_picture = "icon_male.jpg";}
				elseif($user_sex=="Female"){$user_picture = "icon_female.jpg";}
				else{$user_picture = "noImage.jpg";}
			}
			if(isset($_POST['user_religion'])){
				$user_religion = test_input($_POST['user_religion']);				
			}
			if(isset($_POST['user_dob_date'])){
				$user_dob_date = test_input($_POST['user_dob_date']);				
				$date_month_get = SUBSTR($user_dob_date, 0, 2);
				$user_dob_year = SUBSTR($user_dob_date, 6, 4);
				
				if($date_month_get=="01"){$user_dob_month = "January"; }
				elseif($date_month_get=="02"){$user_dob_month = "February"; }
				elseif($date_month_get=="03"){$user_dob_month = "March";}
				elseif($date_month_get=="04"){$user_dob_month = "April";}
				elseif($date_month_get=="05"){$user_dob_month = "May"; }
				elseif($date_month_get=="06"){$user_dob_month = "June"; }
				elseif($date_month_get=="07"){$user_dob_month = "July"; }
				elseif($date_month_get=="08"){$user_dob_month = "August"; }
				elseif($date_month_get=="09"){$user_dob_month = "September"; }
				elseif($date_month_get=="10"){$user_dob_month = "October"; }
				elseif($date_month_get=="11"){$user_dob_month = "November";}
				elseif($date_month_get=="12"){$user_dob_month = "December"; }
				else{$user_dob_month = "N/A";}
			}
			
			if(isset($_POST['user_phone'])){
				$user_phone = test_input($_POST['user_phone']);				
			}
			if(isset($_POST['user_email'])){
				$user_email = test_input($_POST['user_email']);				
			}
			if(isset($_POST['user_address_street'])){
				$user_address_street = test_input($_POST['user_address_street']);				
			}
			if(isset($_POST['user_address_country'])){
				$user_address_country = test_input($_POST['user_address_country']);				
			}
			if(isset($_POST['user_address_division'])){
				$user_address_division = test_input($_POST['user_address_division']);				
			}
			if(isset($_POST['user_address_district'])){
				$user_address_district = test_input($_POST['user_address_district']);				
			}
			if(isset($_POST['user_address_city'])){
				$user_address_city = test_input($_POST['user_address_city']);				
			}
			if(isset($_POST['user_address_ps'])){
				$user_address_ps = test_input($_POST['user_address_ps']);				
			}
			
			if(isset($_POST['user_address_po'])){
				$user_address_po = test_input($_POST['user_address_po']);				
			}
			if(isset($_POST['user_address_pocode'])){
				$user_address_pocode = test_input($_POST['user_address_pocode']);				
			}
			
				$user_listing_date = date("m/d/Y");
				$date_month_get = SUBSTR($user_listing_date, 0, 2);
				$user_listing_year = SUBSTR($user_listing_date, 6, 4);
				
				if($date_month_get=="01"){$user_listing_month = "January"; }
				elseif($date_month_get=="02"){$user_listing_month = "February"; }
				elseif($date_month_get=="03"){$user_listing_month = "March";}
				elseif($date_month_get=="04"){$user_listing_month = "April";}
				elseif($date_month_get=="05"){$user_listing_month = "May"; }
				elseif($date_month_get=="06"){$user_listing_month = "June"; }
				elseif($date_month_get=="07"){$user_listing_month = "July"; }
				elseif($date_month_get=="08"){$user_listing_month = "August"; }
				elseif($date_month_get=="09"){$user_listing_month = "September"; }
				elseif($date_month_get=="10"){$user_listing_month = "October"; }
				elseif($date_month_get=="11"){$user_listing_month = "November";}
				elseif($date_month_get=="12"){$user_listing_month = "December"; }
				else{$user_listing_month = "N/A";}				
				
				$user_approve_flag = "Yes";
				$user_display_flag = "Yes";
		//Save
				
				// Writing User
				$statement = $db->prepare("INSERT INTO db_user 
				(
					user_first_name,
					user_last_name,
					user_full_name,
					user_userid,
					user_userpass,
					user_userpass_conf,
					user_usertype,
					user_sex,
					user_religion,
					user_dob_date,
					user_dob_month,
					user_dob_year,
					user_phone,
					user_email,
					user_picture,
					user_listing_date,
					user_listing_month,
					user_listing_year,
					user_approve_flag,
					user_display_flag					
				) 
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");	
				$statement->execute(array(		
					$user_first_name,
					$user_last_name,
					$user_full_name,
					$user_userid,
					$user_userpass,
					$user_userpass_conf,
					$user_usertype,
					$user_sex,
					$user_religion,
					$user_dob_date,
					$user_dob_month,
					$user_dob_year,
					$user_phone,
					$user_email,
					$user_picture,
					$user_listing_date,
					$user_listing_month,
					$user_listing_year,
					$user_approve_flag,
					$user_display_flag					
				));	
				
				
				// Writing User Address
					if(isset($_POST['user_userid'])){
						$user_address_userid = test_input($_POST['user_userid']);				
					}
					$user_address_approve_flag = "Yes";
					$user_address_display_flag = "Yes";
					
				$statement = $db->prepare("INSERT INTO db_user_address 
				(
					user_address_userid,
					user_address_street,
					user_address_country,
					user_address_division,
					user_address_district,
					user_address_city,
					user_address_ps,
					user_address_po,
					user_address_pocode,
					user_address_approve_flag,
					user_address_display_flag
				) 
				VALUES (?,?,?,?,?,?,?,?,?,?,?)");	
				$statement->execute(array(		
					$user_address_userid,
					$user_address_street,
					$user_address_country,
					$user_address_division,
					$user_address_district,
					$user_address_city,
					$user_address_ps,
					$user_address_po,
					$user_address_pocode,
					$user_address_approve_flag,
					$user_address_display_flag					
				));	
		
		
		//Massage
			$message = "Thank You! User Data Saved Successfully!";
			echo "<script type='text/javascript'>alert('$message');</script>";	
		
		}
		
	}
	
	
	//Function of Find Button
	if(isset($_POST['find_submit_button'])){
		
		if($_POST['find_user_name']==""){
				$message = "Sorry! User ID not given for Find!";
				echo "<script type='text/javascript'>alert('$message');</script>";				
		}
		else{
			
			if(isset($_POST['find_user_name'])){
				$user_find = $_POST['find_user_name'];
			}
			
			$i=0;

			$statement = $db->prepare("SELECT * FROM db_user WHERE (
			(user_userid = '$user_find' OR user_email = '$user_find') AND 
			user_approve_flag ='Yes' AND user_display_flag ='Yes')");
			
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row) {									
					$user_sn = $row['user_sn'];
					$user_first_name = $row['user_first_name'];
					$user_last_name = $row['user_last_name'];
					$user_full_name = $row['user_full_name'];			

				$i++;	
				}
				
				if($user_full_name==""){
					$message = "Thank You! User Data Saved Successfully!";
					echo "<script type='text/javascript'>alert('$message');</script>";	
				}
			
			
		}
		
	}
	
	
	
	
	
	
	
}
catch(Exception $e) {
$error_message = $e->getMessage();
echo($error_message);
}
											
	
?>

<!DOCTYPE html>
<html>
<head>

	<title>LOTUS FASHION - SIGNUP NEW</title>
	<link rel="icon" href="icons/logo.png" type="image/jpg" size="16x16">
	<?php include('index_header.php'); ?>
	
	<!-- CSS File -->
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="social.css"/>
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
	
	<link rel="stylesheet" type="text/css" href="css/style_login.css"/>
	<link rel="stylesheet" type="text/css" href="css/style_signup.css"/>
	
	<!--DATE PICKER-->
	<link rel="stylesheet" type="text/css" href="datepicker/jquery-ui.css"/>
	<script language="javascript" type="text/javascript" src="datepicker/jquery-1.10.2.js"></script>
	<script language="javascript" type="text/javascript" src="datepicker/jquery-ui.js"></script>
	<script>				  
		 $(function() {
			$( "#datepicker1" ).datepicker();
				var dateFormat = require('datepicker1');					
				dateFormat(datepicker1, "d/m/yyyy");					
			});
	</script>
	<!--DATE PICKER END-->
	
	
	<!--JS -->
    <script language="javascript" type="text/javascript" src="js/signup_js_validation.js"></script>
	<script language="javascript" type="text/javascript" src="js/signup_js_refresh.js"></script>
	
	
</head>
<body>
<center>
<form name="signup_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
	<div id="responsive_signup">
		
		<div class="div_head">
			<?php include("index_logo_header.php"); ?>
		</div>
		<div id="responsive_header_signup">
			<div id="responsive_header_top">
				<!--img class="mylogo" style="margin-left:45%;" src="pictures/logo.png" alt="logo" title="Lotus Fashion House"/-->
			</div>
			<div id="responsive_header_bottom">
				<!--img class="mybaner_text" src="pictures/lotus_write.png" alt="lotus" title="Lotus" style="height:100%; width:40%; float:middle;"/-->
			</div>
		</div>
		
		<!--div id="responsive_header_signup_menu">
			<?php //include('product_menu.php'); ?>
		</div-->
		
		<div id="responsive_body_signup">		
			
			<div class="signup_div">
				<div class="signup_div_top">
					
					
					
					<div class="signup_div_top_left">Find User Name</div>
					<div class="signup_div_top_mid">
						<input type="text" name="find_user_name" class="user_find_field" style="color:#000000;"
						placeholder="User Name to Find" title="User Name to Find" 
						value="<?php echo (isset($_POST['find_user_name'])?$_POST['find_user_name']:''); ?>"/>
					</div>
					<div class="signup_div_top_right">
						
						<button name="find_submit_button" value="submit" title="Click to Find User Information" 
						class="login_button" type="submit" onclick="return signup_find();">
							<img src="icons/search_1.png" class="button_picture"/> Find
						</button>
						
						<button name="find_reset_button" title="Click to Reset" class="login_button" type="reset">
							<img src="icons/cancel_red.png" class="button_picture"/> Reset
						</button>						
					</div>
					
					
					
				</div>
				<div class="login_div_middle_signup">					
					<div class="login_div_middle_textbox_signup">
						
						<table class="signup_table" border="0">
							<tr class="signup_tr">
								<td class="rd_header" colspan="5">User Information</td>								
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">1.</td>
								<td class="signup_name">First Name</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_first_name" class="use_r_text" placeholder="First Name" title="User First Name" value="<?php if($user_first_name!=""){echo($user_first_name);} echo (isset($_POST['user_first_name'])?$_POST['user_first_name']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">2.</td>
								<td class="signup_name">Last Name</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_last_name" class="use_r_text" placeholder="Last Name" title="User Last Name" value="<?php if($user_last_name!=""){echo($user_last_name);} echo (isset($_POST['user_last_name'])?$_POST['user_last_name']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">3.</td>
								<td class="signup_name">Full Name</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_full_name" class="use_r_text" placeholder="Full Name" title="User Full Name" value="<?php if($user_full_name!=""){echo($user_full_name);} echo (isset($_POST['user_full_name'])?$_POST['user_full_name']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">4.</td>
								<td class="signup_name">User ID</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_userid" class="use_r_text" placeholder="User ID" title="User ID" value="<?php echo (isset($_POST['user_userid'])?$_POST['user_userid']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							
							<tr class="signup_tr">
								<td class="signup_sn">5.</td>
								<td class="signup_name">User Password</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="password" name="user_userpass" class="use_r_text" placeholder="User Password" title="User Password" value="<?php echo (isset($_POST['user_userpass'])?$_POST['user_userpass']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">6.</td>
								<td class="signup_name">Confirm Password</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="password" name="user_userpass_conf" class="use_r_text" placeholder="Confirm Password" title="Confirm Password" value="<?php echo (isset($_POST['user_userpass_conf'])?$_POST['user_userpass_conf']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">7.</td>
								<td class="signup_name">User Type</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">								
									<!-- ======= User Type =======! -->
										<?php									
																					
											echo('<select name="user_usertype" id="id_user_usertype" class="use_drop" title="User Type" onchange="refresh_user_usertype()">');
											echo('<option value="user_usertype" selected="selected">User Type</option>');
											
											if(isset($_POST['user_usertype'])){
												$user_usertype = $_POST['user_usertype'];											
											}											
											$i=0;												
											$statement = $db->prepare("SELECT distinct setting_user_type_data FROM setting_user_type WHERE (setting_user_type_display_flag='Yes') ORDER BY setting_user_type_sn ASC");
											$statement->execute();												
											$result = $statement->fetchAll(PDO::FETCH_ASSOC);												
												foreach($result as $row) {																									
												echo "<option value='" . $row['setting_user_type_data'] ."'>" . $row['setting_user_type_data'] ."</option>";												
												$i++;
												}			
												
												if(isset($_POST['user_usertype'])){
												$user_usertype = $_POST['user_usertype'];												
												}
												
												if(!empty($user_usertype)){
													foreach($result as $row){																   
														if($row['setting_user_type_data'] == $user_usertype){																	
															$isSelected = 'selected="selected"'; 
															echo "<option value='".$user_usertype."'".$isSelected.">".$user_usertype."</option>";
															break;
														}
													}
												}else {
													$isSelected = '';
													if($user_usertype!=""){echo('<option value="user_usertype" selected="selected">User Type</option>');}
												}
																				  
												echo('</select>');
										?>									
																		
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">8.</td>
								<td class="signup_name">Gender (M/F)</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<!-- ======= User Gender =======! -->
										<?php									
																					
											echo('<select name="user_sex" id="id_user_sex" class="use_drop" title="Please Select Gender" onchange="refresh_user_sex()">');
											echo('<option value="user_sex" selected="selected">Please Select Gender</option>');
											
											if(isset($_POST['user_sex'])){
												$user_sex = $_POST['user_sex'];											
											}
											
											$i=0;												
											$statement = $db->prepare("SELECT distinct setting_sex_group_data FROM setting_sex_group WHERE (setting_sex_group_display_flag='Yes') ORDER BY setting_sex_group_sn ASC");
											$statement->execute();												
											$result = $statement->fetchAll(PDO::FETCH_ASSOC);												
												foreach($result as $row) {																									
												echo "<option value='" . $row['setting_sex_group_data'] ."'>" . $row['setting_sex_group_data'] ."</option>";												
												$i++;
												}			
												
												if(isset($_POST['user_sex'])){
												$user_sex = $_POST['user_sex'];												
												}
												
												if(!empty($user_sex)){
													foreach($result as $row){																   
														if($row['setting_sex_group_data'] == $user_sex){																	
															$isSelected = 'selected="selected"'; 
															echo "<option value='".$user_sex."'".$isSelected.">".$user_sex."</option>";
															break;
														}
													}
												}else {
													$isSelected = '';
													if($user_sex!=""){echo('<option value="user_sex" selected="selected">Please Select Gender</option>');}
												}
																				  
												echo('</select>');
										?>			
									
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">9.</td>
								<td class="signup_name">Religion</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">									
									<!-- ======= User Gender =======! -->
										<?php									
																					
											echo('<select name="user_religion" id="id_user_religion" class="use_drop" title="Please select Religion" onchange="refresh_user_religion()">');
											echo('<option value="user_religion" selected="selected">Please select Religion</option>');
											
											if(isset($_POST['user_religion'])){
												$user_religion = $_POST['user_religion'];											
											}
											
											$i=0;												
											$statement = $db->prepare("SELECT distinct setting_religion_data FROM  setting_religion WHERE (setting_religion_display_flag='Yes') ORDER BY setting_religion_sn ASC");
											$statement->execute();												
											$result = $statement->fetchAll(PDO::FETCH_ASSOC);												
												foreach($result as $row) {																									
												echo "<option value='" . $row['setting_religion_data'] ."'>" . $row['setting_religion_data'] ."</option>";												
												$i++;
												}			
												
												if(isset($_POST['user_religion'])){
												$user_religion = $_POST['user_religion'];												
												}
												
												if(!empty($user_religion)){
													foreach($result as $row){																   
														if($row['setting_religion_data'] == $user_religion){																	
															$isSelected = 'selected="selected"'; 
															echo "<option value='".$user_religion."'".$isSelected.">".$user_religion."</option>";
															break;
														}
													}
												}else {
													$isSelected = '';
													if($user_religion!=""){echo('<option value="user_religion" selected="selected">Please select Religion</option>');}
												}
																				  
												echo('</select>');
										?>		
									
									
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							
							
							<tr class="signup_tr">
								<td class="signup_sn">10.</td>
								<td class="signup_name">Date of Birth</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_dob_date" class="use_r_text" id="datepicker1" placeholder="Date of Birth" title="Date of Birth" value="<?php echo (isset($_POST['user_dob_date'])?$_POST['user_dob_date']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">11.</td>
								<td class="signup_name">Phone Number</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_phone" class="use_r_text" placeholder="Phone Number" title="Phone Number" value="<?php echo (isset($_POST['user_phone'])?$_POST['user_phone']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">12.</td>
								<td class="signup_name">Email Address</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_email" class="use_r_text" placeholder="Email Address" title="Email Address" value="<?php echo (isset($_POST['user_email'])?$_POST['user_email']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
						</table>
						
						<table class="signup_table" border="1">
							<tr class="signup_tr">
								<td class="rd_header" colspan="5">Address Information</td>								
							</tr>
							<tr class="signup_tr">
								<td class="signup_sn">1.</td>
								<td class="signup_name">Street/Village</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_address_street" class="use_r_text" placeholder="Street/Village" title="Street/Village" value="<?php echo (isset($_POST['user_address_street'])?$_POST['user_address_street']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">2.</td>
								<td class="signup_name">Country Name</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<!-- ======= User Country =======! -->
										<?php									
																					
											echo('<select name="user_address_country" id="id_user_address_country" class="use_drop" title="Please select Country" onchange="refresh_user_address_country()">');
											echo('<option value="user_address_country" selected="selected">Please select Country</option>');
											
											if(isset($_POST['user_address_country'])){
												$user_address_country = $_POST['user_address_country'];											
											}
											
											$i=0;												
											$statement = $db->prepare("SELECT distinct country_name FROM  setting_country_db WHERE (country_flag='Yes') ORDER BY id ASC");
											$statement->execute();												
											$result = $statement->fetchAll(PDO::FETCH_ASSOC);												
												foreach($result as $row) {																									
												echo "<option value='" . $row['country_name'] ."'>" . $row['country_name'] ."</option>";												
												$i++;
												}			
												
												if(isset($_POST['user_address_country'])){
												$user_address_country = $_POST['user_address_country'];												
												}
												
												if(!empty($user_address_country)){
													foreach($result as $row){																   
														if($row['country_name'] == $user_address_country){																	
															$isSelected = 'selected="selected"'; 
															echo "<option value='".$user_address_country."'".$isSelected.">".$user_address_country."</option>";
															break;
														}
													}
												}else {
													$isSelected = '';
													if($user_address_country!=""){echo('<option value="user_address_country" selected="selected">Please select Country</option>');}
												}
																				  
												echo('</select>');
										?>		
										
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">3.</td>
								<td class="signup_name">Division</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<!-- ======= User Division =======! -->
										<?php									
											
											if(isset($_POST['user_address_country'])){
												$user_address_country = $_POST['user_address_country'];												
											}
												
											echo('<select name="user_address_division" id="id_user_address_division" class="use_drop" title="Please select Division" onchange="refresh_user_address_division()">');
											echo('<option value="user_address_division" selected="selected">Please select Division</option>');
											
											if(isset($_POST['user_address_division'])){
												$user_address_division = $_POST['user_address_division'];											
											}
											
											$i=0;												
											$statement = $db->prepare("SELECT distinct country_division FROM  setting_country_db WHERE (country_name='$user_address_country' AND country_flag='Yes') ORDER BY id ASC");
											$statement->execute();												
											$result = $statement->fetchAll(PDO::FETCH_ASSOC);												
												foreach($result as $row) {																									
												echo "<option value='" . $row['country_division'] ."'>" . $row['country_division'] ."</option>";												
												$i++;
												}			
												
												if(isset($_POST['user_address_division'])){
												$user_address_division = $_POST['user_address_division'];												
												}
												
												if(!empty($user_address_division)){
													foreach($result as $row){																   
														if($row['country_division'] == $user_address_division){																	
															$isSelected = 'selected="selected"'; 
															echo "<option value='".$user_address_division."'".$isSelected.">".$user_address_division."</option>";
															break;
														}
													}
												}else {
													$isSelected = '';
													if($user_address_division!=""){echo('<option value="user_address_division" selected="selected">Please select Division</option>');}
												}
																				  
												echo('</select>');
										?>		
										
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">4.</td>
								<td class="signup_name">District</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">									
									<!-- ======= User District =======! -->
										<?php									
											
											if(isset($_POST['user_address_country'])){
												$user_address_country = $_POST['user_address_country'];												
											}												
											if(isset($_POST['user_address_division'])){
												$user_address_division = $_POST['user_address_division'];											
											}											
											
											echo('<select name="user_address_district" id="id_user_address_district" class="use_drop" title="Please select District" onchange="refresh_user_address_district()">');
											echo('<option value="user_address_district" selected="selected">Please select District</option>');
											
											if(isset($_POST['user_address_district'])){
												$user_address_district = $_POST['user_address_district'];											
											}
											
											$i=0;												
											$statement = $db->prepare("SELECT distinct country_district FROM  setting_country_db WHERE (country_name='$user_address_country' AND country_division='$user_address_division' AND country_flag='Yes') ORDER BY id ASC");
											$statement->execute();												
											$result = $statement->fetchAll(PDO::FETCH_ASSOC);												
												foreach($result as $row) {																									
												echo "<option value='" . $row['country_district'] ."'>" . $row['country_district'] ."</option>";												
												$i++;
												}			
												
												if(isset($_POST['user_address_district'])){
												$user_address_district = $_POST['user_address_district'];												
												}
												
												if(!empty($user_address_district)){
													foreach($result as $row){																   
														if($row['country_district'] == $user_address_district){																	
															$isSelected = 'selected="selected"'; 
															echo "<option value='".$user_address_district."'".$isSelected.">".$user_address_district."</option>";
															break;
														}
													}
												}else {
													$isSelected = '';
													if($user_address_district!=""){echo('<option value="user_address_district" selected="selected">Please select District</option>');}
												}
																				  
												echo('</select>');
										?>		
										
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">5.</td>
								<td class="signup_name">City</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">							
									
									<!-- ======= User City =======! -->
										<?php									
											
										
											if(isset($_POST['user_address_country'])){
												$user_address_country = $_POST['user_address_country'];												
											}												
											if(isset($_POST['user_address_division'])){
												$user_address_division = $_POST['user_address_division'];											
											}											
											if(isset($_POST['user_address_district'])){
												$user_address_district = $_POST['user_address_district'];												
											}											
											echo('<select name="user_address_city" id="id_user_address_city" class="use_drop" title="Please select City" onchange="refresh_user_address_city()">');
											echo('<option value="user_address_city" selected="selected">Please select City</option>');
											
											if(isset($_POST['user_address_city'])){
												$user_address_city = $_POST['user_address_city'];											
											}
											
											$i=0;												
											$statement = $db->prepare("SELECT distinct country_subdistrict FROM  setting_country_db WHERE (country_name='$user_address_country' AND country_division='$user_address_division' AND country_district='$user_address_district' AND country_flag='Yes') ORDER BY id ASC");
											$statement->execute();												
											$result = $statement->fetchAll(PDO::FETCH_ASSOC);												
												foreach($result as $row) {																									
												echo "<option value='" . $row['country_subdistrict'] ."'>" . $row['country_subdistrict'] ."</option>";												
												$i++;
												}			
												
												if(isset($_POST['user_address_city'])){
												$user_address_city = $_POST['user_address_city'];												
												}
												
												if(!empty($user_address_city)){
													foreach($result as $row){																   
														if($row['country_subdistrict'] == $user_address_city){																	
															$isSelected = 'selected="selected"'; 
															echo "<option value='".$user_address_city."'".$isSelected.">".$user_address_city."</option>";
															break;
														}
													}
												}else {
													$isSelected = '';
													if($user_address_city!=""){echo('<option value="user_address_city" selected="selected">Please select City</option>');}
												}
																				  
												echo('</select>');
										?>		
										
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">6.</td>
								<td class="signup_name">Police Station</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_address_ps" class="use_r_text" placeholder="Police Station" title="Police Station" value="<?php echo (isset($_POST['user_address_ps'])?$_POST['user_address_ps']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">7.</td>
								<td class="signup_name">Post Office</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_address_po" class="use_r_text" placeholder="Post Office" title="Post Office" value="<?php echo (isset($_POST['user_address_po'])?$_POST['user_address_po']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
							<tr class="signup_tr">
								<td class="signup_sn">8.</td>
								<td class="signup_name">Post Code</td>
								<td class="signup_semi">:</td>
								<td class="signup_txtfield">
									<input type="text" name="user_address_pocode" class="use_r_text" placeholder="Post Code" title="Post Code" value="<?php echo (isset($_POST['user_address_pocode'])?$_POST['user_address_pocode']:''); ?>"/>
								</td>
								<td class="signup_msg_dis"></td>
							</tr>
							
						</table>
						
					</div>
					<div class="login_div_middle_textbox_massage_signup" id="error_massage">
						<?php echo($error_massage); ?>
					</div>
					
				</div>
				<div class="login_div_bottom_signup">
					
						<button name="signu_submit_button" value="submit" title="Click to Save Information" class="login_button" type="submit" onclick="return signup_validation();">
							<img src="icons/ok.png" class="button_picture"/> Save
						</button>
						
						<button name="reset_button" title="Click to Reset" class="login_button" type="reset">
							<img src="icons/cancel_red.png" class="button_picture"/> Reset
						</button>
						
						<button name="submit_button_forgot" title="Click if You Forgot Password" class="login_button"  type="submit" onclick="">
							<img src="icons/my_login_1.png" class="button_picture"/> Home
						</button>
				</div>
			</div>	
			
		</div>
		<div id="responsive_footer_login">
			<h6>Copy Right &copy Md. Abdullah Al Kamal (Lecturer/Trainer, LICT)<br/>
			<a href="mailto:md.abdullahalkamal@gmail.com">Email: md.abdullahalkamal@gmail.com</a></h6>
		
		</div>
	</div>
</form>
</center>
</body>
</html>