<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Agent;
class HowToOrderController extends Controller
{
    protected $device;
    public function __construct()
    {
        if (!Agent::isDesktop()) {
            $this->device = 'frontend.mobile.pages';
        } 
    }
    public function HowtoorderCreate()
    {
        if(Agent::isMobile())
        {
            return view($this->device.'.how-to-orders');

        }else{
            return view('frontend.how-to-order');
        }
      
    }
}
