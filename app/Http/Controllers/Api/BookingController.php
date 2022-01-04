<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\BookingInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $BookingInterface;
    public function __construct(BookingInterface $BookingInterface)
    {
        $this->BookingInterface = $BookingInterface;

    }

    public function booking(Request $request)
    {
        return $this->BookingInterface->booking($request);
    }
}
