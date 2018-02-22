<?php
    //session_start();
    include "connection.php";
    include "header_two.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>STUDENT REGISTRATION</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
							<div class="x_title">
                                <h2>Student Registration Form</h2>
								<div class="clearfix"></div>
                            </div>
							
                            <div class="x_content">

                                <!--    <section class="login_content" style="margin-top: -40px;">  -->

                                            <form class="form-horizontal" name="form" id="myForm" action="" method="post" novalidate>
                                               
                                            
                                                <div class="form-group">
                                                    <div id="e1" class="">
													<label class="col-md-2">First Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>
													<div id="e2">
                                                    <label class="col-md-2">Last Name </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>
                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
													<div id="e3">
                                                    <label class="col-md-2">Semester </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Semester" name="sem" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>
													<div id="e4">
                                                    <label class="col-md-2"> Enrollment </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Enrollment No" name="enrollment" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>
                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
													<div id="e5">
                                                    <label class="col-md-2"> Contact No: </label>
                                                    <div class="col-md-4">
                                                        <input type="number" class="form-control" placeholder="contact" name="contact" required="" onkeypress="errorclr()"/>
                                                    </div>
													<div>

                                                    <label class="col-md-2"> Address </label>
													<div id="e6">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="address" name="address" required="" onkeypress="errorclr()"/>
                                                    </select>
                                                    </div>
													</div>
                                                </div>
                                                <!-- ############################################################ -->
                                                <div class="form-group">
                                                    <label class="col-md-2"> Email Id: </label>
													<div id="e7">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="email" name="email" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>

                                                    <label class="col-md-2"> Set USERNAME </label>
													<div id="e8">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder=" Set any Username" name="username" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
													<div id="e9">
                                                    <label class="col-md-2"> Set Password: </label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" placeholder="Set Password" name="password" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>
                                                    <label class="col-md-2"> Confirm Password </label>
													<div id="e10">
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" placeholder="Confirm Password" name="confPassword" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>
                                                </div>

                                                <!-- ############################################################ -->


                                                
                                                <div class="col-lg-12  col-lg-push-8" style="margin-top: 20px;">
                                                    <input class="btn btn-primary submit " type="submit" onclick="return validate()" name="register" value="Register">
                                                </div>

                                            </form>
                              <!--      </section>  -->


                                        <?php

                                            $added_on = date('Y-m-d');
											$uname='';
											if(isset($_POST["username"]))
											{
												
											}
$query=mysqli_query($db_connect,"SELECT * from student_registration WHERE `username`='$uname'");
$num=mysqli_num_rows($query);
                                            if(isset($_POST['register']) && $num==0){
                                                $q=mysqli_query($db_connect,"INSERT into student_registration values('','$_POST[firstname]','$_POST[lastname]','$_POST[sem]','$_POST[enrollment]','$_POST[email]','$_POST[username]','$_POST[password]','$_POST[confPassword]','$_POST[contact]','$_POST[address]','$added_on','inactive')");
												if($q)
												{
													
													?>

                                                    <div class="alert alert-success col-lg-12">
                                                        Registration successful !!!
<?php
$email = $_POST['email'];
echo" <script> window.location.href='http://www.tpkumar.com/lmsmail/sendmail.php?email=$email'</script>";
include("SignUp.php");
 ?>
 <script>
 window.location.href="SignUp.php";
 document.getElementById("myForm").reset();
 </script>
	
                                           </div> <?php
										   include("index.php");
												}
												else
												{
																									?>
                                                    <div class="alert alert-success col-lg-12">
                                                        Something Went wrong! Try again!!
                                                    </div>

                                                <?php
												}
                                                

                                               
                                            }
											else if(isset($_POST['register']) && $num>=1)
											{
												?>
                                                    <div class="alert alert-success col-lg-12">
                                                        Username Exist ! Try Another Name.
                                                    </div>

                                                <?php
											}
                                        ?>
										
										 <span id="er" class="">
                                                      
                                                    </span>

                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <!-- /page content -->


<?php
    include "footer.php";
?>


<script>
	function validate(){
		
		 uname = document.form.firstname;
		 e1 = document.getElementById("e1");
		 
		 lname=document.form.lastname;
		 e2 = document.getElementById("e2");
		 sem=document.form.sem;
		 e3 = document.getElementById("e3");
		 enrol=document.form.enrollment;
		 e4 = document.getElementById("e4");
		 contact=document.form.contact;
		 e5 = document.getElementById("e5");
		 address=document.form.address;
		 e6 = document.getElementById("e6");
		 email=document.form.email;
		 e7 = document.getElementById("e7");
		 user=document.form.username;
		 e8 = document.getElementById("e8");
		 
		 pass=document.form.password;
		 e9=document.getElementById("e9");
		 cpass=document.form.confPassword;
		 e10=document.getElementById("e10");
		 er = document.getElementById("er");
		 er.setAttribute("class","alert alert-success col-lg-12")
		 
		//alert(uname)
		if(uname.value.length<2){
			uname.setAttribute("placeholder","firstname must be more than 1 char")
			e1.setAttribute("class","has-error")
			
			er.innerHTML = "firstname must not empty";
			return false
		}
		else if(lname.value.length<2 )
		{
			lname.setAttribute("placeholder","lastname must be more than 1 char")
			e2.setAttribute("class","has-error")
			
			er.innerHTML = "lastname must not empty";
			return false
		}
		else if(sem.value.length<1)
		{
			sem.setAttribute("placeholder","semester must not empty")
			e3.setAttribute("class","has-error")
			
			er.innerHTML = "semester must not empty";
			return false
		}
		else if(enrol.value.length<1 || enrol.value.length>12)
		{
			enrol.setAttribute("placeholder","enrollment number must be 1 to 12")
			e4.setAttribute("class","has-error")
			
			er.innerHTML = "enrollment number must be 1 to 12";
			return false
		}
		else if(contact.value.length>10 || contact.value.length<10)
		{
			contact.setAttribute("placeholder","contact number must be 10 characters")
			e5.setAttribute("class","has-error")
			
			er.innerHTML = "contact number must be 10 characters";
			return false
		}
		else if(address.value.length<1)
		{
			address.setAttribute("placeholder","address must not empty")
			e6.setAttribute("class","has-error")
			
			er.innerHTML = "address must not empty";
			return false
		}
		else if(email.value.length<1)
		{
			email.setAttribute("placeholder","email must not empty")
			e7.setAttribute("class","has-error")
			
			er.innerHTML = "email must not empty";
			return false
		}
		else if(user.value.length<6 || user.value.length>12)
		{
			user.setAttribute("placeholder","username must be 6 to 12 characters")
			e8.setAttribute("class","has-error")
			
			er.innerHTML = "username must be 6 to 12 characters";
			return false
		}
		else if(pass.value.length<6 || pass.value.length>12)
		{
			pass.setAttribute("placeholder","password must be 6 to 12 characters")
			e9.setAttribute("class","has-error")
			
			er.innerHTML = "password must be 6 to 12 characters";
			return false
		}
		else if(cpass.value.length!=pass.value.length || cpass.value != pass.value )
		{
			cpass.setAttribute("placeholder","password does not matched")
			e10.setAttribute("class","has-error")
			
			er.innerHTML = "password does not matched";
			return false
		}
	}
	function errorclr(){
		e1.setAttribute("class","has-success")
		e2.setAttribute("class","has-success")
		e3.setAttribute("class","has-success")
		e4.setAttribute("class","has-success")
		e5.setAttribute("class","has-success")
		e6.setAttribute("class","has-success")
		e7.setAttribute("class","has-success")
		e8.setAttribute("class","has-success")
		e9.setAttribute("class","has-success")
		e10.setAttribute("class","has-success")
		
	}
</script>