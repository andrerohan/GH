<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::where('active', 1)->get();

        return view('layouts.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = \App\User::create([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => bcrypt($request['password']),
          ]);
        
        /*$user
             ->roles()
             ->attach(Role::where('name', 'User')->first());
            */

        session()->flash(
            'message', 'User created sucessfully!'
        );
          
           
        return redirect('/users');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::find($id);

        $servicos = \App\Servico::select('nome', 'id')->get();

        //return $servicos;

        return view('layouts.users.edit', compact('user', 'servicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);
        //$roles = Role::all();
        
       
        //sem password
        
        if($request->password === null){

            //email = ... entao

            if($user->email === $request['email']){
   
                $this->validate($request, [
                    'name' => 'required|min:3|max:50',
                ]);
        
        
                $user->update([
                    'name'     => $request['name'],
                    //'client_id' => $request['client_id']               
                ]);


               /* $user->roles()->detach();


                foreach ($roles as $role) {

                    $role_name = 'role_' . $role->name;

                    if ($request[$role_name]) {
                        $user->roles()->attach(Role::where('name', $role->name)->first());

                    }
                }*/
            
                session()->flash(
                    'message', 'Personal Info Edited sucessfully!'
                );

            } else {

                $this->validate($request, [
                    'name' => 'required|min:3|max:50',
                    'email' => 'required|email|unique:users',
                ]);
    
    
                $user->update([
                    'name'     => $request['name'],
                    'email'    => $request['email'],
                    
                  ]);
        
                /*
                  $user->roles()->detach();


                  foreach ($roles as $role) {
  
                      $role_name = 'role_' . $role->name;
  
                      if ($request[$role_name]) {
                          $user->roles()->attach(Role::where('name', $role->name)->first());
  
                      }
                  }*/

                  session()->flash(
                    'message', 'Utilizador Atualizado com sucesso!'
                );
            }
            

        } else {
           

            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);

            $user->update([
                'password'     => bcrypt($request['password']),                
              ]);
                
            session()->flash(
                'message', 'Password atualizada com sucesso!'
            );
            
         }
                      
           
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::find($id);

        $user->active = 0;
        $user->save();

        session()->flash(
            'message', 'Utilizador apagado com sucesso'
        );

        return redirect('/users');

    }
}
