<?php

namespace App\Controllers;

use \Core\View;
use \Core\App;
use \App\Models\PostsModel;
use \App\Controllers\Controller;

class Posts extends Controller
{

    public function Home()
    {
        $model = new PostsModel();
        $data = $model->all();
        //App::secured(); (redirect to /login page if user not authentificate)
        View::renderTemplate('pages/index.twig', [
            'title' => 'Home',
            'description' => 'Your description',
            'posts' => $data
        ]);
    }


}
