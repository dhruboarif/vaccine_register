@extends('layouts.home');
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP Firebase App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

</head>
<body>

<section class="validOTPForm">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto m-5">
                <div class="card m-5">
                    <div class="card-header bg-dark text-white">
                        <h4 class="text-center">  
                            Phone Number verification
                        </h4>
                    </div>


                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="phone_no">Phone Number</label>

                                <input type="text" class="form-control" name="phone_no" id="number" placeholder="(Code) *******">
                            </div>
                            <div id="recaptcha-container"></div>
                                <a href="#" id="getcode" class="btn btn-danger btn-sm">Get Code</a>

                                <div class="form-group mt-4">
                                    <input type="text" name="" id="codeToVerify" name="getcode" class="form-control" placeholder="Enter Code">
                                </div>

                                <a href="#" class="btn btn-danger btn-sm btn-block" id="verifPhNum">Verify Phone No</a>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.0.1/firebase.js"></script>



    
    <script src="http://code.jquery.com/jquery-3.5.1.js"></script>
   

    <script>
$(document).ready(function() {

    const firebaseConfig = {
    apiKey: "AIzaSyA72EhgfpH-d6VDE9SSsP5yPD0HA8N49d8",
    authDomain: "vaccine-d4467.firebaseapp.com",
    projectId: "vaccine-d4467",
    storageBucket: "sail-app.test",
    messagingSenderId: "337308668414",
    appId: "1:337308668414:web:1d5bdd9601f8546e5130af",
    measurementId: "G-HRMSL6Z5W2"
  };


// Initialize Firebase
firebase.initializeApp(firebaseConfig);

window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
    'size': 'invisible',
    'callback': function (response) {
        // reCAPTCHA solved, allow signInWithPhoneNumber.
        console.log('recaptcha resolved');
    }
});
onSignInSubmit();
});


function onSignInSubmit() {
    $('#verifPhNum').on('click', function() {
        let phoneNo = '';
        var code = $('#codeToVerify').val();
        console.log(code);
        $(this).attr('disabled', 'disabled');
        window.location = 'registers/create';
        //$(this).text('Processing..');
        confirmationResult.confirm(code).then(function (result) {
                    alert('Succecss');
            window.location = 'registers/create';
            var user = result.user;
            console.log(user);
    
    
            // ...
        }.bind($(this))).catch(function (error) {
        
            // User couldn't sign in (bad verification code?)
            // ...
            $(this).removeAttr('disabled');
            $(this).text('Invalid Code');
            setTimeout(() => {
                $(this).text('Verify Phone No');
            }, 2000);
        }.bind($(this)));
    
    });
    
}

$('#getcode').on('click', function () {
        var phoneNo = $('#number').val();
        console.log(phoneNo);
        // getCode(phoneNo);
        var appVerifier = window.recaptchaVerifier;
        firebase.auth().signInWithPhoneNumber(phoneNo, appVerifier)
        .then(function (confirmationResult) {
    
            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            console.log(coderesult);
        }).catch(function (error) {
            console.log(error.message);
    
        });
    });
    </script>
</body>
</html>

@endsection