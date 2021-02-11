<?php

namespace App\Http\Controllers;

use App\Terminology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TerminologyController extends Controller
{
    public function allTerminology()
    {
        $output = array('data' => array());
        $terminology = Terminology::all()->sortByDesc('id');
        $x = 1;
        foreach ($terminology as $row)
        {
            $actionButton = '

     <td>
      <a href="#" data-toggle="modal" data-target="#editModal" onclick="editItem('.$row->id.')" >
                <button type="button" class="btn btn-outline-grey btn-rounded btn-sm px-2" >
                    <i class="fa fa-pencil mt-0"></i>
                </button>
            </a>

            <a href="#" data-toggle="modal" data-target="#removeModal" onclick="removeItem('.$row->id.')">
                <button type="button" class="btn btn-outline-grey btn-rounded btn-sm px-2" data-toggle="modal" data-target="#modalConfirmDelete">
                    <i class="fa fa-trash mt-0"></i>
                </button>
            </a>
    </td>

            ';

            $output['data'][] = array(
                $row->name,
                $actionButton,
            );
            $x++;
        }
        $data= response()->json($output);
        return $data;
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validators->fails()){
            $validator['success'] = false;
            $validator['messages'] = $validators->errors()->all();
            return json_encode($validator);
        }

        $terminology = new Terminology($request->input());
        $terminology->name = $request['name'];
        $query =$terminology->save();

        if($query === TRUE) {
            $validator['success'] = true;
            $validator['messages'] = "Terminology Added successfully";
        }
        else {
            $validator['success'] = false;
            $validator['messages'] = "Error while Adding Terminology";
        }
        // close the database connection
        echo json_encode($validator);
    }

    public function removeTerminology(Request $request)
    {
        $id = $request['terminology'];
        $product = Terminology::find($id)->delete();

        if($product == TRUE) {
            $response['success'] = true;
            $response['messages'] = "Deleted Successfully";
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Error while Delete!";
        }
        echo json_encode( $response);
    }

    public function editTerminology(Request $request)
    {
        $id = $request['id'];
        $terminology = DB::table('terminologies')
            ->select('terminologies.*')
            ->where('id',$id)
            ->get();

        $data= response()->json(array(
            'terminology' => $terminology[0]
        ));
        return $data;
    }

    public function updateTerminology(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validators->fails()){
            $validator['success'] = false;
            $validator['messages'] = $validators->errors()->all();
            return json_encode($validator);
        }

        $id = $request['id'];
        $data = array(
            'name' =>$request['name']
        );
        $query = DB::table('terminologies')->where('id',$id)->update($data);

        if($query === 1) {
            $validator['success'] = true;
            $validator['messages'] = "Terminology Data Updated successfully";
        }
        else {
            $validator['success'] = false;
            $validator['messages'] = "Error while Updated Terminology";
        }
        // close the database connection
        echo json_encode($validator);
    }
}
