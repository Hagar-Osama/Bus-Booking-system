<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\tripInterface;
use Illuminate\Http\Request;

class TripController extends Controller
{
    private $tripInterface;
    public function __construct(tripInterface $tripInterface)
    {
        $this->tripInterface = $tripInterface;

    }

    public function show(Request $request)
    {
        return $this->tripInterface->show($request);
    }

}
