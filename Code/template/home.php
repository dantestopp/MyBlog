<h1>Sign Up</h1>
<div class="ui divider"></div>
<form action="index.php?p=signup" method="post" class="ui blue form segment">
	<div class="two fields">
		<div class="field">
			<label>First Name</label>
			<div class="ui labeled icon input">
				<input name="firstname" type="text" placeholder="First Name">
				<div class="ui corner label">
					<i class="icon asterisk"></i>
				</div>
			</div>
		</div>
		<div class="field">
			<label>Last Name</label>
			<div class="ui labeled icon input">
				<input name="lastname" type="text" placeholder="Last Name">
				<div class="ui corner label">
					<i class="icon asterisk"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>Username</label>
			<div class="ui left labeled icon input">
				<input name="username" type="text" placeholder="Username">
				<i class="user icon"></i>
				<div class="ui corner label">
					<i class="icon asterisk"></i>
				</div>
			</div>
		</div>
		<div class="field">
			<label>Password</label>
			<div class="ui left labeled icon input">
				<input name="password" type="password">
				<i class="lock icon"></i>
				<div class="ui corner label">
					<i class="icon asterisk"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="field">
		<label>Email</label>
		<div class="ui left labeled icon input">
			<input name="email" type="email" placeholder="Email">
			<i class="mail icon"></i>
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			<label>Street / Nr.</label>
			<div class="ui left labeled icon input">
				<input name="street" type="text" placeholder="Street / Nr.">
				<i class="road icon"></i>
				<div class="ui corner label">
					<i class="icon asterisk"></i>
				</div>
			</div>
		</div>
		<div class="field">
			<label>Address</label>
			<div class="ui left labeled icon input">
				<input id="address" name="address" type="text" placeholder="ex. 8051 Zürich">
				<i class="map marker icon"></i>
				<div class="ui corner label">
					<i class="icon asterisk"></i>
				</div>
			</div>
		</div>
	</div>
	<button name="submit" class="ui submit button">Sign Up</button>
</form>
<div class="ui divider"></div>
<div class="ui right aligned basic segment">
	Made in Zurich <a target="_blank" href="https://github.com/happyoniens/MyBlog/">view on Github</a>
</div>