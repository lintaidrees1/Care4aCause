<?php include 'db.php' ?>
<?php
$obj = new database();
if (isset($_POST['register'])) {
    $representeeName = $_POST['representeeName'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $orgname = $_POST['Organisation_Name'];
    $country = $_POST['Country'];
    $farea = $_POST['Focus_Area'];
    $desp = $_POST['Description'];
    $website = $_POST['Website'];
    $cnum = $_POST['Contact_Number'];
    $staddress = $_POST['Street_Address'];
    $zipcode = $_POST['Zip_Code'];


    $obj->insert('organisation', [
        'org_name' => $orgname,
        'email' => $email,
        'password' => $password,
    ]);
    $show = $obj->getResult();
    if ($show) {
        $obj->insert('org_details', [
            'org_id' => $obj->mysqli->insert_id,
            'repsresentee_name' => $representeeName,
            'country' => $country,
            'focus_area' => $farea,
            'charity_description' => $desp,
            'website' => $website,
            'address' => $staddress,
            'telephone_no' => $cnum,
            'postal_code' => $zipcode,
        ]);
        $result = $obj->getResult();
    }
    if ($result) {
        header("url=org/login.php");
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('You are successfully registered');
            window.location.href='org/login.php';
            </script>");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="vendor/css/styles.css">

    <title>Care4aCause</title>
    <script>
        function validateForm() {
            //alert("in");
            const Rname = document.forms["register_form"]["representeeName"];

            const email = document.forms["register_form"]["Email"];
            const pw = document.forms["register_form"]["Password"];
            const orgname = document.forms["register_form"]["Organisation_Name"];
            const country = document.forms["register_form"]["Country"];
            const focusarea = document.forms["register_form"]["Focus_Area"];
            const describecharity = document.forms["register_form"]["Description"];
            const website = document.forms["register_form"]["Website"];
            const phone = document.forms["register_form"]["Contact_Number"];
            const streetadd = document.forms["register_form"]["Street_Address"];
            const zip = document.forms["register_form"]["Zip_Code"];


            const Rname_val = document.forms["register_form"]["representeeName"].value;
            // alert(Rname_val);
            const email_val = document.forms["register_form"]["Email"].value;
            //  alert(email_val);
            const pw_val = document.forms["register_form"]["Password"].value;
            // alert(pw_val);
            const orgname_val = document.forms["register_form"]["Organisation_Name"].value;
            // alert(orgname_val);
            const country_val = document.forms["register_form"]["Country"].value;
            // alert(country_val);
            const focusarea_val = document.forms["register_form"]["Focus_Area"].value;
            // alert(focusarea_val);
            const describecharity_val = document.forms["register_form"]["Description"].value;
            //alert(describecharity_val);
            const website_val = document.forms["register_form"]["Website"].value;
            //alert(website_val);
            const phone_val = document.forms["register_form"]["Contact_Number"].value;
            //alert(phone_val);
            const streetadd_val = document.forms["register_form"]["Street_Address"].value;
            //alert(streetadd_val);
            const zip_val = document.forms["register_form"]["Zip_Code"].value;
            //alert(zip_val);



            function setErrormsg(input, errormsgs) {
                //alert(errormsgs);
                const formgroup = input.parentElement;
                const small = formgroup.querySelector('small');
                input.classList.add("is-invalid");
                small.classList.remove("text-success");
                small.classList.add('text-danger');
                small.innerHTML = errormsgs;

            }

            function setSuccessmsg(input, successmsgs) {
                const formgroup = input.parentElement;
                const small = formgroup.querySelector('small');
                small.classList.remove('text-danger');
                small.classList.add("text-success");
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
                small.innerHTML = successmsgs;
            }
            var signal = 1;
            // alert(signal);
            //////////////////////////validate first name //////////////////////////
            if (Rname_val === "") {
                alert(Rname_val);
                setErrormsg(Rname, 'first name should not be blank');
                signal = -1;
                //return false;
            } else {

                const regex = /\d/;
                const doesItHaveNumber = regex.test(Rname_val);

                if (doesItHaveNumber) {
                    //alert('number');
                    setErrormsg(Rname, 'digits not allowed');
                    signal = -1;
                    //return false;
                } else if (Rname_val.length <= 2) {
                    // alert('less then 3');
                    setErrormsg(fname, 'first name should not be less than 3 char');
                    signal = -1;
                    //return false;
                } else
                    setSuccessmsg(Rname, 'all good!');
            }







            /////////////////////validate email///////////
            alert(email_val);
            if (email_val === "") {

                setErrormsg(email, 'email should not be blank');
                signal = -1;

            } else {
                var atSymbol = email_val.indexOf("@");
                var dot = email_val.lastIndexOf(".");
                if ((atSymbol < 1) || (dot <= atSymbol + 2) || (dot === email_val.length - 1)) {
                    setErrormsg(email, 'email format not valid');
                    signal = -1;
                } else
                    setSuccessmsg(email, 'all good!');
            }
            ////////////////validate password//////////
            if (pw_val === "") {
                setErrormsg(pw, 'password missing');
                signal = -1;

            } else {
                const regex = /\d/;
                const doesItHaveNumber = regex.test(pw_val);

                if (!doesItHaveNumber) {

                    setErrormsg(pw, 'weak password! please add digits also');
                    signal = -1;

                } else if (pw_val.length <= 7) {

                    setErrormsg(pw, 'password should be at least 8 char long');
                    signal = -1;

                } else
                    setSuccessmsg(pw, 'all good!');
            }
            ///////////////validate organisation name//////////////
            if (orgname_val === "") {
                setErrormsg(orgname, 'organisation name should not be blank');
                signal = -1;

            } else {
                const regex = /\d/;
                const doesItHaveNumber = regex.test(orgname_val);

                if (doesItHaveNumber) {
                    ;
                    setErrormsg(orgname, 'digits not allowed');
                    signal = -1;

                } else if (orgname_val.length <= 2) {

                    setErrormsg(orgname, 'org name should not be less than 3 char');
                    signal = -1;

                } else
                    setSuccessmsg(orgname, 'all good!');
            }
            ///////////////validate country//////////// 
            if (country_val === "") {
                setErrormsg(country, 'please select country');
                signal = -1;

            } else {
                setSuccessmsg(country, 'all good!');
            }
            //////////////validate focus area//////////////
            if (focusarea_val === "") {
                setErrormsg(focusarea, 'please select your needed area');
                signal = -1;

            } else { // alert(focusarea_val);
                setSuccessmsg(focusarea, 'all good!');
            }
            //////////validatee charity////////////////
            if (describecharity_val === "") {
                setErrormsg(describecharity, 'please describe what kind of charity you need');
                signal = -1;

            } else {
                if (describecharity_val.length <= 50) {

                    setErrormsg(describecharity, 'description should be atleast 50 char long');
                    signal = -1;

                } else
                    setSuccessmsg(describecharity, 'all good!');
            }
            ////////////validate website/////////////
            if (website_val === "") {
                setErrormsg(website, "website can not be blank");
                signal = -1;
            } else {
                var dot = website_val.lastIndexOf(".");
                // alert(dot);
                if ((dot === website_val.length - 2) || (dot < 0)) {
                    setErrormsg(website, "incorrect format");
                    signal = -1;
                } else
                    setSuccessmsg(website, 'all good!');


            }
            /////////////////////validate contact number////////////
            if (phone_val === "") {
                setErrormsg(phone, "phone numbber can not be blank");
                signal = -1;
            } else {
                var length = phone_val.length;
                //alert(length);
                if ((length <= 10) || (length > 15)) {
                    setErrormsg(phone, "phone numbber should be 10-15 digits");
                    signal = -1;
                } else
                    setSuccessmsg(phone, 'all good!');


            }
            ////////////validate address//////////
            if (streetadd_val === "") {
                setErrormsg(streetadd, "adress can not be blank");
                signal = -1;
            } else
                setSuccessmsg(streetadd, 'all good!');
            ///////////////validate zip code///////////
            if (zip_val === "") {
                setErrormsg(zip, "zip code can not be blank");
                signal = -1;
            } else {
                var numbers = /^[0-9]+$/;
                if ((zip_val.match(numbers)) && (zip_val.length <= 5)) {
                    setSuccessmsg(zip, 'all good!');
                } else {
                    setErrormsg(zip, 'zip should be max 5 char and no alpha');
                    signal = -1;
                }
            }

            ////////////////submission/////////////////
            if (signal === -1)
                return false;
        }
    </script>
</head>

<body>

    <div class="container registration-form">
        <a href="index.php" class="text-dark"><i class="p-2 fa fa-arrow-left" aria-hidden="true"></i>Back</a>

        <div class=" text-center mt-1 ">
            <h1>Registration</h1>
        </div>
        <div class="row ">
            <div class="col-lg-12 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <form action="reg-for-ngo.php" method="POST" onsubmit="return validateForm()" name="register_form" id="contact-form" role="form" autocomplete="off">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group"> <label for="form_name">Full Name *</label> <input id="form_name" type="text" name="representeeName" class="form-control" placeholder="Please enter your full name *"><small class="text-danger"></small> </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_email">Email *</label> <input id="form_email" type="email" name="Email" class="form-control" placeholder="Please enter your email *"><small class="text-danger"></small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_email">Password *</label> <input id="form_password" type="password" name="Password" class="form-control" placeholder="Please enter your password *"><small class="text-danger"></small> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_org">Organization Name *</label> <input type="text" id="form_org" name="Organisation_Name" class="form-control" placeholder="Enter your organization name *"> <small class="text-danger"></small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_need">Please select your Country *</label>

                                                <select id="form_need" name="Country" class="form-control">

                                                    <option value="" selected disabled>--Select Your Country--</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Åland Islands">Åland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Territories">French Southern Territories</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernsey">Guernsey</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-bissau">Guinea-bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macao">Macao</option>
                                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russian Federation">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Helena">Saint Helena</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Timor-leste">Timor-leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet Nam">Viet Nam</option>
                                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                                <small class="text-danger"></small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group"> <label for="form_need">Focus Area *</label>

                                                <select id="form_need" name="Focus_Area" class="form-control">

                                                    <option value="" selected disabled>--Select Your Focus Area--</option>
                                                    <option value="CommunityDevelopment"> Community Development </option>
                                                    <option value="Health"> Health </option>
                                                    <option value="HumanServices"> Human Services </option>
                                                    <option value="Education"> Education </option>
                                                </select>
                                                <small class="text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group"> <label for="form_message">Describe your charity *</label>
                                                <textarea id="form_message" name="Description" class="form-control" placeholder="" rows="2"></textarea>
                                                <small class="text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_name">Website (optional)</label> <input id="form_name" type="text" name="Website" class="form-control" placeholder="Enter website domain"><small class="text-danger"></small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_name">Telephone</label> <input id="form_name" type="number" name="Contact_Number" class="form-control" placeholder="enter your contact number"><small class="text-danger"></small> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group"> <label for="form_message">Street Address</label>
                                                <textarea id="form_message" name="Street_Address" class="form-control" placeholder="Enter your Street Address" rows="1"></textarea><small class="text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group"> <label for="form_name">Zip/Postal code</label> <input type="number" id="form_name" name="Zip_Code" class="form-control" placeholder="Zip/Postal Code"><small class="text-danger"></small> </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center"><input type="submit" name="register" class="btn btn-success " value="Register"></button> </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- /.8 -->
            </div> <!-- /.row-->
        </div>
    </div>
</body>

</html>