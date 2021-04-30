<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    //one to many relationship

// add post
public function addPost(){

$post= new Post();
$post->title=" First Post Title";
$post->body="First post Desciption";
$post->save();
return "Post has been created";
}
// add comment
public function addComment($id){
$post= Post::find($id);
$comment= new Comment();
$comment->comment="This is first Comment";
$post->comments()->save($comment);
return "Comment has been posted";

}
// get comment by post according to id
public function getCommentsByPost($id){
$comments =Post::find($id)->comments;
return $comments;

}

}
