<div id="body_section">
	<p style="font-family: verdana; font-weight: bold; color: green; position: relative; top: 35px; left: 155px;">Visit our Barishal University Mirror.<br>Connect friends from your own batch for share <br>your knowledges and informations</p>
	<div id="img">
		<img src="images/logo.png" height="180px" width="200px">	
	</div>
	<div id="right">
		<p style="font-size: 32px; color: green; font-weight: bold;">Create a Group</p>
		<p style="color: green; "><strong>Its free and Always will be.!</strong></p>
		<div id="form">
			<form id="signup_form" method="post">
				<table>
						<tr>
							<td>
								<input type="text" name="name" required="required" placeholder="Group Name">
							</td>
						</tr>
						
						<tr>
							<td>
								<input type="text" name="u_name" required="required" placeholder="Group's Username">
							</td>
						</tr>
						<tr>
							<td>
								<input type="password" name="u_pass" required="required" placeholder="Enter Password">
							</td>
						</tr>
						<tr>
							<td>Department</td>
						</tr>
						<tr>
							<td>
								<select name="dept">
									<option>Select your Department</option>
									<option>CSE</option>
									<option>CHEM</option>
									<option>PHY</option>
									<option>ENG</option>
									<option>BANG</option>
									<option>LAW</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Batch</td>
						</tr>
						<tr>
							<td>
								<select name="batch">
									<option>First</option>
									<option>Second</option>
									<option>Third</option>
									<option>Fourth</option>
									<option>Fifth</option>
									<option>Sixth</option>
									<option>Seventh</option>
									<option>Eighth</option>
								</select>
							</td>
						</tr>
				</table>
				<input style="width: 200px; height:  45px; font-weight: bold; background: #228822; border-radius: 5px; border: 0.5px solid #7FFF00; color:white;" type="submit" name="sign_up" value="Create Group">
				<?php
					include("insert_group.php");  ?>
				
			</form>

			
		</div>
	</div>
	
</div>