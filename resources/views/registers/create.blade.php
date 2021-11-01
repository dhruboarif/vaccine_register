@extends('layouts.home');
@section('content')

<h1>Register for Vaccine</h1>

<!-- about -->
<div class="about m-5">
    <div class="container_width">
        <div class="row d_flex">
            <div class="col-md-7">
                <div class="titlepage text_align_left">
                    <h2>Register for Covid Vaccine </h2>
                    <p>English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for
                    </p>
                    <form method="POST" action="{{ route('registers.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        


                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" name="inputName" value="{{ old('inputName')}}" class="form-control" id="inputName" placeholder="Ariful Islam">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" value="{{ old('dob')}}" class="form-control" id="dob" placeholder="19914624902302312">
                        </div>
                        <div class="form-group">
                            <label for="inputNID">NID</label>
                            <input type="text" name="inputNID" value="{{ old('inputNID')}}" class="form-control" id="inputNID" placeholder="19914624902302312">
                        </div>

                        <div class="form-group">
                            <label for="contact">Contact No</label>
                            <input type="text" name="contact" value="{{ old('contact')}}" class="form-control" id="contact" placeholder="01824825210">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" value="{{ old('email')}}" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" name="password" value="{{ old('password')}}" minlength="8" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label for="division">Select Division:</label>
                                <select name="division" value="{{ old('division')}}" class="form-control" style="width:250px">
                                    <option value="">--- Select Division ---</option>
                                    @foreach ($division as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">Select District:</label>
                                <select name="district" class="form-control" style="width:250px">
                                    <option>--District--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="upazila">Select Upazila:</label>
                                <select name="upazila" class="form-control" style="width:250px">
                                    <option>--Upazila--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="center">Select Center:</label>
                                <select name="center" class="form-control" style="width:250px">
                                    <option>--Center--</option>
                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="about_img text_align_center">
                    <figure><img src="{{asset('images/about.png')}}" alt="#" /></figure>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end about -->

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
</script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('select[name="division"]').on('change', function() {
            var divisionID = jQuery(this).val();

            if (divisionID) {
                jQuery.ajax({
                    url: 'division/district/' + divisionID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        jQuery('select[name="district"]').empty();
                        jQuery.each(data, function(key, value) {

                            $('select[name="district"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="district"]').empty();
            }
        });
    });
</script>


<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('select[name="district"]').on('change', function() {
            var districtID = jQuery(this).val();

            if (districtID) {
                jQuery.ajax({
                    url: 'district/upazila/' + districtID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        jQuery('select[name="upazila"]').empty();
                        jQuery.each(data, function(key, value) {
                            console.log(data);
                            $('select[name="upazila"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="upazila"]').empty();
            }
        });
    });
</script>


<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('select[name="upazila"]').on('change', function() {
            var upazilaID = jQuery(this).val();
            console.log(upazilaID);

            if (upazilaID) {
                jQuery.ajax({
                    url: 'upazila/center/' + upazilaID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        jQuery('select[name="center"]').empty();
                        jQuery.each(data, function(key, value) {
                            console.log(data);
                            $('select[name="center"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="center"]').empty();
            }
        });
    });
</script>

<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyA72EhgfpH-d6VDE9SSsP5yPD0HA8N49d8",
    authDomain: "vaccine-d4467.firebaseapp.com",
    projectId: "vaccine-d4467",
    storageBucket: "vaccine-d4467.appspot.com",
    messagingSenderId: "337308668414",
    appId: "1:337308668414:web:1d5bdd9601f8546e5130af",
    measurementId: "G-HRMSL6Z5W2"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
