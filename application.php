<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Application - Dominican High School</title>
    <link rel="shortcut icon" type="image/x-icon" href="wp-content/themes/dominican/favicon.ico">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Foresite Group">

    <meta name="viewport" content="width=device-width">
    <link href='http://fonts.googleapis.com/css?family=Raleway:500|Open+Sans:300,400,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="wp-content/themes/dominican/style.css">

    <style>
      LABEL {
        margin-bottom: 0;
      }
    </style>
  </head>
  <body>
    <div class="container ninja-forms-form-wrap" style="padding: 2em 0;">

<?php
include_once "wp-config.php";
$db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME, $db);

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "DHSapplication";

$states_arr = array('AL'=>"Alabama",'AK'=>"Alaska",'AZ'=>"Arizona",'AR'=>"Arkansas",'CA'=>"California",'CO'=>"Colorado",'CT'=>"Connecticut",'DE'=>"Delaware",'DC'=>"District of Columbia",'FL'=>"Florida",'GA'=>"Georgia",'HI'=>"Hawaii",'ID'=>"Idaho",'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa",  'KS'=>"Kansas",'KY'=>"Kentucky",'LA'=>"Louisiana",'ME'=>"Maine",'MD'=>"Maryland", 'MA'=>"Massachusetts",'MI'=>"Michigan",'MN'=>"Minnesota",'MS'=>"Mississippi",'MO'=>"Missouri",'MT'=>"Montana",'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire",'NJ'=>"New Jersey",'NM'=>"New Mexico",'NY'=>"New York",'NC'=>"North Carolina",'ND'=>"North Dakota",'OH'=>"Ohio",'OK'=>"Oklahoma", 'OR'=>"Oregon",'PA'=>"Pennsylvania",'RI'=>"Rhode Island",'SC'=>"South Carolina",'SD'=>"South Dakota",'TN'=>"Tennessee",'TX'=>"Texas",'UT'=>"Utah",'VT'=>"Vermont",'VA'=>"Virginia",'WA'=>"Washington",'WV'=>"West Virginia",'WI'=>"Wisconsin",'WY'=>"Wyoming");
function showOptionsDrop($array) {
  $string = '';
  foreach($array as $k => $v) {
    $string .= '<option value="'.$k.'"'.$s.'>'.$v.'</option>'."\n";
  }
  return $string;
}
?>

<h2>Application</h2>
<br>

<?php
if (isset($_POST['submit']) && $_POST['confirmationCAP'] == "") {
  if ($_POST['grade'] != "" &&
      $_POST[md5('lastname' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('firstname' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('middlename' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('month' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('day' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('year' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST['gender'] != "" &&
      $_POST[md5('address' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('state' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('currentschool' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('gradesattended' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('schooladdress' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('schoolcity' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('schoolstate' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('schoolzip' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('schoolphone' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST['suspended'] != "" &&
      $_POST[md5('essay' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
      $_POST[md5('signature' . $_POST['ip'] . $salt . $_POST['timestamp'])] != ""
     )
  {
    date_default_timezone_set('America/Chicago');

    $ethnic = ($_POST['ethnic'] != "") ? implode(", ", $_POST['ethnic']) : "";
    $interests = ($_POST['interests'] != "") ? implode(", ", $_POST['interests']) : "";
    mysql_query("INSERT INTO application (
                 grade,
                 lastname,
                 firstname,
                 middlename,
                 dateofbirth,
                 gender,
                 address,
                 city,
                 state,
                 zip,
                 phone,
                 email,
                 ethnic,
                 language,
                 church,
                 mothertitle,
                 motherother,
                 motherlastname,
                 motherfirstname,
                 motherrelationship,
                 motheraddress,
                 mothercity,
                 motherstate,
                 motherzip,
                 motherprimaryphone,
                 motherworkphone,
                 mothercellphone,
                 motheremail,
                 motheremployment,
                 motherposition,
                 fathertitle,
                 fatherother,
                 fatherlastname,
                 fatherfirstname,
                 fatherrelationship,
                 fatheraddress,
                 fathercity,
                 fatherstate,
                 fatherzip,
                 fatherprimaryphone,
                 fatherworkphone,
                 fathercellphone,
                 fatheremail,
                 fatheremployment,
                 fatherposition,
                 sibname1,
                 sibschool1,
                 sibgrade1,
                 sibname2,
                 sibschool2,
                 sibgrade2,
                 sibname3,
                 sibschool3,
                 sibgrade3,
                 relativecurrent,
                 relativegraduate,
                 currentschool,
                 gradesattended,
                 schooladdress,
                 schoolcity,
                 schoolstate,
                 schoolzip,
                 schoolphone,
                 principal,
                 psname1,
                 psloc1,
                 psgrades1,
                 psname2,
                 psloc2,
                 psgrades2,
                 psname3,
                 psloc3,
                 psgrades3,
                 health,
                 behavior,
                 suspended,
                 suspendedexplain,
                 tshirt,
                 interests,
                 interestsother,
                 essay,
                 signature,
                 sigdate
                 ) VALUES (
                 '" . $_POST['grade'] . "',
                 '" . $_POST[md5('lastname' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('firstname' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('middlename' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('month' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "/" . $_POST[md5('day' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "/" . $_POST[md5('year' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST['gender'] . "',
                 '" . $_POST[md5('address' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('state' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $ethnic . "',
                 '" . $_POST[md5('language' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('church' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST['mothertitle'] . "',
                 '" . $_POST[md5('motherother' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('motherlastname' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('motherfirstname' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST['motherrelationship'] . "',
                 '" . $_POST[md5('motheraddress' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('mothercity' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('motherstate' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('motherzip' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('motherprimaryphone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('motherworkphone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('mothercellphone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('motheremail' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('motheremployment' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('motherposition' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST['fathertitle'] . "',
                 '" . $_POST[md5('fatherother' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fatherlastname' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fatherfirstname' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST['fatherrelationship'] . "',
                 '" . $_POST[md5('fatheraddress' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fathercity' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fatherstate' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fatherzip' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fatherprimaryphone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fatherworkphone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fathercellphone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fatheremail' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fatheremployment' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('fatherposition' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sibname1' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sibschool1' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sibgrade1' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sibname2' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sibschool2' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sibgrade2' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sibname3' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sibschool3' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sibgrade3' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('relativecurrent' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('relativegraduate' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('currentschool' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('gradesattended' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('schooladdress' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('schoolcity' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('schoolstate' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('schoolzip' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('schoolphone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('principal' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('psname1' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('psloc1' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('psgrades1' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('psname2' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('psloc2' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('psgrades2' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('psname3' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('psloc3' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('psgrades3' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('health' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('behavior' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST['suspended'] . "',
                 '" . $_POST[md5('suspendedexplain' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST['tshirt'] . "',
                 '" . $interests . "',
                 '" . $_POST[md5('interestsother' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('essay' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('signature' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                 '" . $_POST[md5('sigdate' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "'
                 )");

    $SendTo = "bengweiler@gmail.com, lippert@gmail.com";
    $Subject = "Admission Application Submitted";
    $From = "From: DHS Application <info@dominicanhighschool.com>\r\n";
    //$From .= "Reply-To: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\r\n";

    $Message = "Applying for admission to grade: " . $_POST['grade'];
    $Message .= "\nLast Name: " . $_POST[md5('lastname' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nFirst Name: " . $_POST[md5('firstname' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nMiddle Name: " . $_POST[md5('middlename' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nDate of Birth: " . $_POST[md5('month' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "/" . $_POST[md5('day' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "/" . $_POST[md5('year' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nGender: " . $_POST['gender'];

    $Message .= "\nHome Address: " . $_POST[md5('address' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nCity: " . $_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nState: " . $_POST[md5('state' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nZip Code: " . $_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nPrimary Phone: " . $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nStudent Email: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    if (!empty($ethnic)) $Message .= "\nEthnic Background: " . $ethnic;
    if (!empty($_POST[md5('language' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrimary language spoken in the home: " . $_POST[md5('language' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('church' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nName of current church or parish: " . $_POST[md5('church' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    $Message .= "\n";

    if (!empty($_POST['mothertitle'])) $Message .= "\nMother or Legal Guardian's Title: " . $_POST['mothertitle'];
    if (!empty($_POST[md5('motherother' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= " - " . $_POST[md5('motherother' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('motherlastname' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's Last Name: " . $_POST[md5('motherlastname' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('motherfirstname' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's First Name: " . $_POST[md5('motherfirstname' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST['motherrelationship'])) $Message .= "\nMother or Legal Guardian's relationship to applicant: " . $_POST['motherrelationship'];
    if (!empty($_POST[md5('motheraddress' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's Home Address: " . $_POST[md5('motheraddress' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('mothercity' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's City: " . $_POST[md5('mothercity' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('motherstate' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's State: " . $_POST[md5('motherstate' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('motherzip' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's Zip Code: " . $_POST[md5('motherzip' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('motherprimaryphone' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's Primary Phone: " . $_POST[md5('motherprimaryphone' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('motherworkphone' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's Work Phone: " . $_POST[md5('motherworkphone' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('mothercellphone' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's Cell Phone: " . $_POST[md5('mothercellphone' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('motheremail' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's Email: " . $_POST[md5('motheremail' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('motheremployment' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's Place of Employment: " . $_POST[md5('motheremployment' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('motherposition' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nMother or Legal Guardian's Position: " . $_POST[md5('motherposition' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    if (!empty($_POST['fathertitle'])) $Message .= "\nFather or Legal Guardian's Title: " . $_POST['fathertitle'];
    if (!empty($_POST[md5('fatherother' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= " - " . $_POST[md5('fatherother' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fatherlastname' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's Last Name: " . $_POST[md5('fatherlastname' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fatherfirstname' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's First Name: " . $_POST[md5('fatherfirstname' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST['fatherrelationship'])) $Message .= "\nFather or Legal Guardian's relationship to applicant: " . $_POST['fatherrelationship'];
    if (!empty($_POST[md5('fatheraddress' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's Home Address: " . $_POST[md5('fatheraddress' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fathercity' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's City: " . $_POST[md5('fathercity' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fatherstate' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's State: " . $_POST[md5('fatherstate' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fatherzip' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's Zip Code: " . $_POST[md5('fatherzip' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fatherprimaryphone' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's Primary Phone: " . $_POST[md5('fatherprimaryphone' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fatherworkphone' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's Work Phone: " . $_POST[md5('fatherworkphone' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fathercellphone' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's Cell Phone: " . $_POST[md5('fathercellphone' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fatheremail' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's Email: " . $_POST[md5('fatheremail' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fatheremployment' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's Place of Employment: " . $_POST[md5('fatheremployment' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('fatherposition' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nFather or Legal Guardian's Position: " . $_POST[md5('fatherposition' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    if (!empty($_POST[md5('sibname1' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nSibling Name: " . $_POST[md5('sibname1' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('sibschool1' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nSibling Current School: " . $_POST[md5('sibschool1' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('sibgrade1' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nSibling Grade Level: " . $_POST[md5('sibgrade1' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('sibname2' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nSibling Name: " . $_POST[md5('sibname2' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('sibschool2' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nSibling Current School: " . $_POST[md5('sibschool2' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('sibgrade2' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nSibling Grade Level: " . $_POST[md5('sibgrade2' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('sibname3' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nSibling Name: " . $_POST[md5('sibname3' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('sibschool3' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nSibling Current School: " . $_POST[md5('sibschool3' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('sibgrade3' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nSibling Grade Level: " . $_POST[md5('sibgrade3' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    if (!empty($_POST[md5('relativecurrent' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nRelative currently attending DHS: " . $_POST[md5('relativecurrent' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('relativegraduate' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nRelative who graduated from DHS: " . $_POST[md5('relativegraduate' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    $Message .= "\n";

    $Message .= "\nCurrent School: " . $_POST[md5('currentschool' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nCurrent School Grades Attended: " . $_POST[md5('gradesattended' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nCurrent School Address: " . $_POST[md5('schooladdress' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nCurrent School City: " . $_POST[md5('schoolcity' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nCurrent School State: " . $_POST[md5('schoolstate' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nCurrent School Zip Code: " . $_POST[md5('schoolzip' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nCurrent School Phone: " . $_POST[md5('schoolphone' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('principal' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nCurrent School Principal: " . $_POST[md5('principal' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    if (!empty($_POST[md5('psname1' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrevious School Name: " . $_POST[md5('psname1' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('psloc1' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrevious School Location: " . $_POST[md5('psloc1' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('psgrades1' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrevious School Grades Attended: " . $_POST[md5('psgrades1' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('psname2' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrevious School Name: " . $_POST[md5('psname2' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('psloc2' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrevious School Location: " . $_POST[md5('psloc2' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('psgrades2' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrevious School Grades Attended: " . $_POST[md5('psgrades2' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('psname3' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrevious School Name: " . $_POST[md5('psname3' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('psloc3' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrevious School Location: " . $_POST[md5('psloc3' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('psgrades3' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nPrevious School Grades Attended: " . $_POST[md5('psgrades3' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    if (!empty($_POST[md5('health' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\n\nIllness, diseases or physical disabilities that have affected or may affect the applicant's general health, school work or participation\n" . $_POST[md5('health' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    if (!empty($_POST[md5('behavior' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\n\nBehavioral, psychological or educational evaluations, treatments or interventions currently in place as part of the student's academic support system such as an IEP or 504\n" . $_POST[md5('behavior' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\n\nHas the applicant ever been suspended from any school or asked to leave? " . $_POST['suspended'];
    if (!empty($_POST[md5('suspendedexplain' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nIf yes, please explain\n" . $_POST[md5('suspendedexplain' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    $Message .= "\n";

    if (!empty($_POST[md5('tshirt' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nApplicant t-shirt size: " . $_POST[md5('tshirt' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    if (!empty($interests)) $Message .= "\nCo-curricular interests: " . $interests;
    if (!empty($_POST[md5('interestsother' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= " - " . $_POST[md5('interestsother' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    $Message .= "\n\nEssay\n" . $_POST[md5('essay' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    //$Message .= "\n\nEntrance Exam School: " . $_POST['score'];

    $Message .= "\nParent/Guardian Electronic Signature: " . $_POST[md5('signature' . $_POST['ip'] . $salt . $_POST['timestamp'])];
    $Message .= "\nDate: " . $_POST[md5('sigdate' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    $Message = stripslashes($Message);

    mail($SendTo, $Subject, $Message, $From);
    //echo "<pre>$Message</pre><br><br>";

    echo "
    Success! We have received your Student Application!<br>
    <br>

    Thank you for starting the Student Application process. Your information will be reviewed.<br>
    <br>

    In order to complete the Student Application process, please pay the one time Student Application Fee.<br>
    <br>

    Go <a title=\"Donate\" href=\"http://www.dominicanhighschool.com/alumni-friends/donate/\">here</a> and pay the Student Application Fee.<br>
    <br>

    If you have any questions or concerns please contact the Admissions Department at Dominican High School.<br>
    Ben Weiler<br>
    Director of Admissions<br>
    414-332-1170 ex 130<br>
    <a href=\"mailto:bweiler@dominicanhighschool.com\">bweiler@dominicanhighschool.com</a>
    ";
  } else {
    echo "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";
  }
} else {
?>
  If you prefer, <a href="wp-content/uploads/2015/07/Dominican_Application.pdf" target="new">download and print a paper application</a> and print the <a href="wp-content/uploads/2015/07/Records_Request.pdf" target="new">Records Request Form</a>. The paper application should be sent to Dominican at 120 E. Silver Spring Dr. Whitefish Bay WI 53217 and the Records Request form should be submitted to the applicant's current school.<br>
  <br>

  <script type="text/javascript">
    function checkRadio(field) { for(var i=0; i < field.length; i++) { if(field[i].checked) return field[i].value; } return false; }

    function checkform (form) {
      if (checkRadio(form.grade) == "") { alert('Grade required.'); return false; }
      if (document.getElementById('lastname').value == "") { alert('Last Name required.'); document.getElementById('lastname').focus(); return false ; }
      if (document.getElementById('firstname').value == "") { alert('First Name required.'); document.getElementById('firstname').focus(); return false ; }
      if (document.getElementById('middlename').value == "") { alert('Middle Name required.'); document.getElementById('middlename').focus(); return false ; }
      if (document.getElementById('month').value == "") { alert('Date of Birth (month) required.'); document.getElementById('month').focus(); return false ; }
      if (document.getElementById('day').value == "") { alert('Date of Birth (day) required.'); document.getElementById('day').focus(); return false ; }
      if (document.getElementById('year').value == "") { alert('Date of Birth (year) required.'); document.getElementById('year').focus(); return false ; }
      if (checkRadio(form.gender) == "") { alert('Gender required.'); return false; }
      if (document.getElementById('address').value == "") { alert('Address required.'); document.getElementById('address').focus(); return false ; }
      if (document.getElementById('city').value == "") { alert('City required.'); document.getElementById('city').focus(); return false ; }
      if (document.getElementById('state').value == "") { alert('State required.'); document.getElementById('state').focus(); return false ; }
      if (document.getElementById('zip').value == "") { alert('Zip Code required.'); document.getElementById('zip').focus(); return false ; }
      if (document.getElementById('phone').value == "") { alert('Primary Phone required.'); document.getElementById('phone').focus(); return false ; }
      if (document.getElementById('email').value == "") { alert('Email required.'); document.getElementById('email').focus(); return false ; }
      if (document.getElementById('currentschool').value == "") { alert('Current School required.'); document.getElementById('currentschool').focus(); return false ; }
      if (document.getElementById('gradesattended').value == "") { alert('Grades Attended required.'); document.getElementById('gradesattended').focus(); return false ; }
      if (document.getElementById('schooladdress').value == "") { alert('School Address required.'); document.getElementById('schooladdress').focus(); return false ; }
      if (document.getElementById('schoolcity').value == "") { alert('School City required.'); document.getElementById('schoolcity').focus(); return false ; }
      if (document.getElementById('schoolstate').value == "") { alert('School State required.'); document.getElementById('schoolstate').focus(); return false ; }
      if (document.getElementById('schoolzip').value == "") { alert('School Zip Code required.'); document.getElementById('schoolzip').focus(); return false ; }
      if (document.getElementById('schoolphone').value == "") { alert('School Phone required.'); document.getElementById('schoolphone').focus(); return false ; }
      if (checkRadio(form.suspended) == "") { alert('Please answer the question "Has the applicant ever been suspended from any school or asked to leave?".'); return false; }
      if (document.getElementById('essay').value == "") { alert('Essay required.'); document.getElementById('essay').focus(); return false ; }
      // if (checkRadio(form.score) == "") { alert('Please select a school to take an entrance exam.'); return false; }
      if (document.getElementById('signature').value == "") { alert('Parent/Guardian Electronic Signature required.'); document.getElementById('signature').focus(); return false ; }
      return true ;
    }
  </script>

  <form action="application.php" method="POST" onSubmit="return checkform(this)">
    <div>
      <em>Fields marked with a <span style="color: #F00;">*</span> are required.</em><br>
      <br>

      <h4>Student Information</h4>

      <label>Applying for Admission to grade <span style="color: #F00;">*</span></label>
      <input type="radio" name="grade" value="9" style="margin-left: 0.5em;"> 9
      <input type="radio" name="grade" value="10" style="margin-left: 1.5em;"> 10
      <input type="radio" name="grade" value="11" style="margin-left: 1.5em;"> 11
      <input type="radio" name="grade" value="12" style="margin-left: 1.5em;"> 12<br>
      <br>

      <div style="float: left; margin-right: 2em">
        <strong>Last Name <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("lastname" . $ip . $salt . $timestamp); ?>" style="width: 250px;" id="lastname">
      </div>

      <div style="float: left; margin-right: 2em;">
        <strong>First Name <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("firstname" . $ip . $salt . $timestamp); ?>" style="width: 250px;" id="firstname">
      </div>

      <div style="float: left;">
        <strong>Middle Name <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("middlename" . $ip . $salt . $timestamp); ?>" style="width: 250px;" id="middlename">
      </div>

      <div style="clear: both; height: 2em;"></div>

      <div style="float: left; width: 50%;">
        <strong>Date of Birth <span style="color: #F00;">*</span></strong>
        <select name="<?php echo md5("month" . $ip . $salt . $timestamp); ?>" id="month">
          <option value=""></option>
          <?php foreach(range('1', '12') as $m) : ?>
          <option value="<?php echo $m; ?>"><?php echo $m ?></option>
          <?php endforeach; ?>
        </select>
        /
        <select name="<?php echo md5("day" . $ip . $salt . $timestamp); ?>" id="day">
          <option value=""></option>
          <?php foreach(range('1', '31') as $d) : ?>
          <option value="<?php echo $d; ?>"><?php echo $d ?></option>
          <?php endforeach; ?>
        </select>
        /
        <select name="<?php echo md5("year" . $ip . $salt . $timestamp); ?>" id="year">
          <option value=""></option>
          <?php foreach(range(date("Y")-10, date("Y")-20) as $y) : ?>
          <option value="<?php echo $y; ?>"><?php echo $y ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div style="float: left;">
        <strong>Gender <span style="color: #F00;">*</span></strong>
        Male <input type="radio" name="gender" value="Male" style="margin-right: 1.5em;">
        Female <input type="radio" name="gender" value="Female">
      </div>

      <div style="clear: both; height: 3em;"></div>

      <strong>Home Address <span style="color: #F00;">*</span></strong><br>
      <input type="text" name="<?php echo md5("address" . $ip . $salt . $timestamp); ?>" style="width: 550px;" id="address"><br>
      <br>

      <div style="float: left; margin-right: 2em;">
        <strong>City <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("city" . $ip . $salt . $timestamp); ?>" style="width: 250px;" id="city">
      </div>

      <div style="float: left; margin-right: 2em;">
        <strong>State <span style="color: #F00;">*</span></strong><br>
        <select name="<?php echo md5("state" . $ip . $salt . $timestamp); ?>" id="state">
          <option value=""></option>
          <?php echo showOptionsDrop($states_arr); ?>
        </select>
      </div>

      <div style="float: left;">
        <strong>Zip Code <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("zip" . $ip . $salt . $timestamp); ?>" style="width: 100px;" id="zip">
      </div>

      <div style="clear: both;"></div><br>

      <div style="float: left; margin-right: 2em;">
        <strong>Primary Phone <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("phone" . $ip . $salt . $timestamp); ?>" style="width: 250px;" id="phone">
      </div>

      <div style="float: left;">
        <strong>Student Email <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" style="width: 250px;" id="email">
      </div>

      <div style="clear: both;"></div><br>
      <br>

      <strong>Ethnic Background</strong><br>
      <input type="checkbox" name="ethnic[]" value="African American"> African American
      <input type="checkbox" name="ethnic[]" value="Hispanic" style="margin-left: 1.5em;"> Hispanic
      <input type="checkbox" name="ethnic[]" value="Caucasian" style="margin-left: 1.5em;"> Caucasian
      <input type="checkbox" name="ethnic[]" value="Asian or Pacific Islander" style="margin-left: 1.5em;"> Asian or Pacific Islander
      <input type="checkbox" name="ethnic[]" value="American Indian/Eskimo" style="margin-left: 1.5em;"> American Indian/Eskimo
      <input type="checkbox" name="ethnic[]" value="Other" style="margin-left: 1.5em;"> Other<br>
      <br>

      <div style="float: left; margin-right: 3em;">
        <strong>Primary language spoken in the home</strong><br>
        <input type="text" name="<?php echo md5("language" . $ip . $salt . $timestamp); ?>" style="width: 300px;">
      </div>

      <div style="float: left;">
        <strong>Name of current church or parish</strong><br>
        <input type="text" name="<?php echo md5("church" . $ip . $salt . $timestamp); ?>" style="width: 300px;">
      </div>

      <div style="clear: both;"></div><br>
      <br>


      <h4>Family Information</h4>
      <strong>Mother or Legal Guardian</strong>
      <input type="radio" name="mothertitle" value="Ms." style="margin-left: 0.5em;"> Ms.
      <input type="radio" name="mothertitle" value="Mrs." style="margin-left: 1.5em;"> Mrs.
      <input type="radio" name="mothertitle" value="Dr." style="margin-left: 1.5em;"> Dr.
      <input type="radio" name="mothertitle" value="Other" style="margin-left: 1.5em;"> Other <input type="text" name="<?php echo md5("motherother" . $ip . $salt . $timestamp); ?>" style="width: 200px;"><br>
      <br>

      <div style="float: left; margin-right: 2em;">
        <strong>Last Name</strong><br>
        <input type="text" name="<?php echo md5("motherlastname" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left;">
        <strong>First Name</strong><br>
        <input type="text" name="<?php echo md5("motherfirstname" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="clear: both;"></div><br>

      <strong>Relationship to applicant</strong>
      <input type="radio" name="motherrelationship" value="Mother" style="margin-left: 0.5em;"> Mother
      <input type="radio" name="motherrelationship" value="Stepmother" style="margin-left: 1.5em;"> Stepmother
      <input type="radio" name="motherrelationship" value="Legal guardian" style="margin-left: 1.5em;"> Legal guardian<br>
      <br>

      <strong>Home Address</strong><br>
      <input type="text" name="<?php echo md5("motheraddress" . $ip . $salt . $timestamp); ?>" style="width: 550px;"><br>
      <br>

      <div style="float: left; margin-right: 2em;">
        <strong>City</strong><br>
        <input type="text" name="<?php echo md5("mothercity" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left; margin-right: 2em;">
        <strong>State</strong><br>
        <select name="<?php echo md5("motherstate" . $ip . $salt . $timestamp); ?>">
          <option value=""></option>
          <?php echo showOptionsDrop($states_arr); ?>
        </select>
      </div>

      <div style="float: left;">
        <strong>Zip Code</strong><br>
        <input type="text" name="<?php echo md5("motherzip" . $ip . $salt . $timestamp); ?>" style="width: 100px;">
      </div>

      <div style="clear: both;"></div><br>

      <div style="float: left; margin-right: 2em;">
        <strong>Primary Phone</strong><br>
        <input type="text" name="<?php echo md5("motherprimaryphone" . $ip . $salt . $timestamp); ?>" style="width: 150px;">
      </div>

      <div style="float: left; margin-right: 2em;">
        <strong>Work Phone</strong><br>
        <input type="text" name="<?php echo md5("motherworkphone" . $ip . $salt . $timestamp); ?>" style="width: 150px;">
      </div>

      <div style="float: left;">
        <strong>Cell Phone</strong><br>
        <input type="text" name="<?php echo md5("mothercellphone" . $ip . $salt . $timestamp); ?>" style="width: 150px;">
      </div>

      <div style="clear: both;"></div><br>

      <div style="float: left; margin-right: 2em;">
        <strong>Email</strong><br>
        <input type="text" name="<?php echo md5("motheremail" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left; margin-right: 2em;">
        <strong>Place of Employment</strong><br>
        <input type="text" name="<?php echo md5("motheremployment" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left;">
        <strong>Position</strong><br>
        <input type="text" name="<?php echo md5("motherposition" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="clear: both;"></div><br>
      <br>
      <br>

      <strong>Father or Legal Guardian</strong>
      <input type="radio" name="fathertitle" value="Mr." style="margin-left: 0.5em;"> Mr.
      <input type="radio" name="fathertitle" value="Dr." style="margin-left: 1.5em;"> Dr.
      <input type="radio" name="fathertitle" value="Other" style="margin-left: 1.5em;"> Other <input type="text" name="<?php echo md5("fatherother" . $ip . $salt . $timestamp); ?>" style="width: 200px;"><br>
      <br>

      <div style="float: left; margin-right: 2em;">
        <strong>Last Name</strong><br>
        <input type="text" name="<?php echo md5("fatherlastname" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left;">
        <strong>First Name</strong><br>
        <input type="text" name="<?php echo md5("fatherfirstname" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="clear: both;"></div><br>

      <strong>Relationship to applicant</strong>
      <input type="radio" name="fatherrelationship" value="Father" style="margin-left: 0.5em;"> Father
      <input type="radio" name="fatherrelationship" value="Stepfather" style="margin-left: 1.5em;"> Stepfather
      <input type="radio" name="fatherrelationship" value="Legal guardian" style="margin-left: 1.5em;"> Legal guardian<br>
      <br>

      <strong>Home Address</strong><br>
      <input type="text" name="<?php echo md5("fatheraddress" . $ip . $salt . $timestamp); ?>" style="width: 550px;"><br>
      <br>

      <div style="float: left; margin-right: 2em;">
        <strong>City</strong><br>
        <input type="text" name="<?php echo md5("fathercity" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left; margin-right: 2em;">
        <strong>State</strong><br>
        <select name="<?php echo md5("fatherstate" . $ip . $salt . $timestamp); ?>">
          <option value=""></option>
          <?php echo showOptionsDrop($states_arr); ?>
        </select>
      </div>

      <div style="float: left;">
        <strong>Zip Code</strong><br>
        <input type="text" name="<?php echo md5("fatherzip" . $ip . $salt . $timestamp); ?>" style="width: 100px;">
      </div>

      <div style="clear: both;"></div><br>

      <div style="float: left; margin-right: 2em;">
        <strong>Primary Phone</strong><br>
        <input type="text" name="<?php echo md5("fatherprimaryphone" . $ip . $salt . $timestamp); ?>" style="width: 150px;">
      </div>

      <div style="float: left; margin-right: 2em;">
        <strong>Work Phone</strong><br>
        <input type="text" name="<?php echo md5("fatherworkphone" . $ip . $salt . $timestamp); ?>" style="width: 150px;">
      </div>

      <div style="float: left;">
        <strong>Cell Phone</strong><br>
        <input type="text" name="<?php echo md5("fathercellphone" . $ip . $salt . $timestamp); ?>" style="width: 150px;">
      </div>

      <div style="clear: both;"></div><br>

      <div style="float: left; margin-right: 2em;">
        <strong>Email</strong><br>
        <input type="text" name="<?php echo md5("fatheremail" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left; margin-right: 2em;">
        <strong>Place of Employment</strong><br>
        <input type="text" name="<?php echo md5("fatheremployment" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left;">
        <strong>Position</strong><br>
        <input type="text" name="<?php echo md5("fatherposition" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="clear: both;"></div><br>
      <br>
      <br>

      <strong>Sibling Information</strong><br>
      <div style="float: left; margin-right: 2em;">
        Name<br>
        <input type="text" name="<?php echo md5("sibname1" . $ip . $salt . $timestamp); ?>" style="width: 250px;"><br>
        <input type="text" name="<?php echo md5("sibname2" . $ip . $salt . $timestamp); ?>" style="width: 250px; margin: 0.4em 0;"><br>
        <input type="text" name="<?php echo md5("sibname3" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left; margin-right: 2em;">
        Current School<br>
        <input type="text" name="<?php echo md5("sibschool1" . $ip . $salt . $timestamp); ?>" style="width: 250px;"><br>
        <input type="text" name="<?php echo md5("sibschool2" . $ip . $salt . $timestamp); ?>" style="width: 250px; margin: 0.4em 0;"><br>
        <input type="text" name="<?php echo md5("sibschool3" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left;">
        Grade Level<br>
        <input type="text" name="<?php echo md5("sibgrade1" . $ip . $salt . $timestamp); ?>" style="width: 80px;"><br>
        <input type="text" name="<?php echo md5("sibgrade2" . $ip . $salt . $timestamp); ?>" style="width: 80px; margin: 0.4em 0;"><br>
        <input type="text" name="<?php echo md5("sibgrade3" . $ip . $salt . $timestamp); ?>" style="width: 80px;">
      </div>

      <div style="clear: both;"></div><br>
      <br>

      <strong>Please list the name of any relative who currently attend Dominican High School</strong><br>
      <input type="text" name="<?php echo md5("relativecurrent" . $ip . $salt . $timestamp); ?>" style="width: 560px;"><br>
      <br>

      <strong>Please list the name of any relative who graduated from Dominican High School</strong><br>
      <input type="text" name="<?php echo md5("relativegraduate" . $ip . $salt . $timestamp); ?>" style="width: 560px;"><br>
      <br>
      <br>

      <h4>Educational Background</h4>
      <div style="float: left; margin-right: 2em;">
        <strong>Current School <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("currentschool" . $ip . $salt . $timestamp); ?>" style="width: 250px;" id="currentschool">
      </div>

      <div style="float: left;">
        <strong>Grades attended <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("gradesattended" . $ip . $salt . $timestamp); ?>" style="width: 100px;" id="gradesattended">
      </div>

      <div style="clear: both;"></div><br>

      <strong>School Address <span style="color: #F00;">*</span></strong><br>
      <input type="text" name="<?php echo md5("schooladdress" . $ip . $salt . $timestamp); ?>" style="width: 550px;" id="schooladdress"><br>
      <br>

      <div style="float: left; margin-right: 2em;">
        <strong>City <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("schoolcity" . $ip . $salt . $timestamp); ?>" style="width: 250px;" id="schoolcity">
      </div>

      <div style="float: left; margin-right: 2em;">
        <strong>State <span style="color: #F00;">*</span></strong><br>
        <select name="<?php echo md5("schoolstate" . $ip . $salt . $timestamp); ?>" id="schoolstate">
          <option value=""></option>
          <?php echo showOptionsDrop($states_arr); ?>
        </select>
      </div>

      <div style="float: left;">
        <strong>Zip Code <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("schoolzip" . $ip . $salt . $timestamp); ?>" style="width: 100px;" id="schoolzip">
      </div>

      <div style="clear: both;"></div><br>

      <div style="float: left; margin-right: 2em;">
        <strong>Phone <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("schoolphone" . $ip . $salt . $timestamp); ?>" style="width: 250px;" id="schoolphone">
      </div>

      <div style="float: left;">
        <strong>Principal</strong><br>
        <input type="text" name="<?php echo md5("principal" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="clear: both;"></div><br>

      <strong>Previous School(s)</strong><br>
      <div style="float: left; margin-right: 2em;">
        Name<br>
        <input type="text" name="<?php echo md5("psname1" . $ip . $salt . $timestamp); ?>" style="width: 250px;"><br>
        <input type="text" name="<?php echo md5("psname2" . $ip . $salt . $timestamp); ?>" style="width: 250px; margin: 0.4em 0;"><br>
        <input type="text" name="<?php echo md5("psname3" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left; margin-right: 2em;">
        Location<br>
        <input type="text" name="<?php echo md5("psloc1" . $ip . $salt . $timestamp); ?>" style="width: 250px;"><br>
        <input type="text" name="<?php echo md5("psloc2" . $ip . $salt . $timestamp); ?>" style="width: 250px; margin: 0.4em 0;"><br>
        <input type="text" name="<?php echo md5("psloc3" . $ip . $salt . $timestamp); ?>" style="width: 250px;">
      </div>

      <div style="float: left;">
        Grades Attended<br>
        <input type="text" name="<?php echo md5("psgrades1" . $ip . $salt . $timestamp); ?>" style="width: 110px;"><br>
        <input type="text" name="<?php echo md5("psgrades2" . $ip . $salt . $timestamp); ?>" style="width: 110px; margin: 0.4em 0;"><br>
        <input type="text" name="<?php echo md5("psgrades3" . $ip . $salt . $timestamp); ?>" style="width: 110px;">
      </div>

      <div style="clear: both;"></div><br>
      <br>

      <strong>Describe any illness, diseases or physical disabilities that have affected or may affect the applicant's general health, school work or participation</strong><br>
      <textarea name="<?php echo md5("health" . $ip . $salt . $timestamp); ?>" rows="3" cols="30" style="width: 99%; height: 7em;"></textarea><br>
      <br>

      <strong>Please list any behavioral, psychological or educational evaluations, treatments or interventions currently in place as part of the student's academic support system such as an IEP or 504</strong><br>
      <textarea name="<?php echo md5("behavior" . $ip . $salt . $timestamp); ?>" rows="3" cols="30" style="width: 99%; height: 7em;"></textarea><br>
      <br>

      <strong>Has the applicant ever been suspended from any school or asked to leave? <span style="color: #F00;">*</span></strong><br>
      <input type="radio" name="suspended" value="Yes"> Yes
      <input type="radio" name="suspended" value="No" style="margin-left: 1.5em;"> No<br>
      <br>

      <strong>If yes, please explain</strong><br>
      <textarea name="<?php echo md5("suspendedexplain" . $ip . $salt . $timestamp); ?>" rows="3" cols="30" style="width: 99%; height: 7em;"></textarea><br>
      <br>
      <br>

      <h4>Additional Applicant Information</h4>
      <strong>Applicant t-shirt size</strong>
      <input type="radio" name="tshirt" value="S" style="margin-left: 0.5em;"> S
      <input type="radio" name="tshirt" value="M" style="margin-left: 1.5em;"> M
      <input type="radio" name="tshirt" value="L" style="margin-left: 1.5em;"> L
      <input type="radio" name="tshirt" value="XL" style="margin-left: 1.5em;"> XL<br>
      <br>

      <strong>Indicate co-curricular interests</strong><br>
      <input type="checkbox" name="interests[]" value="Art"> Art
      <input type="checkbox" name="interests[]" value="Band" style="margin-left: 1.5em;"> Band
      <input type="checkbox" name="interests[]" value="Baseball" style="margin-left: 1.5em;"> Baseball
      <input type="checkbox" name="interests[]" value="Basketball" style="margin-left: 1.5em;"> Basketball
      <input type="checkbox" name="interests[]" value="Cheerleading" style="margin-left: 1.5em;"> Cheerleading
      <input type="checkbox" name="interests[]" value="Choir" style="margin-left: 1.5em;"> Choir
      <input type="checkbox" name="interests[]" value="Computer Science" style="margin-left: 1.5em;"> Computer Science<br>
      <input type="checkbox" name="interests[]" value="Drama"> Drama
      <input type="checkbox" name="interests[]" value="Football" style="margin-left: 1.5em;"> Football
      <input type="checkbox" name="interests[]" value="Golf" style="margin-left: 1.5em;"> Golf
      <input type="checkbox" name="interests[]" value="Service Projects/Trips" style="margin-left: 1.5em;"> Service Projects/Trips
      <input type="checkbox" name="interests[]" value="Soccer" style="margin-left: 1.5em;"> Soccer
      <input type="checkbox" name="interests[]" value="Softball" style="margin-left: 1.5em;"> Softball<br>
      <input type="checkbox" name="interests[]" value="Student Government"> Student Government
      <input type="checkbox" name="interests[]" value="Tennis" style="margin-left: 1.5em;"> Tennis
      <input type="checkbox" name="interests[]" value="Track" style="margin-left: 1.5em;"> Track
      <input type="checkbox" name="interests[]" value="Volleyball" style="margin-left: 1.5em;"> Volleyball
      <input type="checkbox" name="interests[]" value="Other" style="margin-left: 1.5em;"> Other <input type="text" name="<?php echo md5("interestsother" . $ip . $salt . $timestamp); ?>" style="width: 150px;"><br>
      <br>
      <br>

      <strong>Essay: The student who is applying for admission must respond to the following prompt with an essay. <span style="color: #F00;">*</span></strong><br>
      <em>Students who attend Dominican are provided with the opportunity to reap the benefits of a rigorous, faith based, college preparatory school environment. However, we also believe that it is important that each student finds meaningful ways to contribute to the creation of the unique family environment that is Dominican High School's foundation. This means that Dominican students are expected to take on leadership roles in academic programs, extracurricular activities, faith-based initiatives, and every day hallway interactions. In your first year at Dominican, how will your leadership help to make the Dominican community stronger?</em><br>
      <textarea name="<?php echo md5("essay" . $ip . $salt . $timestamp); ?>" rows="3" cols="30" style="width: 99%; height: 15em;" id="essay"></textarea><br>
      <br>

      <!--All applicants are required to take an entrance exam. While you are encouraged to take the test at the school that is your top preference, you may sit for the exam at any of the following schools. Please indicate at which school you have already or will register for an entrance exam. To register to take an entrance exam, please contact that school's admissions department.<br>
      <br>

      While one set of entrance exam results may be used for all of the schools listed below, you must complete a separate application for each school to which you wish to be admitted.<br>
      <br>

      <strong>By marking any of the following, you grant permission for your score to be shared between schools. It is not permissible to take the exam at more than one school, and only your first scores will be considered by any school. <span style="color: #F00;">*</span></strong><br>
      <input type="radio" name="score" value="Dominican High School"> Dominican High School<br>
      <input type="radio" name="score" value="Catholic Memorial High School"> Catholic Memorial High School<br>
      <input type="radio" name="score" value="Divine Savior Holy Angels High School"> Divine Savior Holy Angels High School<br>
      <input type="radio" name="score" value="Messmer High School"> Messmer High School<br>
      <input type="radio" name="score" value="Marquette University High School"> Marquette University High School<br>
      <input type="radio" name="score" value="PIUS XI High School"> PIUS XI High School<br>
      <input type="radio" name="score" value="St. Thomas More High School"> St. Thomas More High School<br>
      <input type="radio" name="score" value="St. Joan Antida High School"> St. Joan Antida High School<br>
      <br>-->

      As the parent(s) or Guardian of the student applicant I understand that the enclosed application fee is non-refundable. I further understand and acknowledge that continued enrollment of my/our child, if admitted to the school, shall be subject to the payment of all tuition and fees set forth on the schedule of tuition and fees as periodically amended by Dominican High School and my/our child's compliance with the code of conduct and policies established by Dominican High School.<br>

      <div style="float: left; margin-right: 2em;">
        <strong>Parent/Guardian Electronic Signature <span style="color: #F00;">*</span></strong><br>
        <input type="text" name="<?php echo md5("signature" . $ip . $salt . $timestamp); ?>" style="width: 300px;" id="signature">
      </div>

      <div style="float: left;">
        <strong>Date</strong><br>
        <input type="text" name="<?php echo md5("sigdate" . $ip . $salt . $timestamp); ?>" style="width: 100px;">
      </div>

      <div style="clear: both;"></div><br>

      <input type="text" name="confirmationCAP" style="display: none;"> <?php // Non-displaying field as a sort of invisible CAPTCHA. ?>

      <input type="hidden" name="ip" value="<?php echo $ip; ?>">
      <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

      <input type="submit" name="submit" value="Submit" style="display: block; margin: 0 auto;">
    </div>
  </form>
<?php } ?>

    </div>
  </body>
</html>