<div class="bg-dark">

    <div class="container py-3">

        <div class="row pt-5 pb-3 d-flex justify-content-around">

            <div class="col-lg-3 col-md-3 col-sm-4">
                <ul class="list-group-flush list-unstyled">
                    <li class="d-flex justify-content-center">
                        <img class="img-responsive img-fluid " src="{{__(asset('storage/assets/logoAsset-2.svg'))}}"
                             width="20%"/>
                    </li>
                    <li class="list-item text-center ">
                        <h2 class="text-bold text-primary">{{__(config('app.name'))}}</h2>
                        <p> Courier Made Easy</p>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-8 d-flex justify-content-center">
                <ul class="list-group">
                    <p class="h4">Quick Links</p>
                    <li class="list-item">My Account</li>
                    <li class="list-item">Reset Password</li>
                    <li class="list-item">
                        <a class="text-decoration-none text-black-50 text-link" href="{{__(route('admin.login'))}}">Admin
                            Login</a>
                    </li>
                    <li class="list-item">
                        <a class="text-decoration-none text-black-50 text-link" href="{{__(route('manager.login'))}}">Manager
                            Login</a>
                    </li>
                    <li class="list-item">Carrier</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-8 d-flex justify-content-center ">
                <ul class="list-group list-unstyled">
                    <p class="h4">Help</p>
                    <li class="list-item">About</li>
                    <li class="list-item">Contact</li>
                    <li class="list-item">FAQ</li>
                    <li class="list-item">Privacy</li>
                    <li class="list-item">Policy</li>
                </ul>
            </div>
        </div>



    </div>


    <div class="bg-black">

        <div class="container w-100 text-white-50 ">

            <div class=" d-flex justify-content-center m-0">
                    <img style="width:75% ;height:auto;" class="img-fluid"
                         src="https://securepay.sslcommerz.com/public/image/SSLCommerz-Pay-With-logo-All-Size-01.png"/>

            </div>

            <div class="text-center m-0 py-2 d-flex justify-content-between">

                <p class="pt-2">
                    Copyright {{__(date('Y')) }} <i class="las la-copyright"></i> {{ __(config('app.name')) }}
                    &nbsp;<i class="las la-grip-lines-vertical"></i>&nbsp;
                    <i class="text-link lni lni-facebook"></i> &nbsp;
                    <i class="text-link lni lni-twitter"></i> &nbsp;
                    <i class="text-lg-left text-link lab la-youtube"></i> &nbsp;

                </p>

                <p class="pt-2 text-sm text-capitalize">
                    made with <i class="text-success lni lni-heart"></i> by {{__('Shakil Ahmed')}}

                </p>

            </div>
        </div>
    </div>


</div>
