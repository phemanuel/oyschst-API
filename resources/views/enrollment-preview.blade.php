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

    .custom-text {
    color: black;
    font-size: 14px;
}
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">
                    <p><img src="{{asset('regback/oyshia.jpg')}}" alt=""></p><br>
                    @if(session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                    @elseif(session('error'))
                                                    <div class="alert alert-error">
                                                        {{ session('error') }}
                                                    </div>
                                                    @endif  
                    <h2 class="title">Registration - Basic Information</h2>
                    <form method="POST" action="{{route('enrollment-step2-save', ['id'=> $checkEnrollment->id])}}">
                    @csrf
                    @method('PUT')
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
                                    <p><img src="https://oyschst.edu.ng/epayment/registration/uploads/{{ $checkEnrollment->application_no }}.jpg" width="100" height="100" alt="profile_picture">
                                    </p>
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Student No</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <p class="custom-text">{{$checkEnrollment->application_no}}</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Title </label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                <p class="custom-text">{{$checkEnrollment->title}}</p>
                                </div>
                            </div>
                        </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NIN</label>
                                    <p class="custom-text">{{$checkEnrollment->nin_no}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last name</label>
                                    <p class="custom-text">{{$checkEnrollment->surname}}</p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First name</label>
                                    <p class="custom-text">{{$checkEnrollment->first_name}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date of Birth</label>
                                    <div class="input-group-icon">
                                    <p class="custom-text">{{$checkEnrollment->date_of_birth}}</p>
                                    </div>
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Gender</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                <p class="custom-text">{{$checkEnrollment->sex}}</p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <p class="custom-text">{{$checkEnrollment->email1}}</p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone No</label>
                                    <p class="custom-text">{{$checkEnrollment->phone1}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">Marital Status</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                    <p class="custom-text">{{$checkEnrollment->marital_status}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <p class="custom-text">{{$checkEnrollment->address1}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">State of Origin</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                    <p class="custom-text">{{$checkEnrollment->state_of_origin}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <p class="custom-text">{{$checkEnrollment->city}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">State of Residence</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                    <p class="custom-text">{{$checkEnrollment->state}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">State of Residence(LGA)</label>
                                    <p class="custom-text">{{$checkEnrollment->lga_oyo}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <h2 class="title">Next of Kin Information</h2>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Full name</label>
                                    <p class="custom-text">{{$checkEnrollment->next_of_kin_fullname}}</p>
                                </div>
                            </div>                            
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">Relationship</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                    <p class="custom-text">{{$checkEnrollment->next_of_kin_relationship}}</p>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email Address</label>
                                    <p class="custom-text">{{$checkEnrollment->next_of_kin_email}}</p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone No</label>
                                    <p class="custom-text">{{$checkEnrollment->next_of_kin_phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">                            
                        <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">State</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                    <p class="custom-text">{{$checkEnrollment->next_of_kin_state}}</p>
                                    </div>
                                    </div>
                                    </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <p class="custom-text">{{$checkEnrollment->next_of_kin_city}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <p class="custom-text">{{$checkEnrollment->next_of_kin_address1}}</p>
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Gender</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                <p class="custom-text">{{$checkEnrollment->next_of_kin_gender}}</p>
                                </div>
                            </div>
                        </div>

                        
                        <div class="p-t-15">
                        <a href="{{ route('enrollment', ['id' => $checkEnrollment->application_no]) }}" class="btn btn--radius-2 btn--blue">Edit</a>
                        <a href="https://oyschst.edu.ng/portal/" class="btn btn--radius-2 btn--green">Finish</a>
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