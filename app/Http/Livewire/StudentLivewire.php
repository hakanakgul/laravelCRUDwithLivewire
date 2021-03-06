<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = "";

    public $name, $email, $course, $student_id;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => ['required', 'email', "unique:students,email,{$this->student_id}"], //Validation with ignoring own data
            'course' => 'required|string'
        ];
    }

    public function viewStudent(int $student_id)
    {
        $student = Student::find($student_id);
        if ($student) {
            $this->student_id = $student->id;
            $this->name = $student->name;
            $this->email = $student->email;
            $this->course = $student->course;
        } else {
            return redirect()->to('/students');
        }
    }



    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveStudent()
    {
        $validatedData = $this->validate();

        Student::create($validatedData);
        session()->flash("message", "Student Added Successfully");
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editStudent(int $student_id)
    {
        $student = Student::find($student_id);
        if ($student) {
            $this->student_id = $student->id;
            $this->name = $student->name;
            $this->email = $student->email;
            $this->course = $student->course;
        } else {
            return redirect()->to('/students');
        }
    }

    public function updateStudent()
    {
        $validatedData = $this->validate();

        Student::where("id", $this->student_id)->update([
            "name" => $validatedData["name"],
            "email" => $validatedData["email"],
            "course" => $validatedData["course"],
        ]);

        session()->flash("message", "Student Updated Successfully");
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    //delete student function
    public function deleteStudent(int $student_id)
    {
        $student = Student::find($student_id);
        if ($student) {
            $this->student_id = $student->id;
        } else {
            return redirect()->to('/students');
        }
    }

    public function destroyStudent()
    {
        $student = Student::find($this->student_id);
        if ($student) {
            $student->delete();
            session()->flash("message", "Student Deleted Successfully");
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
        } else {
            return redirect()->to('/students');
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function clearModalInputs()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->student_id = "";
        $this->name = "";
        $this->email = "";
        $this->course = "";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $students = Student::where('name', 'like', '%' . $this->search . '%')->orderBy("id", "asc")->paginate(10);

        return view('livewire.student-livewire', [
            "students" => $students,
        ]);
    }
}