<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    Public function store()
    {
        $api_url = 'https://jsonplaceholder.typicode.com/posts';

        //  Http::withHeaders([
        // ''=>'',
        // ])->get($api_url);

        $response = Http::get($api_url);
        $data = json_decode($response->body());
        $posts = (array)$data;

        //  echo "<pre>";

        // print_r($posts);
        // die;

        // echo "<pre>";

        foreach($posts as $post)
        {
            $post = (array)$post;

            // print_r($post);
            // print_r($post['userId']);

            Post::updateOrCreate(
            [ 'id' => $post['id'] ],
            [
                'id' => $post['id'],
                'user_id' => $post['userId'],
                'title' => $post['title'],
                'body' => $post['body']
            ]);
        }

        // dd(“data stored”);

        // die;
        toastr('Data Stored successfully!','success');
        return view('index', compact('posts'));
    }
}

