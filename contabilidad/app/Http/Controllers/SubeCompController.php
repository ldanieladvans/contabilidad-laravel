<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompProces;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SubeCompController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('appviews.subecomp',[]);
    }

    public function addComp(Request $request){

    	$target_dir = base_path().DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR;
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$logued_user = Auth::user();

		$exist_file = CompProces::where('user_id',$logued_user->id)->where('filename',$_FILES['file']['name'])->where('process',false)->get();

		if(count($exist_file)==0){
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.(string)$logued_user->id.'_'.$_FILES['file']['name'])) {
				$status = 1;
			}
			$new_file_entry = new CompProces(['user_id'=>$logued_user->id,'filename'=>$_FILES['file']['name']]);
			$new_file_entry->save();
		}

    }


    public function processFile(Request $request)
    {
        $alldata = $request->all();
        $logued_user = Auth::user();

        $exist_file = CompProces::where('user_id',$logued_user->id)->where('process',false)->get();

        foreach ($exist_file as $ef) {
        	#  TODO make process
        	$a = 1;
        }

        $response = array(
            'status' => 'success',
            'msg' => 'Ok'
        );
        return \Response::json($response);
    }
}
