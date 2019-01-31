<?php

namespace App\Http\Controllers\general;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function privacyPolicy (Request $request)
    {
        return view ('General.privacyPolicy');
    }
    public function contactUs (Request $request)
    {
        return view ('General.contactUs');
    }
    public function termsServices (Request $request)
    {
        return view ('General.termsServices');
    }
}
