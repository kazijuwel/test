<div id="modal_aside_left" class="modal fixed-left fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-aside" role="document">
        <div class="modal-content" style="min-height:1000px">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Belaobela</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <nav class="nav-sidebar">
                <a href=""> <i class="fa fa-home"></i> Our Payment Policy</a>
                <a href="privacy.html"> <i class="fa fa-th"></i> Privacy Policy</a>
                <a href="#"> <i class="fa fa-info-circle"></i> Refund Policy</a>
                <a href="#"> <i class="fa fa-building"></i> Return & Replacement</a>
                <a href="terms.html"> <i class="fa fa-cog"></i> Terms & Conditions</a>
                <a href="signin.html"> <i class="fa fa-home"></i> Sign In</a>
                <a href="signup.html"> <i class="fa fa-home"></i> Sign Up</a>
                <a href="contact-us.html"><i class="fa fa-phone"></i> Contact Us</a>
                <a href="wishlist.html"> <i class="fa fa-phone"></i> Wish List</a>
                <a href="single-products-details.html"> <i class="fa fa-phone"></i> Product Details</a>
                <a href="seller-registration.html"> <i class="fa fa-phone"></i> Seller Registration</a>
                <a href="service-provider-register.html"> <i class="fa fa-phone"></i> Service Provider
                    Registration</a>
                <a href="single-products-details.html"> <i class="fa fa-phone"></i> Product Details</a>
                <a href="faq.html"> <i class="fa fa-phone"></i> FAQ</a>
                <a href="contact-us.html"> <i class="fa fa-phone"></i> Contact Us</a>
                <a href="comparison.html"> <i class="fa fa-phone"></i> Comparison</a>
                <a href="category.html"> <i class="fa fa-phone"></i> Category</a>
                <a href="cart.html"> <i class="fa fa-phone"></i> Cart</a>
            </nav>
        </div>
    </div> <!-- modal-bialog .// -->
</div>
<!---Model-->
<div class="modal fade" id="GuestCheckout">
    <div class="modal-dialog modal-dialog-zoom">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-600">Login</h6>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-3">
                    <form class="form-default" role="form" action="{{ route('cart.login.submit') }}"
                        method="POST">
                            @csrf
                        <div class="form-group">
                            <input type="text" class="form-control h-auto form-control-lg " value=""
                                placeholder="Email or Phone" name="email" id="email">
                            <!-- <span class="opacity-60">Use country code before number</span> -->
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control h-auto form-control-lg"
                                placeholder="password">
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" name="remember">
                                    <span class=opacity-60>Remember Me</span>
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://belaobela.com.bd/password/reset"
                                    class="text-reset opacity-60 fs-14">Forgot Password?</a>
                            </div>
                        </div>

                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary btn-block fw-600">Login</button>
                        </div>
                    </form>

                </div>
                <div class="text-center mb-3">
                    <p style="color:red;">একাউন্ট না থাকলে আগে একাউন্ট করুন তারপর লগ ইন করুন</p>
                    <p class="text-muted mb-0">Dont have an account?</p>
                    <a href="https://belaobela.com.bd/users/registration">Register Now</a>
                </div>
                <div class="separator mb-3">
                    <span class="bg-white px-3 opacity-60">Or Login With</span>
                </div>
                <ul class="list-inline social colored text-center mb-5">
                    <li class="list-inline-item">
                        <a href="https://belaobela.com.bd/social-login/redirect/facebook" class="facebook">
                            <i class="lab la-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://belaobela.com.bd/social-login/redirect/google" class="google">
                            <i class="lab la-google"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://belaobela.com.bd/social-login/redirect/twitter" class="twitter">
                            <i class="lab la-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div  class="modal fade" id="call-for-order" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div  class="modal-dialog modal-dialog-zoom" role="document">
        <div style="background:#FD6500;" class="modal-content">
            <div class="modal-header">
                <h3 style="color:white;" class="modal-title" id="exampleModalLabel">“আপনি সরাসরি আমাদের কাছে ফোন করে যেকোন পন্যের অর্ডার
                এর জন্য 01841-695695 এই নাম্বারে কল করুন”</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="call-for-service" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">“আপনি সরাসরি আমাদের কাছে ফোন করে যেকোন পণ্য সার্ভিসিং এর জন্য কল করুন 01811-446778  নাম্বারে ”</h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>