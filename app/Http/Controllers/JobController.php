<?php

namespace App\Http\Controllers;

use App\Job;
use App\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\ContactUsApplicantMailManager;
use Auth;
use Session;
use Illuminate\Support\Carbon;
use Agent;

class JobController extends Controller
{


    protected $device;
    public function __construct()
    {
        if (!Agent::isDesktop()) {
            $this->device = 'frontend.mobile.pages';
        }
    $this->middleware('onlyview');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jobCorner()
    {
        return view('frontend.job_corner.job_corner');
    }


    public function contuctUsCreate()
    {
        if(Agent::isMobile()){
            return view($this->device.'.contact_us');
        }else{
            return view('frontend.contact_us');
        }


    }


    public function contuctUsStore(Request $request)
    {
        $requestData['name'] = $request->name;
        $requestData['mobile'] = $request->mobile;
        $requestData['email'] = $request->email;
        $requestData['comments'] = $request->comments;
        // $requestData = $request->except(['_token']);
        $requestData['created_at'] = Carbon::now();
        $requestData['updated_at'] = Carbon::now();


        $contact_us_mail = BusinessSetting::where('type', 'contact_us_mail')->first()->value;

        // echo "<pre>";
        // print_r($contact_us_mail);
        // exit();

         if (DB::table('contact_us')->insert($requestData)) {

            $array['view'] = 'emails.contact_us';
            $array['subject'] = translate('Your Complain is received by BelaObela successfully.');
            $array['from'] = env('MAIL_USERNAME');
            $array['contact_us'] = $contact_us_mail;
            $array['name'] = $requestData['name'];


            if(env('MAIL_USERNAME') != null){
            try {
                    Mail::to($requestData['email'])->queue(new ContactUsApplicantMailManager($array));
                } catch (\Exception $e) {

                }
            }

            //sms...

            $user_phone = $requestData['mobile'];

            if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated){
            try {
                $otpController = new OTPVerificationController;
                $otpController->contact_us_sms($user_phone);
            } catch (\Exception $e) {
            }
        }

            flash(translate('Your Information Submitted successfully!'))->success();
                return redirect()->route('home');

        }
        flash(translate('failed', 'Something went wrong. Try again'))->error();
            return back();



    }



    public function contactUsApplication(Request $request)
    {
        $contact_us_applications = DB::table('contact_us')->orderBy('id', 'DESC')->get();

        $date = $request->date;

        if ($date != null) {
             $contact_us_applications = $contact_us_applications->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
         }

        // echo '<pre>';
        // print_r($internship_applications);
        // exit();

        return view('backend.marketing.contact_us_applications', compact('contact_us_applications','date'));
    }

    public function message_modal(Request $request)
    {
        $contact_us_applications = DB::table('contact_us')->find($request->id);

            return view('backend.marketing.contact_us_message_modal', compact('contact_us_applications'));
    }


    public function internshipCreate()
    {
        return view('frontend.job_corner.internship_create');
    }


    public function internshipStore(Request $request)
    {
        $requestData = $request->except(['_token']);
        $file = $request->file('internship_cv');
        $requestData['internship_cv'] = $this->uploadImageIntern($file);
        $requestData['created_at'] = Carbon::now();

         if (DB::table('job_internship')->insert($requestData)) {
            return redirect()->route('jobs.corner')->with('success', 'Successfully Submitted');
        }
        return back()->with('failed', 'Something went wrong. Try again');

    }


    private function uploadImageIntern($file)
    {
        $name = time() . '-' . $file->getClientOriginalName();
        $file->move('admin/upload/interncv', $name);
        return '/admin/upload/interncv/' . $name;
    }


    public function internshipApplication(Request $request)
    {
        $internship_applications = DB::table('job_internship')->orderBy('id', 'DESC')->get();

        $date = $request->date;

        if ($date != null) {
             $internship_applications = $internship_applications->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
         }

        // echo '<pre>';
        // print_r($internship_applications);
        // exit();

        return view('backend.job_corner.internship_application', compact('internship_applications','date'));
    }



    public function joinWithUs()
    {
        return view('frontend.job_corner.join_with_us_create');
    }

     public function joinWithUsStore(Request $request)
    {

        $requestData = $request->except(['_token']);
        $file = $request->file('join_us_cv');
        $requestData['join_us_cv'] = $this->uploadImageJoinus($file);
        $requestData['created_at'] = Carbon::now();

         if (DB::table('job_join_us')->insert($requestData)) {
            return redirect()->route('jobs.corner')->with('success', 'Successfully Submitted');
        }
        return back()->with('failed', 'Something went wrong. Try again');

    }

    private function uploadImageJoinus($file)
    {
        $name = time() . '-' . $file->getClientOriginalName();
        $file->move('admin/upload/joinuscv', $name);
        return '/admin/upload/joinuscv/' . $name;
    }


    public function joinUsApplication(Request $request)
    {
        $join_applications = DB::table('job_join_us')->orderBy('id', 'DESC')->get();

        $date = $request->date;

        if ($date != null) {
             $join_applications = $join_applications->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
         }

        // echo '<pre>';
        // print_r($internship_applications);
        // exit();

        return view('backend.job_corner.join_us_application', compact('join_applications','date'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
