<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photographer;

class PhotographerController extends Controller
{
    /**
     * Display a listing of the Photographer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Photographer::all();
    }

    /**
     * Store a newly created Photographer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPhotographer = new Photographer;
        $newPhotographer->name              = $request["name"];
        $newPhotographer->phone             = $request["phone"];
        $newPhotographer->email             = $request["email"];
        $newPhotographer->bio               = $request["bio"];
        $newPhotographer->profile_picture   = $request["profile_picture"];

        $newPhotographer->save();

        return $newPhotographer;
    }

}
