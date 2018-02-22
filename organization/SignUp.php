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
                        <h3>ORGANIZATION REGISTRATION</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Organization Registration Form</h2>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="x_content">

                                <!--    <section class="login_content" style="margin-top: -40px;">  -->

								
                                            <form class="form-horizontal" id="myForm" name="form" action="" method="post" novalidate>
                                               
                                            
                                                <div class="form-group">
													<div id="e1">
                                                    <label class="col-md-2">Organization Name: </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="e.g.: college name / academy name" name="orgName" onkeypress="errorclr()" required>
                                                    </div>
													</div>
													<div id="e2">
                                                    <label class="col-md-2">Organization Admin Name: </label>
													
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="e.g.: mark well" name="orgAdmin" onkeypress="errorclr()" required>
                                                    </div>
													</div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
													<div id="e3" >
                                                    <label class="col-md-2"> Type Of Organization: </label>
													
                                                    <div class="col-md-4">
                                                      <select class="form-control" name="orgType" onkeypress="errorclr()">
                                                        <option value="0"> -- Select any one -- </option>
                                                        <option value="school">School</option>
                                                        <option value="College">College</option>
                                                        <option value="University">University</option>
                                                        <option value="Academy">Academy</option>
                                                        <option value="IT Training Institute">IT Training Institute</option>
                                                        <option value="IT Company">IT Company</option>
                                                        <option value="Library">Library</option>
                                                      </select>
                                                    </div>
													</div>
													<div id="e4">
                                                    <label class="col-md-2"> Organization Size: </label>
													
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="orgSize" onkeypress="errorclr()" required=>
                                                    </div>
													</div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <div class="form-group">
													<div id="e5">
                                                    <label class="col-md-2"> Contact No: </label>
													
                                                    <div class="col-md-4">
                                                        <input type="number" class="form-control" name="contact" onkeypress="errorclr()"  required=""/>
                                                    </div>
													</div>
													<div id="e6">
                                                    <label class="col-md-2"> Address: </label>
													
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="address" onkeypress="errorclr()" required=""/>
                                                    </select>
                                                    </div>
													</div>

                                                </div>

                                                <!-- ############################################################ -->


                                                <div class="form-group">
													<div id="e7">
                                                    <label class="col-md-2"> Email Id: </label>
													
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="e.g.: example@email.com" name="orgEmail" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>
													<div id="e8">
                                                    <label class="col-md-2"> Website URL: </label>
													
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="url" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>

                                                </div>

                                                <!-- ############################################################ -->

                                                <strong> <hr> </strong>

                                                <div class="form-group">
													<div id="e9">
                                                    <label class="col-md-2"> Set admin Username: </label>
													
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="e.g: john0123" name="orgUsername" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>

                                                </div>



                                                <!-- ############################################################ -->




                                                <div class="form-group">
													<div id="10">
                                                    <label class="col-md-2"> Set Password: </label>
													
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" name="password" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>
													<div id="11">
                                                    <label class="col-md-2"> Confirm Password </label>
													
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control" name="confPassword" required="" onkeypress="errorclr()"/>
                                                    </div>
													</div>

                                                </div>

                                                <!-- ############################################################ -->


                                                
                                                <div class="col-lg-12  col-lg-push-8" style="margin-top: 20px;">
                                                    <input class="btn btn-primary submit " type="submit" name="register" value="Register" onclick="return validate()">
                                                </div>

                                            </form>
                              <!--      </section>  -->

                                        <?php
										$uname='';
										if(isset($_POST["orgUsername"]))
										{
											
										}
$query=mysqli_query($db_connect,"SELECT * from organization_registration WHERE `username`='$uname'");
$num=mysqli_num_rows($query);


                                            if(isset($_POST['register']) && $num==0){
                                                $added_on = date('Y/m/d');
												$q=mysqli_query($db_connect,"INSERT into organization_registration values('','$_POST[orgName]','$_POST[orgAdmin]','$_POST[orgType]','$_POST[orgSize]','$_POST[contact]','$_POST[address]','$_POST[orgEmail]','$_POST[url]','$_POST[orgUsername]','$_POST[password]','$added_on')");
												if($q)
												{
														?>

                                                    <div class="alert alert-success col-lg-12">
                                                        Registration successful !!!
														<?php
$email = $_POST['orgEmail'];
echo" <script> window.location.href='http://www.tpkumar.com/lmsmail/sendmail.php?email=$email'</script>";
include("SignUp.php");
 ?>
 <script>
 window.location.href="SignUp.php";
 document.getElementById("myForm").reset();
 </script>

                                                    </div>

                                                <?php
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
		
		 uname = document.form.orgName;
		 e1 = document.getElementById("e1");
		 
		 lname=document.form.orgAdmin;
		 e2 = document.getElementById("e2");
		 sem=document.form.orgType;
		 e3 = document.getElementById("e3");
		 enrol=document.form.orgSize;
		 e4 = document.getElementById("e4");
		 contact=document.form.contact;
		 e5 = document.getElementById("e5");
		 address=document.form.address;
		 e6 = document.getElementById("e6");
		 email=document.form.orgEmail;
		 e7 = document.getElementById("e7");
		 url=document.form.url;
		 e8 = document.getElementById("e8");
		 user=document.form.orgUsername;
		 e9 = document.getElementById("e9");
		 pass=document.form.password;
		 e10=document.getElementById("e10");
		 cpass=document.form.confPassword;
		 e11=document.getElementById("e11");
		 er = document.getElementById("er");
		 er.setAttribute("class","alert alert-success col-lg-12")
		 
		//alert(uname)
		if(uname.value.length<2){
			uname.setAttribute("placeholder","Organization name must be more than 1 char")
			e1.setAttribute("class","has-error")
			
			er.innerHTML = "Organization name must be more than 1 char";
			return false
		}
		else if(lname.value.length<2 )
		{
			lname.setAttribute("placeholder","Org Admin name must be more than 1 char")
			e2.setAttribute("class","has-error")
			
			er.innerHTML = "Org Admin name must be more than 1 char";
			return false
		}
		else if(sem.value.length<1)
		{
			sem.setAttribute("placeholder","organization type must not empty")
			e3.setAttribute("class","has-error")
			
			er.innerHTML = "organization type must not empty"
			return false
		}
		else if(enrol.value.length<1)
		{
			enrol.setAttribute("placeholder","Org size must not empty")
			e4.setAttribute("class","has-error")
			
			er.innerHTML = "Org size must not empty";
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
		else if(url.value.length<6)
		{
			url.setAttribute("placeholder","url must be 6 characters ")
			e8.setAttribute("class","has-error")
			
			er.innerHTML = "url must be 6 characters";
			return false
		}
		else if(user.value.length<6 || user.value.length>12)
		{
			user.setAttribute("placeholder","username must be 6 to 12 characters")
			e9.setAttribute("class","has-error")
			
			er.innerHTML = "username must be 6 to 12 characters";
			return false
		}
		else if(pass.value.length<6 || pass.value.length>12)
		{
			pass.setAttribute("placeholder","password must be 6 to 12 characters")
			e10.setAttribute("class","has-error")
			er.innerHTML = "password must be 6 to 12 characters";
			return false
		}
		else if(cpass.value.length!=pass.value.length || cpass.value != pass.value )
		{
			cpass.setAttribute("placeholder","password does not matched")
			e11.setAttribute("class","has-error")
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
		e11.setAttribute("class","has-success")
		
	}
</script>