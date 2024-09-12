<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Oyo State College of Health Science and Technology, Eleyele, Ibadan.">
    <meta name="author" content="Oyo State College of Health Science and Technology">
    <meta name="keywords" content="Oyo State College of Health Science and Technology">

    <!-- Title Page-->
    <title>OYSHIA :: ENROLLMENT</title>

    <!-- app favicon -->
    <link rel="shortcut icon" href="{{asset('regback/favicon.png')}}">
    <!-- Icons font CSS-->
    <link href="{{asset('regback/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('regback/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('regback/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('regback/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('regback/css/main.css')}}" rel="stylesheet" media="all">
    <style>
      .bg-gra-02 {	
	background-image: url('{{ asset('regback/bg2.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;	
}

/* Success Alert */
.alert.alert-success {
        background-color: #28a745; /* Green background color */
        color: #fff; /* White text color */
        padding: 10px; /* Padding around the text */
        border-radius: 5px; /* Rounded corners */
    }

    /* Error Alert */
    .alert.alert-error {
        background-color: #dc3545; /* Red background color */
        color: #fff; /* White text color */
        padding: 10px; /* Padding around the text */
        border-radius: 5px; /* Rounded corners */
    }
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">
                    <p><img src="{{asset('regback/oyshia.jpg')}}" alt=""></p><br>
                    <h2 class="title">Registration - Basic Information</h2>
                    <form method="POST" action="{{route('enrollment-step1-save')}}">
                    @csrf                    
                    @if($errors->any())
								<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
								</div>
								
								@endif

                                <div class="row row-space">                        
                            <div class="col-2">
                                <div class="input-group">                                    
                                    <p><img src="https://oyschst.edu.ng/epayment/registration/uploads/{{ $studentData->applicationno }}.jpg" width="100" height="100" alt="profile_picture">
                                    </p>
                                    <p>If your picture is not displaying, visit the ICT immediately.</p>
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Student No</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <p>{{$studentData->applicationno}}</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Title <span style="color: red;">*</span></label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="title" id="">                                                                               
                                        <option selected value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Dr">Dr</option>
                                        
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NIN<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="text" name="nin_no" value="{{old('nin_no')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last name<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="text" name="last_name" value="{{$studentData->surname}}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First name<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="text" name="first_name" value="{{$studentData->firstname}}">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date of Birth<span style="color: red;">*</span></label>
                                    <div class="input-group-icon">
                                        @if($studentData->dob == '1/1/1970')
                                        <input class="input--style-4 js-datepicker" type="text" name="date_of_birth">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                       @else<input class="input--style-4 js-datepicker" type="text" name="date_of_birth" value="{{$studentData->daob}}">
                                       <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                       @endif
                                    </div>
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Gender<span style="color: red;">*</span></label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="gender" id="">
                                        @if(empty($studentData->programme))                                        
                                        <option selected value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        @else
                                        <option selected value="{{$studentData->programme}}">{{$studentData->programme}}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        @endif
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="email" name="email_addy" value="{{$studentData->emailaddy}}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone No<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="text" name="phone_no" value="{{$studentData->mobileno}}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">Marital Status<span style="color: red;">*</span></label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="marital_status" id="">                                                                                    
                                            <option selected value="Single">Single</option>
                                            <option value="Married">Married</option>                                            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address<span style="color: red;">*</span></label>
                                    <textarea class="input--style-4" name="address" id="">{{$studentData->address}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">State of Origin<span style="color: red;">*</span></label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="state" id="">
                                            @if(empty($studentData->state))
                                            <option value="ABIA">ABIA</option>
<option value="ADAMAWA">ADAMAWA</option>
<option value="AKWAIBOM">AKWAIBOM</option>
<option value="ANAMBRA">ANAMBRA</option>
<option value="BAUCHI">BAUCHI</option>
<option value="BAYELSA">BAYELSA</option>
<option value="BENUE">BENUE</option>
<option value="BORNO">BORNO</option>
<option value="CROSSRIVER">CROSSRIVER</option>
<option value="DELTA">DELTA</option>
<option value="EBONYI">EBONYI</option>
<option value="EDO">EDO</option>
<option value="EKITI">EKITI</option>
<option value="ENUGU">ENUGU</option>
<option value="GOMBE">GOMBE</option>
<option value="IMO">IMO</option>
<option value="JIGAWA">JIGAWA</option>
<option value="KADUNA">KADUNA</option>
<option value="KANO">KANO</option>
<option value="KASTINA">KASTINA</option>
<option value="KEBBI">KEBBI</option>
<option value="KOGI">KOGI</option>
<option value="KWARA">KWARA</option>
<option value="LAGOS">LAGOS</option>
<option value="NASSARAWA">NASSARAWA</option>
<option value="NIGER">NIGER</option>
<option value="OGUN">OGUN</option>
<option value="ONDO">ONDO</option>
<option value="OSUN">OSUN</option>
<option value="OYO">OYO</option>
<option value="PLATEAU">PLATEAU</option>
<option value="RIVERS">RIVERS</option>
<option value="SOKOTO">SOKOTO</option>
<option value="TARABA">TARABA</option>
<option value="YOBE">YOBE</option>
<option value="ZAMFARA">ZAMFARA</option>
<option value="ABUJA">ABUJA</option>

                                            @else
                                            <option value="{{$studentData->state}}">{{$studentData->state}}</option>
                                            <option value="ABIA">ABIA</option>
<option value="ADAMAWA">ADAMAWA</option>
<option value="AKWAIBOM">AKWAIBOM</option>
<option value="ANAMBRA">ANAMBRA</option>
<option value="BAUCHI">BAUCHI</option>
<option value="BAYELSA">BAYELSA</option>
<option value="BENUE">BENUE</option>
<option value="BORNO">BORNO</option>
<option value="CROSSRIVER">CROSSRIVER</option>
<option value="DELTA">DELTA</option>
<option value="EBONYI">EBONYI</option>
<option value="EDO">EDO</option>
<option value="EKITI">EKITI</option>
<option value="ENUGU">ENUGU</option>
<option value="GOMBE">GOMBE</option>
<option value="IMO">IMO</option>
<option value="JIGAWA">JIGAWA</option>
<option value="KADUNA">KADUNA</option>
<option value="KANO">KANO</option>
<option value="KASTINA">KASTINA</option>
<option value="KEBBI">KEBBI</option>
<option value="KOGI">KOGI</option>
<option value="KWARA">KWARA</option>
<option value="LAGOS">LAGOS</option>
<option value="NASSARAWA">NASSARAWA</option>
<option value="NIGER">NIGER</option>
<option value="OGUN">OGUN</option>
<option value="ONDO">ONDO</option>
<option value="OSUN">OSUN</option>
<option value="OYO">OYO</option>
<option value="PLATEAU">PLATEAU</option>
<option value="RIVERS">RIVERS</option>
<option value="SOKOTO">SOKOTO</option>
<option value="TARABA">TARABA</option>
<option value="YOBE">YOBE</option>
<option value="ZAMFARA">ZAMFARA</option>
<option value="ABUJA">ABUJA</option>

                                            @endif

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="text" name="city" value="{{old('city')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">State of Residence<span style="color: red;">*</span></label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="state1" id="">                                        
                                            <option value="OYO">OYO</option>                            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">State of Residence(LGA)<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="text" name="lga_oyo" value="{{old('lga_oyo')}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-t-15">
                            <input type="hidden" name="department" value="{{$studentData->courseselect1}}">
                            <input type="hidden" name="faculty" value="{{$faculty}}">
                            <input type="hidden" name="application_no" value="{{$studentData->applicationno}}">
                            <input type="hidden" name="level" value="{{$studentData->academiclevel}}">
                            <input type="hidden" name="academic_session" value="{{$studentData->session1}}">
                            <input type="hidden" name="lga" value="{{$studentData->lga}}">
                            <input type="hidden" name="other_name" value="{{$studentData->othername}}">
                            <button class="btn btn--radius-2 btn--green" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('regback/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('regback/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('regback/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('regback/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('regback/js/global.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->