@extends('layouts.app')

@section('content')
<!-- Pills navs -->
<main>
    <div class="container">
       <section class="section register min-vh-100 d-flex flex-column  py-4">
          <div class="container">
            {{-- for Login users --}}
             <div class="row justify-content-center">
                {{-- align-items-center justify-content-center --}}
                <div class="col-lg-4 col-md-6 d-flex flex-column ">
                   <div class="card mb-3">
                      <div class="card-body">
                         <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Login With Your Account</h5>
                            <p class="text-center small">Enter your personal details to create account</p>
                         </div>
                         <form class="row g-3 needs-validation" method="POST" action="{{ url('login_user') }}" >
                             @csrf
                            <div class="col-12">
                               <label for="email" class="form-label">Your Email</label> <input type="email" name="email" class="form-control" id="email" required="">
                               <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                            </div>
                            
                            <div class="col-12">
                               <label for="password" class="form-label">Password</label> <input type="password" name="password" class="form-control" id="yourPassword" required="">
                               <div class="invalid-feedback">Please enter your password!</div>
                            </div>
                            
                            <div class="col-12"> <button class="btn btn-primary w-100" type="submit">Login</button></div>
                            
                         </form>
                      </div>
                   </div>
                </div>

                {{-- for Register Users --}}

                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                       <div class="card-body">
                          <div class="pt-4 pb-2">
                             <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                             <p class="text-center small">Enter your personal details to create account</p>
                          </div>
                          <form class="row g-3 needs-validation" method="POST" action="{{ url('register_user') }}">
                           @csrf
                             <div class="col-12">
                                <label for="yourName" class="form-label">Your Name</label> <input type="text" name="name" class="form-control" id="yourName" >
                                @error('name')
                                  <p class=" text-danger">{{ $message }}</p>   
                                @enderror
                                <div class="invalid-feedback">Please, enter your name!</div>
                             </div>
                             <div class="col-12">
                                <label for="yourEmail" class="form-label">Your Email</label> <input type="email" name="email" class="form-control" id="yourEmail" >
                                @error('email')
                                <p class=" text-danger">{{ $message }}</p>   
                              @enderror                            
                             </div>
                            
                             <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label> <input type="password" name="password" class="form-control" id="yourPassword" >
                                @error('password')
                                  <p class=" text-danger">{{ $message }}</p>   
                                @enderror
                             </div>
                             <div class="col-12">
                                <label for="confirmpassword">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                <p class=" text-danger">{{ $message }}</p>   
                                @enderror
                             </div>
                             <div class="col-12">
                                 <label for="latitude">Latitude:</label>
                                 <input type="text" class="form-control" id="latitude" name="latitude" required readonly>
                                 @error('latitude')
                                 <p class=" text-danger">{{ $message }}</p>   
                                 @enderror
                              </div>
                              <div class="col-12">
                                 <label for="longitude">Longitude:</label>
                                 <input type="text" class="form-control" id="longitude" name="longitude" readonly required>
                                 @error('longitude')
                                 <p class=" text-danger">{{ $message }}</p>   
                                 @enderror
                              </div>
                              
                             <div class="col-12">
                                <div class="form-check">
                                   <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" > <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                   <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                             </div>
                             <div class="col-12">
                             <button type="button" class=" btn btn-warning w-100" onclick="getLocation()">Get Current Location</button>
                             </div>
                             <div class="col-12"> <button class="btn btn-primary w-100" id="saveLocationButton" type="submit">Create Account</button></div>

                          </form>
                       </div>
                    </div>
                 </div>
             </div>
          </div>

       </section>
    </div>
    <script>
      function getLocation() {
          if (navigator.geolocation) {
            var result = window.confirm("Do you want to allow this website to access your location?");
               if (result) {
                     navigator.geolocation.getCurrentPosition(showPosition, showError);
               }
          } else {
              alert("Geolocation is not supported by this browser.");
          }
      }
      
      function showPosition(position) {
          document.getElementById("latitude").value = position.coords.latitude;
          document.getElementById("longitude").value = position.coords.longitude;
          document.getElementById("saveLocationButton").disabled = false;
      }
      
      function showError(error) {
          switch(error.code) {
              case error.PERMISSION_DENIED:
                  alert("User denied the request for Geolocation.");
                  break;
              case error.POSITION_UNAVAILABLE:
                  alert("Location information is unavailable.");
                  break;
              case error.TIMEOUT:
                  alert("The request to get user location timed out.");
                  break;
              case error.UNKNOWN_ERROR:
                  alert("An unknown error occurred.");
                  break;
          }
      }
      </script>
 </main>
  @endsection