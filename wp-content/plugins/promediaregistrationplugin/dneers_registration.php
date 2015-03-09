<?php //session_start();
include_once('captcha_code.php');
include_once('shared.php');
/*
Plugin Name: promedia registration
Plugin URI: http://dneers.com/
Description: Provides simple front end registration and login forms
Version: 1.0
Author: Suchitra
Author URI: https://dneers.com
*/
//require_once dirname( __FILE__ ) .'captcha.php';
if(empty($_SESSION['letters_code'] ) ||
      strcasecmp($_SESSION['letters_code'], $_POST['letters_code']) != 0)
    {
    //Note: the captcha code is compared case insensitively.
    //if you want case sensitive match, update the check above to
    // strcmp()
        $errors .= "\n The captcha code does not match!";
    }
function curlExection($urlCurl){
    $ch11 = curl_init(); // initialize curl handle
								curl_setopt($ch11, CURLOPT_RETURNTRANSFER, 1); // return into a variable
                                curl_setopt($ch11, CURLOPT_URL, $urlCurl); // set url to post to
                                curl_setopt($ch11, CURLOPT_POST, 60); // times out after 20s
                                curl_setopt($ch11, CURLOPT_POSTFIELDS, $mydata); // add POST fields
                                curl_setopt($ch11, CURLOPT_FRESH_CONNECT, true);
                                $resultdrop = curl_exec($ch11); // run the whole process & set $result=response from server
								//print_r($resultdrop);
								$resultdrop=json_decode($resultdrop);
								
								return $resultdrop;
}
?>
<?php
function custom_registration_function() { 
$captcha = new CaptchaCode();
$code = str_encrypt($captcha->generateCode(6));
//echo $code;
    global $dneers_load_css;
 	$url = plugin_dir_url();
		// set this to true so the CSS is loaded
		$dneers_load_css = true;
		//GetJobFunctionByIndustry
	
              //$urloccupation = "http://services.itp.com/ITPauth/GetJobFunctionByIndustry/";  
			  $urlGetMainIndustry = "http://services.itp.com/ITPauth/GetMainIndustry/";    
			 // $dropdownoccupation = curlExection($urloccupation); 
			  $dropdownmainind = curlExection($urlGetMainIndustry);
			           // print_r($result);
							   //GetMainIndustry
/*	$urlGetMainIndustry = "http://services.itp.com/ITPauth/GetMainIndustry/";
//$post = "subscribe=subscribe&l=17846&e=test@ffmi.com";
    $ch22 = curl_init(); // initialize curl handle
                                curl_setopt($ch22, CURLOPT_RETURNTRANSFER, 1); // return into a variable
                                curl_setopt($ch22, CURLOPT_URL, $urlGetMainIndustry); // set url to post to
                                curl_setopt($ch22, CURLOPT_POST, 60); // times out after 20s
                                curl_setopt($ch22, CURLOPT_POSTFIELDS, $myurlGetMainIndustryData); // add POST fields
                                curl_setopt($ch22, CURLOPT_FRESH_CONNECT, true);
                                $dropdownmainind = curl_exec($ch22); // run the whole process & set $result=response from server
								$dropdownmainind=json_decode($dropdownmainind);
                                print_r($dropdownmainind);*/
   ?>
   
    <form action="http://services.itp.com/ITPauth" name="registerform" id="registerform" method="post" class="myformcss" >
     <div id='message' class='err'></div>
     <div id='refresh' class='err showdiv'></div>
	<cite>All fields marked with <span>*</span> are required and must be completed prior to submission.</cite>
	<h3>Create an Account</h3>
    <div>
    <label for="email">User ID / Email Address <strong>*</strong></label>
    <input type="email" id="email" name="email" value="">
    </div>
	
	<div>
    <label for="confemail">Re-type email address <strong>*</strong></label>
    <input type="email" id="confemail" name="confemail" value="">
    </div>
    <div>
    <label for="pass">Your password <strong>*</strong></label>
    <input type="password" id="pass" name="pass" value="">
    </div>
	
	 <div>
    <label for="con_password">Confirm your password <strong>*</strong></label>
    <input type="password" id="con_password" name="con_password" value="">
    </div>
	<h3>Tell us about yourself</h3>
     
	 <div>
    <label for="name">First Name<strong>*</strong></label>
    <input type="text" id="name" name="name" value="">
    </div>
	
	 <div>
    <label for="lname">Last Name<strong>*</strong></label>
    <input type="text" id="lname" name="lname" value="">
    </div>
	
	 <div>
    <label for="gender">Gender</label>
    <input id="gender" checked="checked" type="radio" name="gender" value="Male" />Male
	<input id="gender" type="radio" name="gender" value="Female" />Female
    </div>
     <div>
    <label for="sday">Date of Birth<strong>*</strong></label>
   <span class="field"><select id="sday" name="sday"><option selected="selected" value="">---day---</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></span> <span class="field"><select id="smon" name="smon"><option value="">--month--</option><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></span> <span class="field"><select id="syr" name="syr"><option selected="selected" value="">---year---</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option></select></span>
    </div>

	
	<h3>Where are you from?</h3> 
	
	<div>
    <label for="city">City / Town</label>
    <input type="text" name="city" id="city" value="">
    </div> 
	<div>
    <label for="country">Country of residence</label>
<select id="country" name="country" size="1"><option selected="selected" value="">- select</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia">Bosnia</option><option value="Botswana">Botswana</option><option value="Bougainville">Bougainville</option><option value="Brazil">Brazil</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Rep.">Central African Rep.</option><option value="Chad">Chad</option><option value="Channel Islands">Channel Islands</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Faeroe Islands">Faeroe Islands</option><option value="Falkland Islands">Falkland Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guatemala">Guatemala</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Holy See">Holy See</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Johnston Island">Johnston Island</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kirghizia">Kirghizia</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Midway Islands">Midway Islands</option><option value="Moldavia">Moldavia</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue Island">Niue Island</option><option value="Norfolk Island">Norfolk Island</option><option value="North Cyprus">North Cyprus</option><option value="North Korea">North Korea</option><option value="North Sudan">North Sudan</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn Islands">Pitcairn Islands</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Queen Maud Land">Queen Maud Land</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Ross Dependency">Ross Dependency</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Sahara">Sahara</option><option value="Saint Helena">Saint Helena</option><option value="Saint Lucia">Saint Lucia</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="Somaliland">Somaliland</option><option value="South Africa">South Africa</option><option value="South Korea">South Korea</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Spanish North Africa">Spanish North Africa</option><option value="Sri Lanka">Sri Lanka</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor">Timor</option><option value="Togo">Togo</option><option value="Tokelau Islands">Tokelau Islands</option><option value="Tonga">Tonga</option><option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="Uruguay">Uruguay</option><option value="USA">USA</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City State">Vatican City State</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wake Island">Wake Island</option><option value="Yemen">Yemen</option><option value="Yugoslavia">Yugoslavia</option><option value="Zaire">Zaire</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>
 	</div>
		<div>
<label for="nationality">National of</label>
<select id="nationality" name="nationality" size="1"><option selected="selected" value="">- select</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia">Bosnia</option><option value="Botswana">Botswana</option><option value="Bougainville">Bougainville</option><option value="Brazil">Brazil</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Rep.">Central African Rep.</option><option value="Chad">Chad</option><option value="Channel Islands">Channel Islands</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Faeroe Islands">Faeroe Islands</option><option value="Falkland Islands">Falkland Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guatemala">Guatemala</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Holy See">Holy See</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Johnston Island">Johnston Island</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kirghizia">Kirghizia</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Midway Islands">Midway Islands</option><option value="Moldavia">Moldavia</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue Island">Niue Island</option><option value="Norfolk Island">Norfolk Island</option><option value="North Cyprus">North Cyprus</option><option value="North Korea">North Korea</option><option value="North Sudan">North Sudan</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn Islands">Pitcairn Islands</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Queen Maud Land">Queen Maud Land</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Ross Dependency">Ross Dependency</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Sahara">Sahara</option><option value="Saint Helena">Saint Helena</option><option value="Saint Lucia">Saint Lucia</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="Somaliland">Somaliland</option><option value="South Africa">South Africa</option><option value="South Korea">South Korea</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Spanish North Africa">Spanish North Africa</option><option value="Sri Lanka">Sri Lanka</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor">Timor</option><option value="Togo">Togo</option><option value="Tokelau Islands">Tokelau Islands</option><option value="Tonga">Tonga</option><option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="Uruguay">Uruguay</option><option value="USA">USA</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City State">Vatican City State</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wake Island">Wake Island</option><option value="Yemen">Yemen</option><option value="Yugoslavia">Yugoslavia</option><option value="Zaire">Zaire</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>
 	</div>
	<h3>Company Profile</h3>
     <div>
    <label for="comp_nm">Company Name<strong>*</strong></label>
    <input type="text" id="comp_nm" name="comp_nm" value="">
    </div>
     <?php /*?><div>
    <label for="industry_main">Main Industry<strong>*</strong></label>
    <select id="industry_main" name="industry_main" size="1" onchange="getSubList(this.value,'#industrydiv')" >
    <option value="">- select</option>
    <?php foreach($dropdownmainind as $dropdownmainindvalue){?>
    <option value="<?php echo $dropdownmainindvalue;?>"><?php echo $dropdownmainindvalue;?></option>
    <?php } ?>
    </select>
    </div><?php */?>
     <div>
    <label for="industry_main">Main Industry<strong>*</strong></label>
    <select id="industry_main" name="industry_main" size="1">
    <option value="" hidden>- select</option>
    <?php foreach($dropdownmainind as $dropdownmainindvalue){?>
    <option value="<?php echo $dropdownmainindvalue;?>"><?php echo $dropdownmainindvalue;?></option>
    <?php } ?>
    </select>
    </div>
    <div id="industrydiv">
    <label for="industry">Specific Industry<strong>*</strong></label>
    <select id="industry" name="industry" size="1">
    <option value="">- select</option>
    <option value=""></option>
    </select>
    </div>
	 <div>
    <label for="job_title">Job Title<strong>*</strong></label>
    <input type="text" id="job_title" name="job_title" value="">
    </div>
       <div>
    <label for="occupation">occupation<strong>*</strong></label>
    <select id="occupation" name="occupation" size="1">
    <option value="">- select</option>
    <option value=""></option>
    </select>
    </div>
    <?php /*?> <div>
    <label for="occupation">occupation<strong>*</strong></label>
    <select id="occupation" name="occupation" size="1">
    <option value="">- select</option>
    <?php foreach($dropdownoccupation as $dropdownoccupationvalue){?>
    <option value="<?php echo $dropdownoccupationvalue;?>"><?php echo $dropdownoccupationvalue;?></option>
    <?php } ?>
    </select>
    </div><?php */?>
    
    
	<div>
	<input class="checkbox" type="checkbox" checked="checked" name="optcancontact" id="optcancontact" value="1" /><span> May ITP/Esquire Middle East contact you in the future?</span>
    </div>
	
	<div>
	<input class="checkbox" type="checkbox" checked="checked" name="tpartycontact" id="tpartycontact" value="1" /><span> May 3rd parties contact you about offers or promotions?</span>
    </div>
	
	<input type="hidden" name="url" id="url" value="http://www.foodserviceequipmentjournal.com">
    <input type="hidden" name="ws" id="ws" value="www.foodserviceequipmentjournal.com">
    <input type="hidden" name="pluginurl" id="pluginurl" value="<?php echo $url."promediaregistrationplugin/"?>">

	  <p>
<?php echo '<img src="'.$url.'promediaregistrationplugin/captcha_images.php?width=120&height=40&code='.$code.'" id="captchaimg" ><br>';?>
<label for='message'>Enter the code above here :</label><br>
<input id="security_code" name="security_code" type="text"><br>
<input type="hidden" name="security_check" id="security_check" value="<?php echo $code?>"> 
<?php /*?><small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small><?php */?>
</p>
	 
    <input type="button" name="submit" id="submit" value="submit" onclick="validation_form();"/>
    </form>
        <?php
}
// Register a new shortcode: [dneers_registration]
add_shortcode( 'dneers_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}
function custom_login_function() { 
    global $dneers_load_css;
 	$url = plugin_dir_url();
		// set this to true so the CSS is loaded
		$dneers_load_css = true;
		$bloginfo = get_bloginfo( $show, $filter );
		?>
        <div id="formShow">
		<form action="http://services.itp.com/ITPauth/Authenticate/" method="POST" name="loginform" id="loginform">
        <div id='loginmsg' class='err'></div>
	<cite>All fields marked with <span>*</span> are required and must be completed prior to submission.</cite>
	<h5>Login To Your Account</h5>
    <div>
    <label for="username">User ID / Email Address <strong>*</strong></label>
    <input type="email" id="username" name="username" value="">
    </div>
    <div>
    <label for="password">Your password <strong>*</strong></label>
    <input type="password" id="password" name="password" value="">
    </div>
    <input type="hidden" name="pluginurl" id="pluginurl" value="<?php echo $url."promediaregistrationplugin/"?>">
    <input type="button" name="submit_login" id="submit_login" value="login" onclick="login_validate();"/>
		</form>
        </div>
        <div id="welcomeShow" style="display:none;">
        <p id="hiMsg"></p>
        <p>welcome to <?php echo $bloginfo;?></p>
         <a id="logout" class="add-new-h2" href="#">logout</a>
        </div>

			<?php
}
		// Register a new shortcode: [dneers_login]
add_shortcode( 'dneers_login', 'custom_login_shortcode' );
 
// The callback function that will replace [book]
function custom_login_shortcode() {
    ob_start();
    custom_login_function();
    return ob_get_clean();
}
// register our form css
function dneers_register_css() {
	wp_register_style('dneers-form-css', plugin_dir_url( __FILE__ ) . 'css/form.css');
	wp_enqueue_style('dneers-admin-ui-css',
                'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css',
                false,
                PLUGIN_VERSION,
                false);
}
add_action('init', 'dneers_register_css');
// load our form css
function dneers_print_css() {
	global $dneers_load_css;
 
	// this variable is set to TRUE if the short code is used on a page/post
	if ( ! $dneers_load_css )
		return; // this means that neither short code is present, so we get out of here
 
	wp_print_styles('dneers-form-css');
}
add_action('wp_footer', 'dneers_print_css');
//load scripts
function enqueue_my_scripts() {
	wp_register_script('jquery_validation', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js", false, null);
	wp_enqueue_script('jquery_validation');
	wp_register_script('additional_jquery_validation', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.min.js", false, null);
	wp_register_script('jquery_ui', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js", false, null);
	wp_enqueue_script('jquery_ui');
	//wp_enqueue_script('script1', plugin_dir_url(__FILE__) . 'scripts/gen_validatorv31.js');
	wp_enqueue_script('script2', plugin_dir_url(__FILE__) . 'scripts/myscript.js');
}
add_action('wp_footer', 'enqueue_my_scripts');
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');