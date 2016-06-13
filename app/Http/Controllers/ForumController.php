<?php

namespace App\Http\Controllers;

use App\Forum_post;
use App\ForumFeedBack;
use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use Psy\Util\Json;

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
        $user = Auth::user();
        $forum_post = new Forum_post();
        $forum_post->title = $post_name;
        $forum_post->post = $post_article;
        $forum_post->uuid = Uuid::uuid();
        try {
            $user->forum_posts()->save($forum_post);
        } catch (\Exception $e) {
            abort(500);
        }
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
        $post = Forum_post::findOrFail($id);
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

    /**
     * Return the number of likes for a given post by the forum ID
     *
     * @return Json
     */
    public function likesData()
    {
        $id = request()->input('forumID');
        $likeCount = ForumFeedBack::where('forum_id', $id)->where('action', 1)->count();
        $userLiked = false;
        if (Auth::check()) {
            $user = Auth::user();
            if ($feedback = ForumFeedBack::where('forum_id', $id)->where('user_id', $user->id)->first()) {
                $feedback->action == 1 ? $userLiked = true : $userLiked = false;;
            }
        }
        return response()->json(['likeCount' => $likeCount, 'userLiked' => $userLiked]);
    }


    /**
     * Like the forum post identified by Like flag and forum id
     * 1 - Like, 0 - Unlike
     *
     * @return Json
     */
    public function likeForum()
    {
        $id = request()->input('forumID');
        $like = request()->input('like');
        $user = Auth::user();
        $forum = Forum_post::findOrFail($id);
        if ($feedback = ForumFeedBack::where('forum_id', $id)->where('user_id', $user->id)->first()) {
            $feedback->action = $like;
            try {
                DB::transaction(function () use ($feedback, $user, $forum) {
                    $feedback->save();
                    $user->forumFeedback()->save($feedback);
                    $forum->forumFeedback()->save($feedback);
                });
            } catch (\Exception $e) {
                abort(500);
            }
        } else {
            $feedback = new ForumFeedBack();
            $feedback->action = $like;
            try {
                DB::transaction(function () use ($feedback, $user, $forum) {
                    $feedback->save();
                    $user->forumFeedback()->save($feedback);
                    $forum->forumFeedback()->save($feedback);
                });
            } catch (\Exception $e) {
                abort(500);
            }
        }
        return "true";
    }


    /**
     * Render the editable forum page
     *
     * @param $id
     * @return View
     */
    public function editForum($id)
    {
        $forum = Forum_post::findOrFail($id);
        if ($forum->user == Auth::user()) {
            return view('editor_layouts.updateforum', ["title" => $forum->title, "post" => $forum->post]);
        } else {
            echo "invalid";
        }
    }


    /**
     * Update and save the forum
     *
     *
     * @param $id
     * @return View
     */
    public function update($id)
    {
        // validating the user
        $forum = Forum_post::findOrFail($id);
        if ($forum->user == Auth::user()) {
            switch (request()->input('submit')) {
                case 'update':
                    try {
                        $forum->title = request()->input('name');
                        $forum->post = request()->input('post');
                        $forum->save();
                    } catch (\Exception $e) {
                        abort(500);
                    }
                    return redirect('/forum/' . $id);
                    break;
                case 'delete':
                    try {
                        DB::transaction(function () use ($forum) {
                            $forum->forumFeedback()->delete();
                            $forum->delete();
                        });
                    } catch (\Exception $e) {
                        abort(500);
                    }
                    return redirect('/profile/forum');
                    break;
            }
        } else {
            // Un authorized user
            abort(403);
        }
    }
}
