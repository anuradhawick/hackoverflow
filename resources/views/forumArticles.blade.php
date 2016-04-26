<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 4/14/16
 * Time: 22:13
 */ ?>

@extends('layouts.master')
@section('title','Post in forum')
@section('forum','active')
@section('body_content')

    <section class="container">
        <div class="center wow fadeInDown">
            <div class="blog">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($posts as $post)
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-sm-10 blog-content">
                                        <h2 class="text-left"><a
                                                    href="{{ '/forum/' . $post->id }}">{{ $post->title }}</a>
                                        </h2>
                                        <h3 class="text-left">{{ substr($post->post, 0, 100).'...' }}</h3>
                                    </div>
                                </div>
                            </div><!--/.blog-item-->
                        @endforeach
                        <div class="text-center">
                            <?php
                            $paginator = $posts;
                            $link_limit = 7;
                            ?>
                            @if ($paginator->lastPage() > 1)
                                <ul class="pagination">
                                    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                                        <a href="{{ ($paginator->currentPage() == 1) ? 'javascript:void(0)': $paginator->previousPageUrl() }}"><i
                                                    class="fa fa-long-arrow-left"></i>Previous</a>
                                    </li>
                                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                                        <?php
                                        $half_total_links = floor($link_limit / 2);
                                        $from = $paginator->currentPage() - $half_total_links;
                                        $to = $paginator->currentPage() + $half_total_links;
                                        if ($paginator->currentPage() < $half_total_links) {
                                            $to += $half_total_links - $paginator->currentPage();
                                        }
                                        if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                                            $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                                        }
                                        ?>
                                        @if ($from < $i && $i < $to)
                                            <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                                                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'disabled' : '' }}">
                                        <a href="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'javascript:void(0)':$paginator->url($paginator->currentPage()+1) }}">Next<i
                                                    class="fa fa-long-arrow-right"></i></a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div><!--/.col-md-8-->

                </div><!--/.row-->
            </div>
        </div>
    </section>

@endsection