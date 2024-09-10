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
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">
                <p><img src="{{asset('regback/oyshia.jpg')}}" alt=""></p><br>
                <h2 class="title">Registration - Next of Kin Information</h2>
                    <form method="POST" action="{{route('enrollment-step2-update', ['id'=> $checkEnrollment->id])}}">
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
                                    <label class="label">Full name<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="text" name="next_of_kin_fullname" value="{{$checkEnrollment->next_of_kin_fullname}}">
                                </div>
                            </div>                            
                            <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">Relationship<span style="color: red;">*</span></label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="next_of_kin_relationship" id="">  
                                            @if(empty($checkEnrollment->next_of_kin_relationship))                                                                               
                                            <option selected value="Spouse">Spouse</option>   
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Guardian">Guardian</option>  
                                            @else
                                            <option selected value="{{$checkEnrollment->next_of_kin_relationship}}">{{$checkEnrollment->next_of_kin_relationship}}</option> 
                                            <option selected value="Spouse">Spouse</option>   
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Guardian">Guardian</option> 
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
                                    <label class="label">Email Address<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="text" name="next_of_kin_email" value="{{$checkEnrollment->next_of_kin_email}}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone No<span style="color: red;">*</span></label>
                                    <input class="input--style-4" type="text" name="next_of_kin_phone" value="{{$checkEnrollment->next_of_kin_phone}}">                                    
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">                            
                        <div class="col-2">
                                <div class="input-group">                            
                                        <label class="label">State<span style="color: red;">*</span></label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="next_of_kin_state" id="">
                                            @if(empty($checkEnrollment->next_of_kin_state))
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
                                            <option selected value="{{$checkEnrollment->next_of_kin_state}}">{{$checkEnrollment->next_of_kin_state}}</option>
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
                                    <input class="input--style-4" type="text" name="next_of_kin_city" value="{{$checkEnrollment->next_of_kin_city}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address<span style="color: red;">*</span></label>
                                    <textarea class="input--style-4" name="next_of_kin_address1" id="">{{$checkEnrollment->next_of_kin_address1}}</textarea>
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="input-group">                            
                                    <label class="label">Gender<span style="color: red;">*</span></label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="next_of_kin_gender" id="">
                                        @if(empty($checkEnrollment->next_of_kin_gender))
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        @else
                                        <option value="{{$checkEnrollment->next_of_kin_gender}}">{{$checkEnrollment->next_of_kin_gender}}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        @endif
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--green" type="submit">Update and Preview</button>
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