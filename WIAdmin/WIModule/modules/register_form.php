			
				<!-- Register Form -->
				<form action="" method="post">
					<h1>Not a member yet? Sign Up!</h1>		
                    
                   
                    		
					<label class="grey" for="username"><?php echo $l['username']; ?>:</label>
                    <input class="field" type="text" size="23" id="username" name="username" <?php echo ( (isset($_POST['username'])) ? 'value="' . $_POST['username'] . '"' : '' ); ?> />
                    <label class="grey" for="password"><?php echo $l['password']; ?>:</label>
                     <input type="password" size="23" name="password" />
                     
                     <label class="grey" for="password"><?php echo $l['confirm_password']; ?>:</label>
                     <input type="password" size="23" name="confirm_password" />
                     
					<label class="grey" for="email"><?php echo $l['email_address']; ?>:</label>
                    <input class="field" id="email" type="text" size="23" name="email" <?php echo ((isset($_POST['email'])) ? 'value="' . trim($_POST['email']) . '"' : ''); ?> />
                
                    <label class="grey" for="timezone" name="timezone"><?php echo $l['time_zone']; ?>:</label>
					<input type="field"  /> 
                    <select name="timezone" style="font-size:11px">
                        <option value="-12" class="" >(GMT -12:00) Eniwetok, Kwajalein</option>
                        <option value="-11" class="" >(GMT -11:00) Midway Island, Samoa</option>
                        <option value="-10" class="" >(GMT -10:00) Hawaii</option>
                        <option value="-9" class="" >(GMT -9:00) Alaska</option>
                        <option value="-8" class="" >(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                        <option value="-7" class="" >(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                        <option value="-6" class="" >(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                        <option value="-5" class="" >(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                        <option value="-4" class="" >(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                        <option value="-3.5" class="" >(GMT -3:30) Newfoundland</option>
                        <option value="-3" class="" >(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                        <option value="-2" class="" >(GMT -2:00) Mid-Atlantic</option>
                        <option value="-1" class="" >(GMT -1:00 hour) Azores, Cape Verde Islands</option>
                        <option value="+0" class="">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                        <option value="1" class="" >(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
                        <option value="2" class="" >(GMT +2:00) Kaliningrad, South Africa</option>
                        <option value="3" class="" >(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                        <option value="3.5" class="" >(GMT +3:30) Tehran</option>
                        <option value="4" class="" >(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                        <option value="4.5" class="" >(GMT +4:30) Kabul</option>
                        <option value="5" class="" >(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                        <option value="5.5" class="" >(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                        <option value="6" class="" >(GMT +6:00) Almaty, Dhaka, Colombo</option>
                        <option value="7" class="" >(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                        <option value="8" class="" >(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                        <option value="9" class="" >(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                        <option value="9.5" class="" >(GMT +9:30) Adelaide, Darwin</option>
                        <option value="10" class="" >(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                        <option value="11" class="" >(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                        <option value="12" class="" >(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                        <option value="0" class="" selected="selected">Board Default</option>
                    </select>
                    
					
					
                
                <div class="reg">
                <?php echo $l['registration_terms_header']; ?>
                <div class="terms">
                <?php echo $l['registration_terms']; ?>
                </div>
                </div>
                <div class="agree">
                <input type="checkbox" name="iagree" /> <b><?php echo $l['i_agree']; ?>
                </b>
                
                <input type="submit" name="submit" value="Register" value="<?php echo $l['submit_button']; ?>" class="bt_register" />
				</form>
                
			