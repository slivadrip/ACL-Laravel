<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Models\Post;
//use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
       // $posts = $post->all();

       // $posts = $post->where('user_id', auth()->user()->id)->get();
   
        //return view('home', compact('posts'));

        return view('portal.home.index');
    }

    public function update($idPost){

        $post = Post::find($idPost);

        //$this->authorize('update-post', $post);

        if(Gate::denies('edit_post', $post)){
                abort(403, 'Unauthorized');
            }


        return view('post-update', compact('post'));
    }


    public function rolesPermissions(){
        $nameUser = auth()->user()->name ;
      var_dump("<h1>{$nameUser} </h1>");

      foreach (auth()->user()->roles as $role) {
       echo "$role->name ->";
        

       $permissions = $role->permissions;

       foreach ($permissions as $permission) {
        echo " $permission->name  ,";
        
       }
      }
       
    }

}
