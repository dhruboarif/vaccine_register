<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    
    public function nidCheckPage(){
        return view ('registers.nidCheck');
    }

    public function registerNidCheck(Request $request)
    {
        $nid = $request->inputNID; 
        $response = Http::get('https://ancient-waterfall-522d.tricks.workers.dev/?nid='.$nid); 
        $response = json_decode($response->body()); 
        dd($response); 
        //$nidData = json_decode(file_get_contents('https://ancient-waterfall-522d.tricks.workers.dev/?nid=' . $nid), true);
        $division = DB::table('divisions')->pluck("division_name","id");

        if (!$response){
            return "NID Not found"; 
        }else{
            if ($response->nid == $nid){
                return view('registers.create', compact('response', 'division'));
            }else{
                return "Not matched"; 
            }
        }
    }
    
    public function store(Request $request)
    {
        
        // $request->validate([
        //     'inputName' => 'required',
        //     'inputNID' => 'required|min:8',
        //     'password' => 'required|min:8',
        //     'email' => 'required|email|unique:users',
        //     'contact' => 'required|min:10',
            
        // ], [
        //     'inputName.required' => 'Name is required',
        //     'password.required' => 'Password is required'
        // ]);

        //dd($request->all()); 
        // $Applicants = DB::Applicants::create($request->all());
           
            $name = $request->inputName; 
            $nid = $request->inputNID; 
            $bday = $request->dob; 
            $email = $request->email; 
            $phone = $request->contact; 
            $password = $request->password; 
            $division = $request->division; 
            $district = $request->district; 
            $upazila = $request->upazila; 
            $center_id = $request->center; 

            DB::table('applicants')->insert(
                [
                    'name' => $name, 
                    'nid' => $nid,
                    'bday' => $bday, 
                    'email' => $email,
                    'phone' => $phone, 
                    'password' => $password,
                    'divisions' => $division, 
                    'districts' => $district,
                    'upazilas' => $upazila, 
                    'center_id' => $center_id
                ]
            );

        return redirect()->route('phone-auth');
    }

    public function index()
    {

       $registers = DB::Register::all();
       return view('registers.index', compact('registers'));
    }

    

    
    public function create()
    {
    
        $division = DB::table('divisions')->pluck("division_name","id");
        return view('registers.create', compact('division'));
    }

    public function getDistrict($id) 
    {        
            $district = DB::table("districts")->where("division_id",$id)->pluck("district_name","id");
            return json_encode($district);
    }

    public function getUpazila($id) 
    {        
            $upazila = DB::table("Upazilas")->where("district_id",$id)->pluck("Upazila_name","id");
            return json_encode($upazila);
    }

    public function getCenter($id) 
    {        
            $center = DB::table("centers")->where("upazila_id",$id)->pluck("center_name","id");
            return json_encode($center);
    }

    public function regStatus() 
    {        
            $center = DB::table("applicants")->get();
            //dd($center);
            //return json_encode($center);
            return view('registers.nidCheck');
    }

    

    public function nidVerify(Request $request) 
    {        
            $req = $request->all(); 
            $data = DB::table("applicants")->get();
            $user = DB::where('nid', '=', $request->get('nid'))->first();
            dd($user); 

            if ($request->inputNID == $data->nid){
                return "You have registered. Your first vaccine date is" . $data->created_at+30; 
            }else{
                return "You have not registered yet"; 
            }
            
            //dd($nid);
            //DB::table("applicants")->get();
            
            //return json_encode($center);
            return view('registers.create');
    }


    

    public function edit(Register $register)
    {
        abort_if(Gate::denies('register_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.registers.edit', compact('register'));
    }

    public function update(UpdateRegisterRequest $request, Register $register)
    {
        $register->update($request->all());

        return redirect()->route('admin.registers.index');
    }

    public function show(Register $register)
    {
        abort_if(Gate::denies('register_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.registers.show', compact('register'));
    }

    public function destroy(Register $register)
    {
        abort_if(Gate::denies('register_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $register->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegisterRequest $request)
    {
        Register::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}



