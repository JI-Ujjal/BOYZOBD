<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function pagesShopDetails()
    {
        return view('frontend.headermenu.pages.shopDetails');
    }
}
