<?php

namespace App\Imports;

use App\Models\user;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;



class csvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $this->validate($row,[
        //     'name'=>'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password'=>'required',
        //     'type'=>'required'
            

        // ]);
    
        return new User([
            'name'     => $row[0],
            'email'    => $row[1], 
            'password' => Hash::make($row[2]),
            'type' =>$row[3],
            
        ]);
    }
}
