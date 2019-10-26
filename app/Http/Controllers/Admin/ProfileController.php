<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index(Request $request){
        $cond_name = $request->cond_name;
        if ($cond_name !=''){
            $profiles = Profile::where('name',$cond_name->get());
        } else {
                $profiles = Profile::all();
        }
        return view('admin.profile.index',['profiles'=> $profiles, 'cond_name'=> $cond_name]);
    }
    
    public function add(){
        return view('admin.profile.create');
    }
    
    public function create(Request $request){
        
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        

        unset($form['_token']);

        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/');
    }

    public function edit(Request $request){
        $profile = Profile::find($request->id);
        if (empty($profile)){
            abort(404);
        }
        return view('admin.profile.edit',['profile_form' => $profile]);
    }
    
    public function update(Request $request){
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        
        unset($profile_form['_token']);

        $profile->fill($profile_form);
        $profile->save();
        
        $profile_history = new ProfileHistory;
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();
        
        return redirect('admin/profile/');
    }
    
    public function delete(Request $request){
        $profile = Profile::find($request->id);
        $profile->delete();
        return redirect('admin/profile/');
    }

}

