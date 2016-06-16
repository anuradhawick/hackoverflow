<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/16/16
 * Time: 19:58
 */
?>
<table class="table table-hover" width="100%">
    <thead>
    <tr>
        <th width="40%">Title</th>
        <th width="60%">Post</th>
    </tr>
    </thead>
    <tbody>
    @foreach($forums as $forum)
        <tr>
            <td><a target="_blank" href="/forum/{{ $forum->id }}">{{ $forum->title }}</a>
            </td>
            <td><a target="_blank" href="javascript:void(0)">{{ str_limit($forum->post,30) }}</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
<div class="col-sm-offset-4 col-sm-2">
    @if($forums->previousPageUrl() != null)
        <a href="{{ $forums->previousPageUrl() }}" class="forum_page">Previous</a>
    @endif
</div>
<div class="col-sm-2">
    @if($forums->count() > $forums->currentPage())
        <a href="{{ $forums->nextPageUrl() }}" class="forum_page">Next</a>
    @endif
</div>
