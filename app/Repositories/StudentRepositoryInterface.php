<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface StudentRepositoryInterface
{
    //define the required methods with parameters when required...

    public function getAllStudents();
    public function getStudentById($id);
    public function createStudent(array $data);
    public function updateStudent($id, array $data);
    public function deleteStudent($id);
    public function searchStudents(Request $request);

}