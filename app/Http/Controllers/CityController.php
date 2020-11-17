<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;
use App\Models\Governorate;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $records = City::with('governorate')->get();

        return view('admin.cities.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $records = Governorate::pluck('name', 'id');

        return view('admin.cities.create', compact('records'));
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
        //dd($request->all());
        $rules      = [ 
            'name'              => 'required',
            'governorate_id'    => 'required'  
        ];
        $massage    = [
            'name.required'              => 'Name Is Requireds',
            'governorate_id.required'    => 'Governorate  Is Requireds'  
        ];
        $this->validate($request, $rules, $massage);

        $record = City::create($request->all());

        flash('Success create New city')->success();
        return redirect('admin/city'); //return back();
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
        $model = City::findOrFail($id);

        $governorates = City::with('governorate')->get();
        foreach($governorates as $governorate)
        {
            $categoriesArray[$governorate->governorate_id] = $governorate->governorate->name;
        }

        return view('admin.cities.edit', compact('model', 'categoriesArray'));

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
        $record = City::findOrFail($id);
        $record->update($request->all());
        flash('Success Update City')->success();
        return redirect('admin/city'); 
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

        $record = City::findOrFail($id);
        $record->delete();
        flash('Sucess Delete City')->success();
        return redirect('admin/city');

    }
}
