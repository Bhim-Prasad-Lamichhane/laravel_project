<?php

namespace App\Repositories;

use App\Models\StudentModel;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentRepositoryClass implements StudentRepositoryInterface
{

    protected $model;

    public  function __construct(StudentModel  $model){
        $this->model = $model;
    }

    public function getAllStudents()
    {
        return $this->model->all();
    }

    public function getStudentById($id)
    {
        return $this->model->find($id);
    }

    public function createStudent(array $data)
    {
        return $this->model->create($data);
    }

    public function updateStudent($id, array $data)
    {
        $student = $this->model->find($id);
        if ($student) {
            $student->update($data);
            return $student;
        }
        return null;
    }

    public function deleteStudent($id)
    {
        $student = $this->model->find($id);
        if ($student) {
            $student->delete();
            return $student;
        }
        return null;
    }

    public function searchStudents(Request $request)
    {
        $query = $this->model->query();

        if ($request->has('name')) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        if ($request->has('age')) {
            $query->where('age', $request->age);
        }

        if ($request->has('address')) {
            $query->where('address', 'LIKE', "%{$request->address}%");
        }

        if ($request->has('email')) {
            $query->where('email', 'LIKE', "%{$request->email}%");
        }

        return $query->get();
    }


}