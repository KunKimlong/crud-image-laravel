<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class StudentController extends Controller
{
    public function index(){
        return view('students.index');
    }
    public function openAdd(){
        return view("students.add");
    }
    public function add(Request $request){
        $name = $request->name;
        $gender = $request->gender;
        $score1 = $request->score1;
        $score2 = $request->score2;
        $score3 = $request->score3;
        $profile = $request->profile;

        if($profile){
            $profileImage = rand(1,99999).'_'.$profile->getClientOriginalName();
            $path = 'Image';
            $profile->move($path,$profileImage);
        }

        $total = $score1+$score2+$score3;
        $average = $total/3;
        if($average >= 90){
            $grade = 'A';
        }
        else if($average >= 80){
            $grade = 'B';
        }
        else if($average >= 70){
            $grade = 'C';
        }
        else if($average >= 60){
            $grade = 'D';
        }
        else if($average >= 50){
            $grade = 'E';
        }
        else{
            $grade = 'F';
        }

        $created_at = date('d-m-y h-i-s');

        try{
            DB::table("students")->insert([
                'name'=>$name,
                'gender'=>$gender,
                'score1'=>$score1,
                'score2'=>$score2,
                'score3'=>$score3,
                'total'=>$total,
                'average'=>$average,
                'grade'=>$grade,
                'profile'=>$profileImage,
                'created_at'=>$created_at,
                'updated_at'=>$created_at,
            ]);

            return redirect('/add')->with("success",'');
        }
        catch(Exception $e){
            return redirect('/add')->with('unsuccess','');
        }
    }
    public function view(){

        $students = DB::table("students")->select("*")->get();
        // return $students ;

        return view('students.view',compact('students'));
    }

    public function openUpdate($id){
        $student = DB::table('students')->select('*')->where('id',$id)->first();
        // return $student;
        return view('students.update',compact('student'));
    }
    public function update(Request $request){
        $id = $request->update_id;
        $name = $request->name;
        $gender = $request->gender;
        $score1 = $request->score1;
        $score2 = $request->score2;
        $score3 = $request->score3;
        $profile = $request->profile;
        if($profile){
            $profileImage = rand(1,99999).'_'.$profile->getClientOriginalName();
            $path = 'Image';
            $profile->move($path,$profileImage);
        }
        else{
            $profileImage = $request->old_profile;
        }

        $total = $score1+$score2+$score3;
        $average = $total/3;
        if($average >= 90){
            $grade = 'A';
        }
        else if($average >= 80){
            $grade = 'B';
        }
        else if($average >= 70){
            $grade = 'C';
        }
        else if($average >= 60){
            $grade = 'D';
        }
        else if($average >= 50){
            $grade = 'E';
        }
        else{
            $grade = 'F';
        }


        $updated_at = date('d-m-y h-i-s');
        try{
            DB::table('students')->where('id',$id)->update([
                'name'=>$name,
                'gender'=>$gender,
                'score1'=>$score1,
                'score2'=>$score2,
                'score3'=>$score3,
                'total'=>$total,
                'average'=>$average,
                'grade'=>$grade,
                'profile'=>$profileImage,
                'updated_at'=>$updated_at,
            ]);

            return redirect('/view')->with('updatesuccess');
        }
        catch(Exception $e){
            return redirect('/update/'.$id)->with('updateSuccess');
        }
    }
    public function delete(Request $request){
        $id = $request->deleteID;
        try {
            DB::table("students")->where('id',$id)->delete();
            return redirect('/view')->with('deletesuccess');
        } catch (Exception $e) {
            return redirect('/view')->with('deletenotsuccess');
        }
    }

    public function search(Request $request){
        $searchrs = DB::table("students")
                ->select('*')
                ->where('name','LIKE','%'.$request->query.'%')
                ->get();
    }
}


