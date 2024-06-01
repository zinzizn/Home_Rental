<?php
require_once("projectdb.php");


if(isset($_POST["signup"])){
    
    
      /*getting form value by post method */
    $fname=mysqli_real_escape_string($conn,$_POST["finame"])  ;
    $lname=mysqli_real_escape_string($conn,$_POST["laname"])  ;
    
    $email=mysqli_real_escape_string($conn,$_POST["email"])  ;
    $phno=mysqli_real_escape_string($conn,$_POST["PhTxt"])  ;
    $pass=mysqli_real_escape_string($conn,$_POST["pass"])  ;
    $nrc=$_POST['nrcno'];
    $nrccity=$_POST['nrccity'];
    $nrccode=$_POST['nrc'];
    $nrcno=$_POST['nrcTxt'];
    /* $pass_hash=password_hash($pass,PASSWORD_DEFAULT); */ 
    /* $password=password_hash($pass); */

$sql = mysqli_query($conn, "SELECT * FROM host WHERE Email = '$email'");
if(mysqli_num_rows($sql)>0){
    $error="*User is already existed!!!";
    
}else{
    $sql="INSERT INTO host(FirstName,LastName,Email,phoneno,password,nrccode,nrccity,nrc,nrcno) VALUES ('$fname','$lname','$email','$phno','$pass','$nrc','$nrccity','$nrccode','$nrcno')";
    $host_result=mysqli_query($conn,$sql); 
    if($host_result){
        
        echo "<script>document.location='../php/signin.php'</script>";
    }  
}
 
 
      
   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="../css/designav.css?v=1.4">
    <link rel="stylesheet" href="../css/sign.css?v=1.2">

    <script type="text/javascript">
        function validatePassword() {
            var password = document.getElementById("psw").value;
            var confirm_password = document.getElementById("cpsw").value;
            var password_Error = document.getElementById("password_error");
            if (password !== confirm_password) {
                password_Error.textContent = "Password do not match!";
                return false;

            } else {
                password_Error.textContent = "";
                return true;
            }

        }


        function myFunction() {
            var x = document.getElementById("psw");

            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function myCFunction() {
            var y = document.getElementById("cpsw");

            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }

        const nrcElement = document.getElementById('nrc');

nrcElement.addEventListener('input', function () {
    const nrcValue = nrcElement.value;

    if (nrcValue.length !== 6) {
        nrcElement.setCustomValidity('Invalid NRC number. Please enter 6 digits.');
    } else {
        nrcElement.setCustomValidity('');
    }
});
    </script>

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
    </style>

</head>

<body>
<header>
   <nav>
   <a href="../index.php" class="logo" class="active"><abbr title="Go to home page"><img src="../image/MicrosoftTeams-image (2).png" alt="Airbnb"></abbr></a>
      <!--<ul>
      <li><a href="../php/contact_us.php">Contact us</a></li>
        <li><a href="../php/FeedBack.php">FeedBack</a></li>
        <li><a href="../php/signin.php">Sign In</a></li>
      </ul>-->
    </nav>
   </header>
    <section>
        <div id="signup">
            <h1>SignUp</h1>
            <form action="#" name="myform" onsubmit="return validatePassword() " method="post">
                <label for="fname">First Name</label>
                <input type="text" name="finame" id="fname" placeholder="First Name" required><br><br>
                <label for="lname">Last Name</label>
                <input type="text" name="laname" id="lname" placeholder="Last Name" required><br><br>
                <label for="mail">Email</label>
                <input type="email" name="email" id="mail" placeholder="Email" required>
                <span>
        <?php 
        if(isset($error)){
            echo "<span style='font-size:15px;color:red;'>$error</span>";
        }
        ?>
    </span>
                <br><br>
                <label for="phone">Phone No</label>
                <input type="text" name="PhTxt" required id="phone" placeholder="Phone No"

           pattern="09[0-9]{8,9}"

           title="Please enter a valid Myanmar phone number starting with 09 and having 8 or 9 digits."><br><br>

                <!-- For NRC -->

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
               oninput="this.setCustomValidity('');">


               
            </div>
           </div>



                <label for="psw">Password</label>
                <input type="password" name="pass" id="psw" placeholder="Password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                    required><br>
                <input type="checkbox" onclick="myFunction()" ><span id="showPassword">Show Password</span><br> <br>
                <label for="cpsw">Confirm Password</label>
                <input type="password" name="cpass" id="cpsw" placeholder="Confirm Password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                    required>
                <span id="password_error"></span>

                <input type="checkbox" onclick="myCFunction()" ><span id="showPassword">Show Password</span> <br><br>
                <button id="sign" name="signup">SignUp</button><br><br>
                <!-- <button id="sign"> <a href="../php/signin.php">Already have an account? Sign in</a> </button> -->
            </form>

            <p>By Signing up, you agree to our <a href="../php/terms_of_use.php">Terms of Use.</a> You can find more
                information in our <a href="../php/privacy_policy.php">Privacy Policy.</a></p>

        </div>
    </section>
    <footer><p>&copy; 2023 Airbnb. All rights reserved. &nbsp;  <a style="font-size:20px;color:#f55;text-decoration:none;"class="style_a" href="../php/FeedBack.php">Submit FeedBack</a></p></footer>
</body>

</html>