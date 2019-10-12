<?php

namespace App\Http\Controllers;
use App\Information;
use App\Limit;
use Illuminate\Http\Request;
use Illuminate\Http\Requestinput;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\IndexRequest;
use Illuminate\Support\Facades\Input;
/*use Illuminate\Validation\Validate;*/

use Validator;

class LimitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validate=false;
        $false=false;
        $limits = Limit::select([DB::raw('end_date')])->where('activity_id',"=","0")->paginate(1);
        return view('CIIU.index',compact('limits','false','validate'));
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'tel' => 'required|min:7|numeric',
            'name'=>'required|string',
            'email'=>'required|email|unique:Informations,email',
            'activity_id'=>'required|string',
            'nit'=>'required|unique:Informations,nit',

        ]);

        
        
        $activity_id= $request->input('activity_id');
        if ($activity_id != null) {
            $limits = Limit::select(['activity_id', 
                'activity_name', 
                'start_date', 
                'end_date',
                DB::raw('DATEDIFF(end_date, NOW()) AS days')
            ])->where('activity_id','=',$activity_id)->paginate(1);
            $limitmessage = $limits->count();

            if ($limitmessage==0) {
                $false=false;
                $validate=true;
                $limits = Limit::select([DB::raw('end_date')])->where('activity_id',"=","0")->paginate(1);
                return view('CIIU.index',compact('limits','false','validate'));
            }else{
                $Information = new Information;
                $Information->tel=$request->input('tel');
                $Information->Nit=$request->input('nit');
                $Information->name=$request->input('name');
                $Information->Email=$request->input('email');
                $Information->CIIU=$request->input('activity_id');
                $Information->save();
                $limits = Limit::select(['activity_id', 
                    'activity_name', 
                    'start_date', 
                    'end_date',
                    DB::raw('DATEDIFF(end_date, NOW()) AS days')
                ])->where('activity_id','=',$activity_id)->paginate(1);
                $limitmessage = $limits->count();
                $validate=false;
                $false=true;
                return view('CIIU.index',compact('limits','false','validate'));
            }
        }
        else
        {
            $false=false;
            $validate=false;
            $limits = Limit::select([DB::raw('end_date')])->where('activity_id',"=","0")->paginate(1);

            return view('CIIU.index',compact('limits','false','validate'));
        }

        
    }   
}
