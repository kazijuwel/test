
			<footer id="footer" class="bg-color-vipmm border-top-0">
				<div class="container py-1">
					<div class="row py1">
						<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
							<h5 class="text-3 mb-3 " style="color: #7DB624">24 hours service</h5>
							<ul class="list list-icons list-icons-lg">



                        <a class="m-0 text-color-light" href="https://wa.me/+8801767506668">+8801767-506668 (Whatsapp)</a> <br>
                        <a class="m-0 text-color-light" href="https://wa.me/+8801927157200">+8801927-157200 (Whatsapp)</a> <br>


                            </ul>


							<div class="alert alert-success d-none" id="newsletterSuccess">
								<strong>Success!</strong> You've been added to our email list.
							</div>
							<div class="alert alert-danger d-none" id="newsletterError"></div>
							<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" class="mr-4 mb-3 mb-md-0">
								<div class="input-group input-group-rounded">
									<input class="form-control form-control-sm bg-light" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
									<span class="input-group-append">
										<button class="btn btn-light text-color-dark" type="submit"><strong>GO!</strong></button>
									</span>
								</div>
							</form>
						</div>

                        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
							<h5 class="text-3 mb-3">Pages</h5>
							<ul class="list list-icons list-icons-lg">
								@foreach($menupages as $page)
                        <a class="m-0 text-color-light" href="{{ route('page',$page->route_name) }}"><i class="far fa-dot-circle text-color-light"></i> {{$page->page_title}}</a> <br>

                        @endforeach
                        <a class="m-0 text-color-light" href="{{ url('/blogs') }}"><i class="far fa-dot-circle text-color-light"></i> Blogs</a> <br>
                            </ul>
						</div>


                        <div class="col-md-6 col-lg-2">
                            <h5 class="text-3 mb-3">FOLLOW US</h5>
                            <ul class="social-icons">
                                <li class="social-icons-facebook">
                                    <a href="{{$websiteParameter->fb_page_link}}" target="_blank" title="Facebook"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="social-icons-twitter">
                                    <a href="{{$websiteParameter->twitter_url}}" target="_blank" title="Twitter"><i
                                            class="fab fa-twitter"></i></a>
                                </li>
                                <li class="social-icons-linkedin">
                                    <a href="{{$websiteParameter->linkedin_url}}" target="_blank" title="Linkedin"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>

						<div class="col-md-6 col-lg-3 text-center">
							{{-- <h5 class="text-3  opacity-7">PAY WITH</h5> --}}

                                <img src="{{ asset('img/pay3.png') }}" alt="" class="img-fluid" style="margin-left: -30px">

							{{-- <ul class="header-social-icons social-icons">
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
							</ul> --}}
						</div>
					</div>
				</div>
				<div class="footer-copyright bg-color-vipmm bg-color-scale-overlay bg-color-scale-overlay-1">
					<div class="bg-color-scale-overlay-wrapper">
						<div class="container py-2">
							<div class="row">
								<div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
									<a href="{{url('/')}}" class="logo pr-0 pr-lg-3">
										<img alt="Porto Website Template" src="{{ asset('img/logo.png') }}" style="border: 1px solid #fff" class="opacity-5" height="33">
									</a>
								</div>
								<div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
									<p class="text-color-light">© Copyright 2020. All Rights Reserved.</p>
								</div>
								<div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
									<nav id="sub-menu">
										<ul>
											<li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="{{ route('page',"privacy-policy") }}" class="ml-1 text-decoration-none text-color-light"> Privacy Policy</a></li>
											<li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="{{ route('page',"about-us") }}" class="ml-1 text-decoration-none text-color-light"> About Us</a></li>
											<li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="{{ route('page',"contact-us") }}" class="ml-1 text-decoration-none text-color-light"> Contact Us</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
