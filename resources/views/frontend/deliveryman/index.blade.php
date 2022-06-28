@extends('frontend.layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
            @include('frontend.deliveryman.partials.deliveryman-sidebar')
            <div class="aiz-user-panel">
                <div class="aiz-titlebar mt-2 mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="h3">Welcome Delivery Man Dashboard</h1>
                        </div>
                    </div>
                </div>
                {{-- <div class="row gutters-10">
            		<div class="col-md-4">
            			<div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            				<div class="px-3 pt-3">
  					            <div class="opacity-50 text-center">Total Pending Orders</div>
                                  <div class="text-center">
                                      <h3>9</h3>
                                  </div>
            				</div>
          					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      							<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    						</svg>
            			</div>
            		</div>
                    <div class="col-md-4">
            			<div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            				<div class="px-3 pt-3">
  					            <div class="opacity-50 text-center">Total Delivered Orders</div>
                                  <div class="text-center">
                                      <h3>9</h3>
                                  </div>
            				</div>
          					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      							<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    						</svg>
            			</div>
            		</div>
                    <div class="col-md-4">
            			<div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            				<div class="px-3 pt-3">
  					            <div class="opacity-50 text-center">Total On Delivery Orders</div>
                                  <div class="text-center">
                                      <h3>9</h3>
                                  </div>
            				</div>
          					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      							<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    						</svg>
            			</div>
            		</div>
                    <div class="col-md-4">
            			<div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            				<div class="px-3 pt-3">
  					            <div class="opacity-50 text-center">Total Cancel Orders</div>
                                  <div class="text-center">
                                      <h3>9</h3>
                                  </div>
            				</div>
          					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      							<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    						</svg>
            			</div>
            		</div>
                    <div class="col-md-4">
            			<div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            				<div class="px-3 pt-3">
  					            <div class="opacity-50 text-center">Total Confirmed Orders</div>
                                  <div class="text-center">
                                      <h3>9</h3>
                                  </div>
            				</div>
          					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      							<path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    						</svg>
            			</div>
            		</div>
            	</div> --}}
        </div>
    </div>
</section>
@endsection
