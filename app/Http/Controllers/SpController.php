<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sp1;

class SpController extends Controller
{
    public function show(){
        $data =Sp1::all();
        return view('index',['data'=>$data]);
    }
    // Inserting Record in Sp1 table using Store Procedure
    public function insertRecord(Request $request){
        $data=$request->all();

        $name=$data['name'] ?? null;
        $age=$data['age'] ?? null;
        $phone=$data['phone'] ?? null;

        $result=Sp1::insertRecord($name,$age,$phone);
        if($data){
            return redirect()->back()->with('success',"Inserted Successfully");
        }
        else{
            return redirect()->back()->with('error',"Not Inserted Successfully");
        }
    }

    public function edit($id){
        $editData =Sp1::find($id);
        return view('update',['editData'=>$editData]);
    }

    public function update(Request $req){
        $input = $req->all();
        $data =Sp1::where($req->id);

        $result=Sp1::updateRecord($req->id,$req->name,$req->age,$req->phone);
        if($data){
            return redirect('/insert');
        }
        return view('update');
    }

    public function delete($id) {
        $data = Sp1::deleteRecord($id);
        if($data){
            return redirect('/insert');
        }
        return redirect('/insert');
    }
}
