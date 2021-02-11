<?php

namespace App\Http\Controllers;

use App\Specification;
use App\Terminology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SpecificationController extends Controller
{

    public function allSpecification()
    {
        $output = array('data' => array());
        $specification = DB::table('specification')
            ->join('terminologies', 'terminologies.id', '=', 'specification.terminology_id')
            ->select('specification.*',
                'terminologies.name as terminologies_name')
            ->get();
        $x = 1;
        foreach ($specification as $row)
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

            if ($row->photo != NULL)
            {
                $image = '
                   <img src="'.asset('images/car/'.$row->photo.'').'" alt="'.$row->car_name.'" title="'.$row->car_name.'" class="rounded mx-auto d-block photo" height="50px" width="50px" data-toggle="modal" data-target="#imageModal">
            ';
            }
            else
            {
                $image = '
                   <img src="'.asset('images/car/no_photo.jpg').'" alt="'.$row->car_name.'" title="'.$row->car_name.'" class="rounded mx-auto d-block photo" height="50px" width="50px" data-toggle="modal" data-target="#imageModal">
            ';
            }

            $output['data'][] = array(
                $row->terminologies_name,
                $row->car_name,
                $row->model,
                $row->price,
                $row->color,
                $row->milage,
                $image,
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
            'terminology_id' => 'required',
            'car_name' => 'required',
            'model' => 'required',
            'price' => 'required',
            'color' => 'required'
        ]);

        if ($validators->fails()){
            $validator['success'] = false;
            $validator['messages'] = $validators->errors()->all();
            return json_encode($validator);
        }

        $specification = new Specification($request->input());
        $specification->terminology_id = $request['terminology_id'];
        $specification->car_name = $request['car_name'];
        $specification->model = $request['model'];
        $specification->price = $request['price'];
        $specification->color = $request['color'];
        $specification->milage = $request['milage'];

        if($file = $request->hasFile('photo')) {
            $file = $request->file('photo') ;
            $fileName = $request->file('photo')->hashName();
            $destinationPath = base_path().'/images/car';
            $file->move($destinationPath,$fileName);
            $specification->photo = $fileName;
        }
        $query =$specification->save();

        if($query === TRUE) {
            $validator['success'] = true;
            $validator['messages'] = "Specification Added successfully";
        }
        else {
            $validator['success'] = false;
            $validator['messages'] = "Error while Adding Specification";
        }
        // close the database connection
        echo json_encode($validator);
    }

    public function removeSpecification(Request $request)
    {
        $id = $request['specification'];
        $specification = Specification::find($id)->delete();

        if($specification == TRUE) {
            $response['success'] = true;
            $response['messages'] = "Deleted Successfully";
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Error while Delete!";
        }
        echo json_encode( $response);
    }

    public function editSpecification(Request $request)
    {
        $id = $request['id'];
        $specification = DB::table('specification')
            ->join('terminologies', 'terminologies.id', '=', 'specification.terminology_id')
            ->select('specification.*',
                'terminologies.name as terminologies_name')
            ->where('specification.id',$id)
            ->get();

        $terminologies = Terminology::all();
        foreach ($terminologies as $terminology)
        {
            $terminology_data[] = '<option value="'.$terminology['id'].'" '.($specification[0]->terminology_id==$terminology['id']?"selected":"").'>'.$terminology['name'].'</option>';
        }

        if ($specification[0]->photo != NULL)
        {
            $image = '
                   <img src="'.asset('images/car/'.$specification[0]->photo.'').'" alt="'.$specification[0]->car_name.'" title="'.$specification[0]->car_name.'" class="rounded mx-auto d-block photo" height="50px" width="50px" >
            ';
        }
        else
        {
            $image = '
                   <img src="'.asset('images/car/no_photo.jpg').'" alt="'.$specification[0]->car_name.'" title="'.$specification[0]->car_name.'" class="rounded mx-auto d-block photo" height="50px" width="50px" >
            ';
        }

        $data= response()->json(array(
            'specification' => $specification[0],
            'terminology_data' => $terminology_data,
            'image' => $image
        ));
        return $data;
    }

    public function updateSpecification(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'terminology_id' => 'required',
            'car_name' => 'required',
            'model' => 'required',
            'price' => 'required',
            'color' => 'required'
        ]);

        if ($validators->fails()){
            $validator['success'] = false;
            $validator['messages'] = $validators->errors()->all();
            return json_encode($validator);
        }

        $id = $request['id'];

        $specification = DB::table('specification')
            ->select('specification.*')
            ->where('id',$id)
            ->get();
        $fileName = $specification[0]->photo;

        if($file = $request->hasFile('photo')) {
            $file = $request->file('photo') ;
            $fileName = $request->file('photo')->hashName();
            $destinationPath = base_path().'/images/car';
            $file->move($destinationPath,$fileName);
        }

        $data = array(
            'terminology_id' =>$request['terminology_id'],
            'car_name' =>$request['car_name'],
            'model' => $request['model'],
            'price' => $request['price'],
            'color' => $request['color'],
            'milage' => $request['milage'],
            'photo' => $fileName
        );

        $query = DB::table('specification')->where('id',$id)->update($data);

        if($query === 1) {
            $validator['success'] = true;
            $validator['messages'] = "Specification Updated successfully";
        }
        else {
            $validator['success'] = false;
            $validator['messages'] = "Error while Updated Specification";
        }

        echo json_encode($validator);
    }

    public function searchSpecification(Request $request)
    {
        $output = array('data' => array());

        $terminology_id = $request['terminology_id'];
        $car_name = $request['car_name'];
        $price = $request['price'];

        $specification = DB::table('specification')
            ->join('terminologies', 'terminologies.id', '=', 'specification.terminology_id')
            ->select('specification.*',
                'terminologies.name as terminologies_name');



        if ($terminology_id != null)
        {
            $specification = $specification
                ->where('specification.terminology_id',$terminology_id);
        }


        if ($car_name != null)
        {
            $specification = $specification
                ->where('specification.car_name','like','%'.$car_name.'%');
        }

        if ($price != null)
        {
            $specification = $specification
                ->where('specification.price', '>=',$price);
        }

        $specification = $specification->orderBy('specification.id', 'DESC')->get();

        $x = 1;
        foreach ($specification as $row)
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

            if ($row->photo != NULL)
            {
                $image = '
                   <img src="'.asset('images/car/'.$row->photo.'').'" alt="'.$row->car_name.'" title="'.$row->car_name.'" class="rounded mx-auto d-block photo" height="50px" width="50px" data-toggle="modal" data-target="#imageModal">
            ';
            }
            else
            {
                $image = '
                   <img src="'.asset('images/car/no_photo.jpg').'" alt="'.$row->car_name.'" title="'.$row->car_name.'" class="rounded mx-auto d-block photo" height="50px" width="50px" data-toggle="modal" data-target="#imageModal">
            ';
            }

            $output['data'][] = array(
                $row->terminologies_name,
                $row->car_name,
                $row->model,
                $row->price,
                $row->color,
                $row->milage,
                $image,
                $actionButton,
            );
            $x++;
        }

        if (count($output['data'])>0)
        {
            $output['success']= true;
            $output['messages']= 'Data Found';
            return response()->json($output);
        }
        else{
            $output['success']= false;
            $output['messages']= 'Data not Found';
            return response()->json($output);

        }
    }

}
