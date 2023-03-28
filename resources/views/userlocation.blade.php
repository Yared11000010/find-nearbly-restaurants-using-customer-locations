<!DOCTYPE html>
<html>
<head>
    <title>Get Current Location</title>
</head>
<body>
  <!-- resources/views/user-location.blade.php -->

<h1>Save User Location</h1>

<form method="POST" action="">
    @csrf
    <div>
        <label for="latitude">Latitude</label>
        <input type="text" disabled name="latitude" id="latitude">
    </div>
    <div>
        <label for="longitude">Longitude</label>
        <input type="text" disabled name="longitude" id="longitude">
    </div>
    <button type="submit">Save Location</button>
</form>

<script>
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;
        }, function(error) {
            console.log(error);
        });
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
</script>

</body>
</html>
