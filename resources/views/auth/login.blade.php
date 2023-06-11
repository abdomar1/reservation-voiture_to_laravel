<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
        <!--<link rel="icon" href="web/media/logos/favicon-infyom.png" type="image/png">
    <meta name="csrf-token" content="HADFPHrfR8tLIbxFJgCkkaGC4MLYg8hl1vMI2HPc">-->
    <!-- Fonts-->

    <!-- General CSS Files-->
    <link rel="stylesheet" type="text/css" href="assets/css/third-party.css">
    <link rel="stylesheet" type="text/css" href="assets/css/page7f64.css?id=70b80a4e63a8a45fafdd">


    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    
<div
class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed authImage">
<div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center p-4">
    <div class="col-12 text-center">


    </div>
    <div class="width-540">
    </div>
    <div class="d-sm-flex ms-100 mx-auto ">
        <div class="bg-white rounded-15 shadow-md min-width-540 px-5 px-sm-7 py-10 mb-sm-0 mb-5">
            <div>
                <h1 class="text-center mb-7">Sign In</h1>
                 <form method="POST"  action="{{ route('login') }}">
                    @csrf
                   <!-- <input type="hidden" name="_token" value="HADFPHrfR8tLIbxFJgCkkaGC4MLYg8hl1vMI2HPc">-->
                    <div class="mb-sm-7 mb-4">
                        <label for="email" class="form-label">
                            Email:<span class="required"></span>
                        </label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" autofocus
                        id="email" aria-describedby="emailHelp" required placeholder=" Email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-sm-7 mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="form-label">Password:<span class="required"></span></label>
                        @if (Route::has('password.request'))
                            
                            <a href="{{route('password.request') }}" class="link-info fs-6 text-decoration-none">
                                Forgot your password?
                            </a>
                        @endif
                            
                        </div>
                        <div class="mb-3 position-relative">
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" required
                                placeholder="Password" aria-label="Password" data-toggle="password">
                            <span
                                class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-sm-7 mb-4 form-check">        
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>    
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mb-1">Login</button>
                    </div>

                    <div class="d-flex align-items-center  mt-5">
                        <span class="text-gray-700 me-2">New Here?</span>
                        <a href="{{route('register')}}" class="link-info fs-6 text-decoration-none">
                            Create an Account
                        </a>
                        
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="path/to/bootstrap/js/bootstrap.min.js"></script>


<!-- Scripts -->
<script src="{{url('assets/js/front-third-party5252.js?id=f8c5e3b133a546fe08b8')}}"></script>
<script src="{{url('assets/js/messages.js')}}"></script>
<script src="{{url('assets/js/custom/helpersb093.js?id=5044ed0dbc11fd5055f3')}}"></script>
<script src="{{url('assets/js/custom/customb712.js?id=bc95924f7cc157b27e8f')}}"></script>
<script src="{{url('assets/js/auto_fill/auto_fill326f.js?id=52f0694384bfb239479a')}}"></script>
<script src="{{url('assets/js/auth/auth4b13.js?id=bb2938ddc372c4dc803b')}}"></script>
<script>
$(document).ready(function() {
    $('.alert').delay(5000).slideUp(300)
})
</script>
</body>
</html>