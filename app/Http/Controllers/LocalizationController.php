<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Session;

    class LocalizationController extends Controller
    {
        public function select($locale)
        {
            Session::put('locale', $locale);

            return redirect()->back();
        }
    }
