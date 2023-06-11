<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <!--<link rel="icon" href="web/media/logos/favicon-infyom.png" type="image/png">
    <meta name="csrf-token" content="HADFPHrfR8tLIbxFJgCkkaGC4MLYg8hl1vMI2HPc">-->
    <!-- Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!-- General CSS Files-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/third-party.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/page7f64.css?id=70b80a4e63a8a45fafdd')}}">
    <!-- CSS Libraries
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/style.css')}}">
</head>
<body>
    @include('includes.messages')

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
                <h1 class="text-center mb-7">register</h1>
                 <form method="POST"  action="{{ route('register') }}" enctype="multipart/form-data" >
                    @csrf
                   <!-- <input type="hidden" name="_token" value="HADFPHrfR8tLIbxFJgCkkaGC4MLYg8hl1vMI2HPc">-->
                    <div class="mb-sm-7 mb-4">
                        <label for="name" class="form-label">
                            name:<span class="required"></span>
                        </label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" autofocus
                        id="name"  required placeholder=" name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

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
                        
                        <div class="mb-sm-7 mb-4">
                            <div class="d-flex justify-content-between">
                                <label for="password_confirmation" class="form-label">Confirm Password:<span class="required"></span></label>
                            </div>
                    
                            <div class="mb-3 position-relative">
                                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required placeholder="Confirm Password" aria-label="Confirm Password" data-toggle="password_confirmation">
                                <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                    <i class="bi bi-eye-slash-fill"></i>
                                </span>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                    <div class="mb-sm-7 mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="tele" class="form-label">tele:<span class="required"></span></label> 
                        </div>

                        <div class="mb-3 position-relative">
                            <input name="tele" type="text" class="form-control @error('tele') is-invalid @enderror" id="tele" required
                                placeholder="tele" aria-label="tele" data-toggle="tele">
                            @error('tele')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                    <div class="mb-sm-7 mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="ville" class="form-label">ville:<span class="required"></span></label> 
                        </div>

                        <div class="mb-3 position-relative">
                            <input name="ville" type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" required
                                placeholder="ville" aria-label="ville" data-toggle="ville">
                            @error('ville')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        



                        <div>
                            <div class="d-flex iconImage ">
                                {{-- <img src="{{asset('imgs/'.$vcard->path)}}" --}}
                                  <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                  id="photo-preview"   class="rounded-circle" alt="example placeholder" style="width: 100px;"/>
                                  <label class="form-label editicon  text-white m-1" for="photo-input">
                                    <img src="/images/incons/modifier.png" class="bg-white" width="20px" />
                                  <input type="file" name="photo" class=" form-control d-none"id="photo-input" />
                                </label>
                              </div>
                        </div>

                    </div>
 
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mb-1">register</button>
                    </div>

                    <div class="d-flex align-items-center  mt-5">
                        <span class="text-gray-700 me-2">New Here?</span>
                        <a href="{{route('login')}}" class="link-info fs-6 text-decoration-none">
                           login
                        </a>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    const photoPreview = document.getElementById('photo-preview');
    const photoInput = document.getElementById('photo-input');

    photoInput.addEventListener('change', function() {
        const file = this.files[0];
        if (!file || !file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = function(event) {
            photoPreview.src = event.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>




<!-- Scripts -->
<script src="assets/js/front-third-party5252.js?id=f8c5e3b133a546fe08b8"></script>
<script src="assets/js/messages.js"></script>
<script src="assets/js/custom/helpersb093.js?id=5044ed0dbc11fd5055f3"></script>
<script src="assets/js/custom/customb712.js?id=bc95924f7cc157b27e8f"></script>
<script src="assets/js/auto_fill/auto_fill326f.js?id=52f0694384bfb239479a"></script>
<script src="assets/js/auth/auth4b13.js?id=bb2938ddc372c4dc803b"></script>
<script>
$(document).ready(function() {
    $('.alert').delay(5000).slideUp(300)
})
</script>




</body>
</html>