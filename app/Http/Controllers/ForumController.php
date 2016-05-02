<?php

namespace App\Http\Controllers;

use App\Forum_post;
use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

use App\Http\Requests;

class ForumController extends Controller
{
    /**
     * Creating a new Post in the forum
     *
     * @param Request $req
     * @return mixed
     */
    public function post(Request $req)
    {
        $post_name = $req->input('name');
        $post_article = $req->input('post');
        $user = User::all()->first();
        $forum_post = new Forum_post();
        $forum_post->title = $post_name;
        $forum_post->post = $post_article;
        $forum_post->uuid = Uuid::uuid();
        $user->forum_posts()->save($forum_post);
        return redirect('/forum/' . $forum_post->id);
    }

    /**
     * View the post recognized by the primary key
     *
     * @param $id
     * @return mixed
     */
    public function view($id)
    {
        $post = Forum_post::find($id);
        $user = $post->user;
        return view('forumArticle', ['post' => $post, 'user' => $user]);
    }

    /**
     * View all the posts paginated by a given number
     *
     * @return mixed
     */
    public function viewPosts()
    {
        $posts = Forum_post::orderBy('created_at', 'desc')->paginate(5);
        return view('forumArticles', ['posts' => $posts]);
    }
}
