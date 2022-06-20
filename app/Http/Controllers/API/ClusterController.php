<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClusterResource;
use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClusterController extends Controller
{
   public function index()
   {
        $data = Cluster::latest()->get();
        return response()->json(   
            ['message'=>'Data Found', 'data' => ClusterResource::collection($data)],200);
   }

   public function store(Request $request)
   {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255|min:3|unique:clusters',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $cluster = Cluster::create([
            'name' => $request->name,
        ]);

        // return response()->json('Cluster created Successfully.', new ClusterResource($cluster));
        return response()->json(['message'=>'Program created successfully.','data'=> new ClusterResource($cluster)],201);
   }

   public function show($id)
   {
        $cluster = Cluster::find($id);
        if(is_null($cluster)) {
            return response()->json(['message'=>'Data not Found'],404);
        }

        return response()->json(['message'=>'Data Found','data' => new ClusterResource($cluster)],200);
   }

   public function update(Request $request, Cluster $cluster)
   {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            // 'desc' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        // $cluster = Cluster::findOrFail($id);
        // return $cluster;

        $cluster->name = $request->name;
        // $cluster->desc = $request->desc;
        $cluster->save();
        
        return response()->json(['message'=>'Cluster updated successfully.', 'data' => new ClusterResource($cluster)]);
   }

   public function destroy(Cluster $cluster)
   {
        $cluster->delete();
        return response()->json(['message'=>'Cluster deleted Successfully.'],200);
   }
}
