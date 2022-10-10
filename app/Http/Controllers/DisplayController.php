<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $animals = Animal::sortable()->paginate(5);
        return view('display', compact('animals'));
    }

    public function index2()
    {
        
        $animals = Animal::sortable()->paginate(5);
        return view('home', compact('animals'));
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
        //Handles the uploading of the image
        if ($request->hasFile('image')){
            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //just gets the filename
             $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Gets the filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
    
            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'noimage.jpg';
            }
        // create a Animal object and set its values from the input
        $animal = new Animal();
        $animal->name = $request->input('name');
        $animal->species = $request->input('species');
        $animal->age = $request->input('age');
        $animal->colour = $request->input('colour');
        $animal->personality = $request->input('personality');
        $animal->availability = $request->input('availability');
       

        $animal->created_at = now();
        $animal->image = $fileNameToStore;
        
        // save the Vehicle object
        $animal->save();
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'Animal has been added'); //change to name of the animal
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $animals = Animal::all();
        return view('animals.display', ['animals'=>$animals]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
