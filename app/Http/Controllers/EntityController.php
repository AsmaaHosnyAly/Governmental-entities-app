<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEntity;


class EntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $entities=Entity::all();
        $entities = Entity::get();
        return view('entities.index', compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntity $request)
    {

        if (Entity::where('Name', $request->Name)->exists()) {

            return redirect()->back()->withErrors('الحقل موجود سابقا');
        }

        try {
            $validated = $request->validated();
            $entity = new Entity();
            $entity->Name = $request->Name;
            $entity->Notes = $request->Notes;

            $entity->save();
            flash()->addSuccess('Your account has been re-verified.');
            toastr()->success('تم اضافة البيانات بنجاح');
            return redirect()->route('entities.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


        // sol_2
        // Entity::create(
        //     $request->all()
        // );

        // Entity::create([ 
        //     'Name'=>$request->name
        // ]);
        // return response('تم اضافة البيانات بنجاح');

        // }

        /**
         * Display the specified resource.
         */
    }
    public function show(Entity $entity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //    $entity=Entity::find($id);
        //    if($entity){
        //     return $entity;
        //    }
        //    else{
        //     return response("Error Not Found");
        //    }
        // =================================
        //    $entity=Entity::findOrFail($id);
        $entity = Entity::where('id', $id)->first();

        return view('entities.edit', compact('entity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEntity $request, $id)
    {

        // $entity->Name=$request->Name;
        // $entity->save();

        // ==========================================
        // $entity->update([
        //     'Name'=>$request->Name

        // ]);
        try {

            $validated = $request->validated();
            $entity = Entity::findOrFail($id);
            $entity->update([
                $entity->Name= $request->Name,
                $entity->Notes = $request->Notes,
            ]);
            toastr()->success('تم التعديل بنجاح');
            return redirect()->route('entities.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Entity::findOrFail($id)->delete();
        Entity::destroy($id);
        return redirect()->route('entities.index');
    }
}
