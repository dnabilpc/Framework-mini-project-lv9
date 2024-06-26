<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        return view('students', [
            'students' => Student::all()
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max : 250',
            'nim' => 'required|string|max:10|regex:/^\d+$/',
            'major' => 'required|string',
            'email' => 'required|email|',
            'phone_number' => 'required|string|regex:/^\d+$/',
            'image' => 'image|mimes:jpeg,png,jpg|max:10420'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $imageName = '';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $imageName);
        }

        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'image' => $imageName
        ]);
        return redirect('/student')->with('status', 'Berhasil Menambahkan Data baru Yeeaaaaah!');
    }

    public function show(Student $student){
        return view('studentdetail', compact('student'));
    }

    public function update(Request $request, Student $student){
        // echo $student;
        // echo "student id : " . $student->id;
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max : 250',
            'nim' => 'required|string|max:10|regex:/^\d+$/',
            'major' => 'required|string',
            'email' => 'required|email|',
            'phone_number' => 'required|string|regex:/^\d+$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10420'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $imageName = $student->image;
        if($request->hasFile('image')){

            //jika user memasukkan gambar baru maka gambar lama akan dihapus
            //gambar dummy tidak akan dihapus untuk memudahkan proses development
            if(!str_contains($imageName, "dummy")){
                Storage::delete('public/images/' . $imageName);
            }

            //menyimpan gambar baru
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $imageName);
        }
        Student::where('id', $student->id)->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'image' => $imageName
        ]);
        return redirect('/student')->with('status', 'Behasil Mengedit Data Yes sirr!');
    }

    public function destroy(Student $student){
        // dd($student);
        if(!str_contains($student['image'], "dummy")){
            Storage::delete('public/images/' . $student->image);
        }
        $student->delete();

        return redirect('/student')->with('status', 'Berhasil Menghapus Data Yaaay!');
    }

    public function edit(Student $student)
    {
        return view('student.edit', [
            'student' => $student
        ]);
    }

    public function create()
    {
        return view('student.add');
    }
}
