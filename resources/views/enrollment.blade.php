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
        body {
    background-image: url('{{ asset('regback/body-bg.png') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">OYSHIA - Registration Form</h2>
                    <form method="POST">
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
                                    <label class="label">Reference ID</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <p>-------</p>
                                </div>
                            </div>
                        </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NIN</label>
                                    <p><img src="https://oyschst.edu.ng/epayment/registration/uploads/20240001.jpg" width="200" height="200" alt="profile_picture"></p>
                                </div>
                            </div>
                        </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Title</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="title" id="">
                                        <option value="Mr">Mr</option>
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
                                    <label class="label">NIN</label>
                                    <input class="input--style-4" type="text" name="nin_no">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last name</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First name</label>
                                    <input class="input--style-4" type="text" name="first_name">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Gender</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="gender" id="">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone No</label>
                                    <input class="input--style-4" type="text" name="phone_no">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">Marital Status</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="marital_status" id="">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <textarea class="input--style-4" name="address" id=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">State of Origin</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="state" id="">
                                        <option value="abia">ABIA</option>
                                            <option value="adamawa">ADAMAWA</option>
                                            <option value="akwaibom">AKWAIBOM</option>
                                            <option value="anambra">ANAMBRA</option>
                                            <option value="bauchi">BAUCHI</option>
                                            <option value="bayelsa">BAYELSA</option>
                                            <option value="benue">BENUE</option>
                                            <option value="borno">BORNO</option>
                                            <option value="crossriver">CROSSRIVER</option>
                                            <option value="delta">DELTA</option>
                                            <option value="ebonyi">EBONYI</option>
                                            <option value="edo">EDO</option>
                                            <option value="ekiti">EKITI</option>
                                            <option value="enugu">ENUGU</option>
                                            <option value="gombe">GOMBE</option>
                                            <option value="imo">IMO</option>
                                            <option value="jigawa">JIGAWA</option>
                                            <option value="kaduna">KADUNA</option>
                                            <option value="kano">KANO</option>
                                            <option value="kastina">KASTINA</option>
                                            <option value="kebbi">KEBBI</option>
                                            <option value="kogi">KOGI</option>
                                            <option value="kwara">KWARA</option>
                                            <option value="lagos">LAGOS</option>
                                            <option value="nassarawa">NASSARAWA</option>
                                            <option value="niger">NIGER</option>
                                            <option value="ogun">OGUN</option>
                                            <option value="ondo">ONDO</option>
                                            <option value="osun">OSUN</option>
                                            <option value="oyo">OYO</option>
                                            <option value="plateau">PLATEAU</option>
                                            <option value="rivers">RIVERS</option>
                                            <option value="sokoto">SOKOTO</option>
                                            <option value="taraba">TARABA</option>
                                            <option value="yobe">YOBE</option>
                                            <option value="zamfara">ZAMFARA</option>
                                            <option value="abuja">ABUJA</option>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <input class="input--style-4" type="text" name="city">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">State of Residence</label>
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
                                    <label class="label">State of Residence(LGA)</label>
                                    <input class="input--style-4" type="text" name="lga_oyo">
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <h6 class="title">Next Of Kin Information</h6>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Full name</label>
                                    <input class="input--style-4" type="text" name="next_of_kin_fullname">
                                </div>
                            </div>                            
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">Relationship</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="next_of_kin_relationship" id="">                                        
                                            <option value="Spouse">Spouse</option>   
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Guardian">Guardian</option>                         
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email Address</label>
                                    <input class="input--style-4" type="text" name="next_of_kin_email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone No</label>
                                    <input class="input--style-4" type="text" name="next_of_kin_phone">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">                            
                        <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">State</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="next_of_kin_state" id="">
                                        <option value="abia">ABIA</option>
                                            <option value="adamawa">ADAMAWA</option>
                                            <option value="akwaibom">AKWAIBOM</option>
                                            <option value="anambra">ANAMBRA</option>
                                            <option value="bauchi">BAUCHI</option>
                                            <option value="bayelsa">BAYELSA</option>
                                            <option value="benue">BENUE</option>
                                            <option value="borno">BORNO</option>
                                            <option value="crossriver">CROSSRIVER</option>
                                            <option value="delta">DELTA</option>
                                            <option value="ebonyi">EBONYI</option>
                                            <option value="edo">EDO</option>
                                            <option value="ekiti">EKITI</option>
                                            <option value="enugu">ENUGU</option>
                                            <option value="gombe">GOMBE</option>
                                            <option value="imo">IMO</option>
                                            <option value="jigawa">JIGAWA</option>
                                            <option value="kaduna">KADUNA</option>
                                            <option value="kano">KANO</option>
                                            <option value="kastina">KASTINA</option>
                                            <option value="kebbi">KEBBI</option>
                                            <option value="kogi">KOGI</option>
                                            <option value="kwara">KWARA</option>
                                            <option value="lagos">LAGOS</option>
                                            <option value="nassarawa">NASSARAWA</option>
                                            <option value="niger">NIGER</option>
                                            <option value="ogun">OGUN</option>
                                            <option value="ondo">ONDO</option>
                                            <option value="osun">OSUN</option>
                                            <option value="oyo">OYO</option>
                                            <option value="plateau">PLATEAU</option>
                                            <option value="rivers">RIVERS</option>
                                            <option value="sokoto">SOKOTO</option>
                                            <option value="taraba">TARABA</option>
                                            <option value="yobe">YOBE</option>
                                            <option value="zamfara">ZAMFARA</option>
                                            <option value="abuja">ABUJA</option>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                    </div>
                                    </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <input class="input--style-4" type="text" name="next_of_kin_city"> 
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <textarea class="input--style-4" name="next_of_kin_address1" id=""></textarea>
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Gender</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="next_of_kin_gender" id="">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Update</button>
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