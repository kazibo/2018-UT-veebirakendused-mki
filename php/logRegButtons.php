<button class="login" onclick="document.getElementById('id02').style.display='block'">Login</button>
<button class="signup" onclick="document.getElementById('id01').style.display='block'">Sign up</button>

<div class="log">
	<div id="id02" class="modal">
		<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
		<form class="modal-content" method="post" action="php/login.php">
			<div class="container">
				<h1>Login</h1>
				<hr>
				<label for="ulog"><strong>Username</strong></label>
				<input type="text" placeholder="Enter Username/Email" name="username" id="ulog" required>

				<label for="pwlog"><strong>Password</strong></label>
				<input type="password" placeholder="Enter Password" name="password" id="pwlog" required>
				
				<label for="rem">
					<input type="checkbox" checked="checked" name="remember" id="rem" style="margin-bottom:15px"> Remember me
				</label>
				
				<div class="f_pword">
					<a href="#">forgot password?</a>
				</div>

				<div class="clearfix">
					<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
					<button type="submit" class="signupbtn">Login</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="reg">

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" method="post" action="php/reg.php">
	<div class="container">
	  <h1>Sign Up</h1>
	  <p>Please fill in this form to create an account.</p>
	  <hr>
	  <label for="ureg"><strong>Username</strong></label>
	  <input type="text" placeholder="Enter Username" name="username" id="ureg" required>
	  
	  <label for="ereg"><strong>Email</strong></label>
	  <input type="text" placeholder="Enter Email" name="email" id="ereg" required>

	  <label for="pwreg"><strong>Password</strong></label>
	  <input type="password" placeholder="Enter Password" name="password" id="pwreg" required>

	  <label for="p-r"><strong>Repeat Password</strong></label>
	  <input type="password" placeholder="Repeat Password" name="password-repeat" id="p-r" required>
	  
	  <label for="agree">
		<input type="checkbox" checked="checked" name="agreement" id="agree" style="margin-bottom:15px"> I agree to whatever you want
	  </label>

	  <div class="clearfix">
		<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		<button type="submit" class="signupbtn">Sign Up</button>
	  </div>
	</div>
  </form>
</div>
</div>