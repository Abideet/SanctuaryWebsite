<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Adoption;


class AdoptionController extends Controller
{
    /**
     * Controller method to control data requests and responses for webpage that allows users to create adoption request 
     *
     * @return Create View with the animals data
     */
    public function index()
    {
        //
        $animals = Animal::all()->toArray();
        return view('adoptions.create', compact('animals'));
    }

    
    /**
     * Controller method to control data requests and responses for webpage that allows employees to view all adoption requests
     *
     * @return Adoption view with the adoption and animal data
     */
    public function index2()
    {
        $adoptions = Adoption::all()->toArray();
        $animals = Adoption::all()->toArray();
        return view('adoption', compact('adoptions', 'animals'));
    }


    /**
     * Controller method to control data requests and responses for webpage that allows users to view the decision on their adoption request
     *
     * @return userAdoption view with the adoption data
     */
    public function index3()
    {
        $adoptions = Adoption::all()->toArray();
        //return adoption data to the userAdoption view
        return view('userAdoption', compact('adoptions'));
    }

    /**
     * Controller method to control data requests and responses for webpage that allows users to view the decision on their adoption request
     *
     * @return adoption data to the home view
     */
    //Return adoption data to adoptions.view
    public function index4()
    {
        $adoptions = Adoption::all()->toArray();
        return view('home', compact('adoptions'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('adoptions.create');
    }

    /**
     * Store a newly created resource in storage i.e the Adoption data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'identification.*' => 'image|mimes:jpeg,png,jpg,gif,svg,|max:3048',
            'fname' => 'required',
            'pet' => 'required',
            'adoptionReason' => 'required'
        
        ]);
        //Handles the uploading of the image
        if ($request->hasFile('identification')){
            //Gets the filename with the extension
            $fileNameWithExt = $request->file('Identification')->getClientOriginalName();
            //just gets the filename
             $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Just gets the extension
            $extension = $request->file('Identification')->getClientOriginalExtension();
            //Gets the filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
    
            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'noimage.jpg';
            }
            // create a Animal object and set its values from the input
            $adoption = new Adoption();
            $adoption->fname = $request->input('fname');
            $adoption->pet = $request->input('pet');
            $adoption->age = $request->input('age');
            $adoption->adoptionReason = $request->input('adoptionReason');
            $adoption->adoptionDecision = 'Pending';
            $adoption->identification = $fileNameToStore;
            
            // save the Animal object
            $adoption->save();
            // generate a redirect HTTP response with a success message
            return back()->with('success', 'Adoption request has been sent.'); //change to name of the animal
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $adoption = Adoption::find($id);
        return view('adoptions.edit',compact('adoption'));
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
        $adoption = Adoption::find($id);
        

        $adoption->adoptionDecision = $request->input('adoptionDecision');

        $adoption->save();
        return redirect('adoptions');
        
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
