<button class="login" onclick="document.getElementById('id02').style.display='block'"><?php echo $lang['but_login'] ?></button>
<button class="signup" onclick="document.getElementById('id01').style.display='block'"><?php echo $lang['but_registration'] ?></button>

<div class="log">
	<div id="id02" class="modal">
		<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
		<form class="modal-content" method="post" action="php/login.php">
			<div class="container">
				<h1>Login</h1>
				<hr>
				<label for="ulog"><strong><?php echo $lang['username'] ?></strong></label>
				<input type="text" placeholder="<?php echo $lang['login_username_field'] ?>" name="username" id="ulog" required>

				<label for="pwlog"><strong><?php echo $lang['password'] ?></strong></label>
				<input type="password" placeholder="<?php echo $lang['password_field'] ?>" name="password" id="pwlog" required>
				
				<label for="rem">
					<input type="checkbox" checked="checked" name="remember" id="rem" style="margin-bottom:15px"> <?php echo $lang['login_remember'] ?>
				</label>
				
				<div class="f_pword">
					<a href="#"><?php echo $lang['login_forgot'] ?></a>
				</div>

				<div class="clearfix">
					<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn"><?php echo $lang['but_cancel'] ?></button>
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
		  <h1><?php echo $lang['reg_header'] ?></h1>
		  <p><?php echo $lang['reg_hint'] ?></p>
		  <hr>
		  <label for="ureg"><strong><?php echo $lang['username'] ?></strong></label>
		  <input type="text" placeholder="<?php echo $lang['reg_username_field'] ?>" name="username" id="ureg" required>
		  
		  <label for="ereg"><strong><?php echo $lang['reg_email'] ?></strong></label>
		  <input type="text" placeholder="<?php echo $lang['reg_email_field'] ?>" name="email" id="ereg" required>

		  <label for="pwreg"><strong><?php echo $lang['password'] ?></strong></label>
		  <input type="password" placeholder="<?php echo $lang['password_field'] ?>" name="password" id="pwreg" required>

		  <label for="p-r"><strong>Repeat Password</strong></label>
		  <input type="password" placeholder="<?php echo $lang['password_field_rep'] ?>" name="password-repeat" id="p-r" required>
		  
		  <label for="agree">
			<input type="checkbox" checked="checked" name="agreement" id="agree" style="margin-bottom:15px"><?php echo $lang['reg_agree'] ?>
		  </label>

		  <div class="clearfix">
			<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><?php echo $lang['but_cancel'] ?></button>
			<button type="submit" class="signupbtn"><?php echo $lang['but_registration'] ?></button>
		  </div>
		</div>
	  </form>
	</div>
</div>
</div>