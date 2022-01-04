<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\tripInterface;
use Illuminate\Http\Request;

class TripController extends Controller
{
    private $tripInterface;
    public function __construct(tripInterface $tripInterface)
    {
        $this->tripInterface = $tripInterface;

    }

    public function index()
    {
        return $this->tripInterface->index();
    }

}
