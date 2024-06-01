<?php

require_once("projectdb.php");

if (isset($_POST['registerBtn'])) {
    // Retrieve form data
    $selectedLocation = $_POST['selectedLocation'];
    $name = $_POST['nameTxt'];
    $email = $_POST['emailTxt'];
    $nrc = isset($_POST['nrcno']) ? $_POST['nrcno'] : '';
    $nrccity = isset($_POST['nrccity']) ? $_POST['nrccity'] : '';
    $nrccode = isset($_POST['nrc']) ? $_POST['nrc'] : '';
    $nrcno = isset($_POST['nrcTxt']) ? $_POST['nrcTxt'] : '';
    $passport = isset($_POST['passTxt']) ? $_POST['passTxt'] : '';

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM usertbl WHERE UEmail = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Email already exists, handle accordingly (you can show an error message)
        $error="*User already existed!!!";
    } else {
        // Email doesn't exist, proceed with insertion
        if ($selectedLocation == 'local') {
            $sql = "INSERT INTO usertbl (UserName, UEmail, nrc, nrccity, nrccode, NRCno, passportno) VALUES ('$name','$email','$nrc','$nrccity','$nrccode','$nrcno','')";
        } else {
            // Insert data for foreign location
            $sql = "INSERT INTO usertbl (UserName, UEmail, passportno) VALUES ('$name','$email','$passport')";
        }

        if ($conn->query($sql) === TRUE) {
            echo "<script>document.location='../php/userlogin.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.4">
    <style>
        div.unrc {
    display: flex;
    flex-direction: column;
    margin-bottom: 25px;
   
  }
  .optionunrc{
    width: 45%;
    font-size: 20px;
   
  }
  label {
    font-weight: bold;
    font-size: 20px;
    margin-bottom: 10px;
    color: #f55;
  }
  div.unrc select
   {
    margin-bottom: 10px;
  }
  #nrc,div.unrc select{
    height: 40px;
    border-radius: 10px;
    border-color: #3498db;
  }
  #nrc{
    border: 1px solid #ccc;
    border-color: #3498db;
    height: 25px;
  }
  form{
    background-color: white;
padding: 20px;
border-radius: 10px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
max-width: 700px;
margin: 0 auto;
  }
  
    input[type="text"],
input[type="email"]
 {
width: 90%;
padding: 10px;
margin-bottom: 15px;
border: 1px solid #ccc;
border-radius: 10px;
font-size: 18px; /* Adjust font size for input fields */
}
#registerBtn,#localregisterBtn{
    color: #fff;
font-size: 16px;
background-color: #f55;
border: none;
padding: 10px 20px;
box-shadow:  0 3px 4px rgba(0, 0, 0, 0.253);
border-radius: 5px;
text-decoration: none;
transition: background-color 0.3s, color 0.3s;
}
    </style>

   
</head>
<body>
<header>
   <nav>
   <a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
      
    </nav>
   </header>
   <br>
   <section>
<form  name="myform" method="post" onsubmit="return validateForm()">
<h1 style="color:#f55;">Register Form</h1>
<!-- Local Form -->
<div class='uname'>
    <label for="name">Name</label>
    <input type="text" name="nameTxt" placeholder="Name" id="name" required>
</div>
<br>
<div class="uemail">
    <label for="mail">Email</label><br>
    <input type="email" name="emailTxt" placeholder="Email" id="mail" required>
    <br>
    <span>
        <?php 
        if(isset($error)){
            echo "<span style='font-size:15px;color:red;'>$error</span>";
        }
        ?>
    </span>
</div><br>

<!-- Radio buttons for location selection -->
<input type="radio" name="location" id="loc" value="local" onclick="toggleLocalForm()">
<label for="loc" style="font-size: 25px;">Local</label>
<input type="radio" name="location" id="for" value="foreign" onclick="toggleLocalForm()">
<label for="for" style="font-size: 25px;">Foreign</label><br><br>

<input type="hidden" name="selectedLocation" id="selectedLocation" value=""><br>

<div class="form-container" id="localPeopleForm">
    <script type = "text/javascript">
    function populate(s1,s2){
        var s1=document.getElementById(s1);
        var s2=document.getElementById(s2);
 
        s2.innerHTML="";
        if(s1.value=="1"){
            var optionArray=["|","kapata|KAPATA","kamata|KAMATA","kamana|KAMANA","khaphana|KHAPHANA","khabada|KHABADA","khalapha|KHALAPHA","sakana|SAKANA","sapaba|SAPABA","hsadana|HSADANA","hsapaba|HSAPABA","hsabata|HSABATA","hsabana|HSABANA","hsalana|HSALANA","tanana|TANANA","daphaya|DAPHAYA","namana|NAMANA","pataah|PATAAH","panada|PANADA","pamana|PAMANA","pawana|PAWANA","phakana|PHAKANA","bakana|BAKANA","bamana|BAMANA","makata|MAKATA","makana|MAKANA","makatha|MAKATHA","makhaba|MAKHABA","magada|MAGADA","masana|MASANA","mayana|MANYANA","matana|MATANA","mamana|MAMANA","malana|MALANA","yakana|YAKANA","yabaya|YABAYA","lagana|LAGANA","wamana|WAMANA","hapana|HAPANA","ahagaya|AHAGAYA","ahatana|AHATANA"];
        }
 
        else if(s1.value=="2"){
            var optionArray=["|","khasana|KHASANA","sasana|SASANA","htatapa|HTATAPA","damasha|DAMASHA","phashana|PHASHANA","phayasha|PHAYASHA","phalasha|PHALASHA","balakha|BALAKHA","masana|MASANA","yatana|YATANA","yathana|YATHANA","lakana|LAKANA"];
        }
        else if(s1.value=="3"){
            var optionArray=["|","kakaya|KAKAYA","kashaka|KASHAKA","katakha|KATAKHA","kadana|KADANA","kamama|KAMAMA","sakala|SAKALA","pakana|PAKANA","phapana|PHAPANA","phaahana|PHAAHANA","bagala|BAGALA","bathasha|BATHASHA","baahana|BAAHANA","mashala|MASHALA","mawata|MAWATA","yayatha|YAYATHA","labana|LABANA","lathana|LATHANA","walama|WALAMA","thataka|THATAKA","thatana|THATANA"];
        }
        else if(s1.value=="4"){
            var optionArray=["|","kakhana|KAKHANA","kapala|KAPALA","shamana|SHAMANA","tszana|TAZANA","tatana|TATANA","htatala|HTATALA","palawa|PALAWA","phalana|PHALANA","matana|MATANA","matapa|MATAPA","yakhada|YAKHADA","yazana|YAZANA","hakhana|HAKHANA"];
        }
 
        else if(s1.value=="5"){
            var optionArray=["|","kashala|KASHALA","kanana|KANANA","kabala|KABALA","kamana|KAMANA","kalata|KALATA","kalahta|KALAHTA","kalana|KALANA","kalawa|KALAWA","kalatha|KALATHA","kathana|KATHANA","khatana|KHATANA","khapana|KHAPANA","khauta|KHAUTA","khauna|KHAUNA","ngsana|NGSANA","kakana|KAKANA","shamaya|SHAMAYA","shalaka|SHALAKA","tashana|TASHANA","tamana|TAMANA","tauna|TAUNA","htakhana|HTAKHANA","htapakha|HTAPAKHA","dapayha|DAPAYHA","kahana|KAHANA","dhakana|DHAKANA","nayhana|NAYHANA","pashana|PASHANA","palana|PALANA","palaba|PALABA","phapana|PHAPANA","bamana|BAMANA","batala|BATALA","makana|MAKANA","mapala|MAPALA","mamata|MAMATA","mamana|MAMANA","mayana|MAYANA","malana|MALANA","mathana|MATHANA","yhamapa|YHAMAPA","yabana|YABANA","yauna|YAUNA","layana|LAYANA","lahana|LAHANA","walana|WALANA","wathana|WATHANA","hamala|HAMALA","ahatana|AHATANA","ahahtana|AHAHTANA","ahamaza|AHAMAZA","ahayata|AHAYATA"];
        }
 
        else if(s1.value=="6"){
            var optionArray=["|","kasana|KASANA","kapana|KAPANA","kayaya|KAYAYA","kalaaha|KALAAHA","kathana|KATHANA","kathama|KATHAMA","khamaka|KHAMAKA","tathaya|TATHAYA","htawana|HTAWANA","pakama|PAKAMA","palata|PALATA","palana|PALANA","bapana|BAPANA","matana|MATANA","mamana|MAMANA","mamala|MAMALA","maahana|MAAHANA","maahaya|MAAHAYA","yaphana|YAPHANA","lathana|LATHANA","thayakha|THAYAKHA","hathata|HATHATA","ahamaya|AHAMAYA"];
        }
 
        else if(s1.value=="7"){
            var optionArray=["|","kakana|KAKANA","katakha|KATAKHA","katana|KATANA","kapaka|KAPAKA","kawana|KAWANA","zakana|ZAKANA","myalapa|NYALAPA","tangna|TANGNA","htatapa|HTATAPA","dauna|DAUNA","natala|NATALA","pakhata|PAKHATA","pakhana|PAKHANA","pashata|PASHATA","patata|PATATA","patana|PATANA","pamana|PAMANA","phamana|PHAMANA","bathaya|BATHAYA","manyana|MANYANA","malana|MALANA","mawata|MAWATA","yakana|YAKANA","yatana|YATANA","yataya|YATAYA","lapata|LAPATA","wamana|WAMANA","thakana|THAKANA","thanapa|THANAPA","thawata|THAWATA","ahatana|AHATANA","ahaphana|AHAPHANA"];
 
        }
 
        else if(s1.value=="8"){
            var optionArray=["|","kahtana|KAHTANA","kamana|KAMANA","khamana|KHAMANA","gagana|GAGANA","ngphana|NGPHANA","sataya|SATAYA","salana|SALANA","shapawa|SHAPAWA","shaphana|SHAPHANA","shamana|SHAMANA","tataka|TATAKA","htalana|HTALANA","namana|NAMANA","pakhaka|PAKHAKA","paphana|PAPHANA","pamana|PAMANA","bakala|BAKALA","makana|MAKANA","magada|MAGADA","matana|MATANA","mathana|MAHTANA","mahtala|MAHTALA","mabana|MABANA","mamana|MAMANA","mayasha|MAYASHA","malana|MALANA","mathana|MATHANA","yasaka|YASAKA","yanakha|YANAKHA","thayana|THAYANA","ahalana|AHALANA"];
 
        }
 
        else if(s1.value=="9"){
            var optionArray=["|","kashana|KASHANA","kapata|KAPATA","kamana|KAMANA","khamakha|KHAMAKHA","khamasa|KHAMASA","kahmaza|KHAMAZA","khamana|KHAMANA","khamama|KHAMAMA","khamatha|KHAMATHA","khaahaza|KHAAHAZA","ngzana|NGZANA","ngthaya|NGTHAYA","sakata|SAKATA","sakana|SAKANA","zabatha|ZABATHA","zayatha|ZAYATHA","nyauna|NYAUNA","takata|TAKATA","takana|TAKANA","tatau|TATAU","tatana|TATHANA","dakhatha|DAKHATHA","nataka|NATAKA","nahtaka|NAHTAKA","nanama|NANAMA","namana|NAMANA","pakakha|PAKAKHA","pakhaka|PAKHAKA","pakhama|PAKHAMA","pabatha|PABATHA","pabana|PABANA","pamana|PAMANA","pathaka|PATHAKA","paula|PAULA","makakha|MAKAKHA","makana|MAKANA","makhana|MAKHANA","masana|MASANA","matana|MATANA","mataya|MATAYA","matala|MATALA","mahtala|MAHTALA","manata|MANATA","manama|MANAMA","mamana|MAMANA","mayata|MAYATA","mayama|MAYAMA","malana|MALANA","mathana|MATHANA","mahama|MAHAMA","yamatha|YAMATHA","yauna|YAUNA","lakana|LAKANA","lawana|LAWANA","watana|WATANA","thasana|THASANA","thataya|THATAYA","thapaka|THAPAKA","thawaka|THAWAKA","ahakhana|AHAKHANA","ahasana|AHASANA","ahamaza|AHAMAZA","ahamaba|AHAMABA","ahanaya|AHANAYA","ahayata|AHAYATA","utatha|UTATHA"];
 
        }
 
        else if(s1.value=="10"){
            var optionArray=["|","kahtana|KAHTANA","kamaya|KAMAYA","kamala|KAMALA","khashala|KHASHALA","khazana|KHAZANA","htahtana|HTAHTANA","pamana|PAMANA","phapana|PHAPANA","balana|BALANA","baahana|BAAHANA","masana|MASANA","madana|MADANA","malama|MALAMA","yamana|YAMANA","lamana|LAMANA","thahtana|THAHTANA","thaphaya|THAPHAYA"];
 
        }
 
        else if(s1.value=="11"){
            var optionArray=["|","katana|KATANA","katala|KATALA","kaphana|KAPHANA","gamana|GAMANA","satana|SATANA","takana|TAKANA","tapawa|TAPAWA","panhaka|PANHAKA","patana|PATANA","bathata|BATHATA","matana|MATANA","mapata|MAPATA","mapana|MAPANA","mamana|MAMANA","maahata|MAAHATA","maahana|MAAHANA","mauna|MAUNA","yatana|YATANA","yatatha|YATATHA","yabana|YABANA","yathata|YATHATA","lamata|LAMATA","thatana|THATANA","ahamana|AHAMANA"];
 
        }
 
        else if(s1.value=="12"){
            var optionArray=["|","kakaka|KAKAKA","kakhaka|KAKHAKA","katata|KATATA","katana|KATANA","kamata|KAMATA","kamana|KAMANA","kamaya|KAMAYA","khayana|KHAYANA","sakhana|SAKHANA","shakakha|SHAKAKHA","shakana|SHAKANA","takana|TAKANA","tatata|TATATA","tatana|TATANA","tamana|TAMANA","tauka|TAUKA","htatapa|HTATAPA","dagasha|DAGASHA","dagata|DAGATA","dagana|DAGANA","dagama|DAGAMA","dagaya|DAGAYA","dapana|DAPANA","dalana|DALANA","pazata|PAZATA","pabata|PABATA","batahta|BATAHTA","bahana|BAHANA","magata|MAGATA","magada|MAGADA","mabana|MABANA","mayaka|MAYAKA","mauka|MAUKA","yakana|YAKANA","yapatha|YAPATHA","lakana|LAKANA","lamata|LAMATA","lamana|LAMANA","layhana|LAYHANA","layhaya|LAYHAYA","lathana|LATHANA","lathatha|LATHAYHA","thakata|THAKATA","thakhana|THAKHANA","thagaka|THAGHAKA","thalana|THALANA","ahasana|AHASANA","ahalana|AHALANA","ukata|UKATA","ukama|UKAMA"];
 
        }
 
        else if(s1.value=="13"){
            var optionArray=["|","kakana|KAKANA","kakhana|KAKHANA","katata|KATATA","katana|KATANA","katala|KATALA","kamana|KAMANA","kalata|KALATA","kalahta|KALAHTA","kalada|KALADA","kalana|KALANA","kathana|KATHANA","kahana|KAHANA","khayaha|KHAYAHA","khalana|KHALANA","shasahna|SHASHANA","nyayana|NYAYANA","takana|TAKANA","takhala|TAKHALA","tatana|TATANA","tamanya|TAMANYA","tayhana|TAYHANA","talana|TALANA","nakhata|NAKHATA","nakhana|NAKHANA","nasana|NASANA","nashana|NASHANA","natana|NATANA","nataya|NATAYA","naphana|NAPHANA","namata|NAMATA","pashata|PASHATA","pashana|PASHANA","patayha|PATAYHA","papaka|PAPAKA","payhana|PAYHANA","palata|PALATA","palahta|PALAHTA","palana|PALANA","pawana|PAWANA","phakhana|PHAKHANA","makata|MAKATA","makahta|MAKAHTA","makana|MAKANA","makhata|MAKHATA","makhana|MAKHANA","mangna|MANGNA","mashata|MASHATA","mashana|MASHANA","matata|MATATA","matana|MATANA","mahtata|MAHTATA","mahtana|MAHTANA","manana|MANANA","manata|MANATA","mapata|MAPATA","mapahta|MAPAHTA","mapana|MAPANA","maphata|MAPHATA","maphana|MAPHANA","mabana|MABANA","mamata|MAMATA","mamahta|MAMAHTA","mamana|MAMANA","mayhata|MAYHATA","mayhahta|MAYHAHTA","mayhana|MAYHANA","mayata|MAYATA","mayana|MAYANA","malata|MALATA","malana|MALANA","mahaya|MAHAYA","yangna|YANGNA","yasana|YASANA","yanyana|YANYANA","lakana|LAKANA","lakhata|LAKHATA","kakhana|LAKHANA","layana|LAYANA","lalana|LALANA","wakana|WAKANA","thanana|THANANA","thapana|THAPANA","hapata|HAPATA","hapana|HAPANA","hamana|HAMANA","ahatana|AHATANA","ahapana|AHAPANA","ahathaya|AHATHAYA"];
 
        }
 
        else if(s1.value=="14"){
            var optionArray=["|","kakahta|KAKAHTA","kakana|KAKANA","kakhana|KAKHANA","kapana|KAPANA","kamana|KAMANA","kamatha|KAMATHA","kalana|KALANA","ngshana|NGSHANA","ngpata|NGPATA","mgyaka|NGYAKA","ngthakha|NGTHAKHA","zalana|ZALANA","nyatana|NYATANA","tamana|TAMANA","dadaya|DADAYA","danapha|DANAPHA","pakakha|PAKAKHA","pasala|PASALA","patana|PATANA","pathana|PATHANA","pathaya|PATHAYA","phapana|PHAPANA","bakala|BAKALA","mamaka|MAMAKA","mamana|MAMANA","mayaka|MAYAKA","maahana|MAAHANA","maahapa|MAAHAPA","yakana|YAKANA","yathayha|YATHAYHA","lapata|LAPATA","lamana|LAMANA","wakhama|WAKHAMA","thapana|THAPANA","hakaka|HAKAKA","hathata|HATHATA","ahagapa|AHAGAPA","ahasana|AHASANA","ahapana|AHAPANA","ahamata|AHAMATA","ahamana|AHAMANA"];
 
        }
        for( var option in optionArray){
            var pair=optionArray[option].split("|");
            var newOption=document.createElement("option");
            newOption.value=pair[0];
            newOption.innerHTML=pair[1];
            s2.options.add(newOption);
        }
 
    }
 </script>
 <div class="form-container" id="localPeopleForm">
    <div class="unrc">
        <label for="nrc">NRC No</label><br>
        <select name="nrcno" id="nrcno" onchange="populate(this.id,'nrccity')">
                   <option value=""></option>
                   <option value="1" >1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                   <option value="7">7</option>
                   <option value="8">8</option>
                   <option value="9">9</option>
                   <option value="10">10</option>
                   <option value="11">11</option>
                   <option value="12">12</option>
                   <option value="13">13</option>
                   <option value="14">14</option>
           </select>
             
 
           <select name="nrccity" id="nrccity"> </select>
               
               <select name="nrc">
                   <option value="N">N</option>
                   <option value="E">E</option>
                   <option value="P">P</option>
               </select>
        <input type="text" name="nrcTxt" required id="nrc" maxlength="6"
               oninvalid="this.setCustomValidity('Invalid NRC number. Please enter 6 digits.');"
               oninput="this.setCustomValidity('');" disabled>
    </div>
</div>
<br>
<div>
    <label for="visa">Passport No</label>
    <input type="text" name="passTxt" required id="visa" placeholder="MH325908" disabled maxlength="8">
</div>

<!-- Register button -->
<button type="submit" name="registerBtn" id="registerBtn">Register</button>
<br>
</form>
<br>
</section><br>
<footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
<script>
function toggleLocalForm() {
    var selectedLocation = document.querySelector('input[name="location"]:checked').value;
    document.getElementById('selectedLocation').value = selectedLocation;
    var localForm = document.getElementById('localPeopleForm');
    var nrcInputs = localForm.getElementsByTagName('input');
    var nrcSelects = localForm.getElementsByTagName('select');

    if (document.getElementById('loc').checked) {
        for (var i = 0; i < nrcInputs.length; i++) {
            nrcInputs[i].disabled = false;
        }
        for (var i = 0; i < nrcSelects.length; i++) {
            nrcSelects[i].disabled = false;
        }
        document.getElementById('visa').disabled = true;
    } else {
        for (var i = 0; i < nrcInputs.length; i++) {
            nrcInputs[i].disabled = true;
        }
        for (var i = 0; i < nrcSelects.length; i++) {
            nrcSelects[i].disabled = true;
        }
        document.getElementById('visa').disabled = false;
    }
}

function validateForm() {
    // You can add additional validation logic here if needed
    return true;
}
</script>


</body>
</html>
