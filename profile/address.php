<?php 
require_once __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."connection".DIRECTORY_SEPARATOR."db.php"; 
require_once __DIR__.DIRECTORY_SEPARATOR."function".DIRECTORY_SEPARATOR."func.php";
if(!isset($_SESSION["id"]) || empty($_SESSION["id"]) ){
	$_SESSION["unauthorized"] = true;
	header("Location: ../index.php");
	die();
}
/*** get previous address  */
$get_address = $db->prepare("SELECT `address` from `users` where `id` = :id");
$get_address->bindParam(":id",$_SESSION["id"]);
$get_address->execute();
$res_address = $get_address->fetch(PDO::FETCH_OBJ);
$address_db = trim($res_address->address);
if($address_db != ""){
    $title = "Update Address";
}else{
    $title = "Add Address";
}
/*** get previous address  */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile Page</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../assets/css/styles.css" />    
	<link rel="stylesheet" href="../assets/css/profile.css" />    
	<script type="text/javascript" src="../assets/js/jquery.min.js" ></script>
</head>
<body>
	<?php require_once __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."parts".DIRECTORY_SEPARATOR."navigation.php"; ?>
	<div class="container contents">
		<div class="row">
			<div class="col-md-3">
				<div class="left-area">
					<?php links(); ?>
				</div>
				<!-- div.left-area -->
			</div>
			<!-- div.col-md-3 -->
			<div class="col-md-9">
				<div class="right-area">
					<h4><?=$title;?></h4>
					<hr>
					<form method="POST" action="" id="update_address_form" enctype="multipart/form-data">
						<div class="from-group">
              <div class="address-error error">
              </div>
						</div>
						<div class="form-group">
							<!-- google api code -->
                            <input id="autocomplete" name="new_address" class="form-control" placeholder="Enter your address" onFocus="geolocate()" type="text" value="<?=$address_db; ?>"/>
							<!-- google api code -->
						</div>
						<!-- div.form-group -->
						<div class="form-group">
							<button type="button"  name="save_address" class="btn btn-success" onclick="return add_address(this.form.autocomplete.value);">Save Changes</button>
						</div>
						<!-- div.form-group -->
					</form>
					<!-- form -->
				</div>
				<!-- div.right-area -->
			</div>
			<!-- div.col-md-9 -->
		</div>
		<!-- div.row -->
	</div>	
	<!-- div.container -->
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js" ></script>
    <script type="text/javascript" src="../assets/js/simple.js"></script>
    
    <script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>
  <?php/*  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ4VYC_iEpZFRrtjIyn61W0ZpGZN1b6gg&libraries=places&callback=initAutocomplete"></script> */ ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ4VYC_iEpZFRrtjIyn61W0ZpGZN1b6gg&libraries=places&callback=initAutocomplete"
        async defer></script>
        <script type="text/javascript" src="./js/profile.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>