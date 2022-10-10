<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * Controller method to control data requests and responses for webpage that allows users to view all animals
     *
     * @return animal data to the index view
     */
    public function index()
    {
        $animals = Animal::sortable()->paginate(5);
        return view('animals.index', compact('animals'));
    }

    /**
     * Controller method to control data requests and responses for webpage that allows users to view all animals
     *
     * @return animal data to the home view
     */
    public function index5()
    {
        $animals = Animal::sortable()->paginate(5);
        return view('home', compact('animals'));
    }


    /**
     * Controller method that returns a view
     *
     * @return the create view
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Makes sure all files that the user trys to insert into the database are of the following file types so that they cannot upload malicious files
        $this->validate($request, [
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg,|max:3048',
            'name' => 'required',
            'age' => 'required|numeric',
            'species' => 'required'
        ]);


        //Handles the uploading of the image to store multiple images
        if ($request->hasFile('filename'))
        {

            //loop through for ea
            foreach($request->file('filename') as $image)
            {
                //Gets the filename with the extension   
                $fileNameWithExt = $image->getClientOriginalName();
                //$extension = $image->getClientOriginalExtension();

                //just gets the filename
                 $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // //Just gets the extension
                 $extension = $image->getClientOriginalExtension();
                // //Gets the filename to store
                 $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // //Uploads the image
                 $path = $image->storeAs('public/images', $fileNameToStore);

                //$image->move(public_path().'public/images', $fileNameWithExt);
                $data[] = $fileNameToStore;
            
            }  
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

        //json_encode allows us to insert multiple image names in one cell of the database table
        $animal->filename = json_encode($data);     
        
        // save the Animal object
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
    //display animal data
    public function show($id)
    {
        //
        $animal = Animal::find($id);
        $data = Animal::all();
        return view('animals.show',compact('animal', 'data'));
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
        $animal = Animal::find($id);
        return view('animals.edit',compact('animal'));
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
        //similar to the store object but does not create a new object, finds a new object and brings the data into display
        $animal = Animal::find($id);
        $this->validate(request(), [
        'name' => 'required',
        'age' => 'required|numeric',
        'species' => 'required'
        ]);
        $animal->name = $request->input('name');
        $animal->species = $request->input('species');
        $animal->age = $request->input('age');
        $animal->colour = $request->input('colour');
        $animal->personality = $request->input('personality');
        $animal->availability = $request->input('availability');

        $animal->updated_at = now();
        //Handles the uploading of the image
        if ($request->hasFile('filename')){
        //Gets the filename with the extension
        $fileNameWithExt = $request->file('filename')->getClientOriginalName();
        //just gets the filename
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Just gets the extension
        $extension = $request->file('filename')->getClientOriginalExtension();
        //Gets the filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Uploads the image
        $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
        $fileNameToStore = 'noimage.jpg';
        }
        $animal->image = $fileNameToStore;

        //save the existing object into the database after user updates with new input
        $animal->save();
        return redirect('animals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete the record
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('animals');
    }

    
}



