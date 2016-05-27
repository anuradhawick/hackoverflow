<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/27/16
 * Time: 18:56
 */
?>
@extends('layouts.master')
@if($type==1)
    @section('title','My Hackathons')
@elseif($type==2)
    @section('title','My Meetups')
@elseif($type==3)
    @section('title','My events')
@endif
@section('body_content')
    <section id="blog" class="container">
        <div class="center wow fadeInDown">
            <div class="blog">
                <div class="row">
                    <div class="col-sm-12">
                        @if(sizeof($events) < 1)
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-sm-12 blog-content">
                                        <h2 class="text-center">
                                            There are no events at the moment, keep looking :)
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach($events as $e)
                                <div class="blog-item col-sm-6">
                                    <div class="">
                                        <div class="blog-content well">
                                            <h2 class="text-left"><a
                                                        href="/events/{{ $e->type }}/{{ $e->id }}">{{ $e->name }}</a>
                                            </h2>
                                            <h3 class="text-left">
                                                {{ substr($e->event_info->description ,0,500).'...' }}
                                                <br>
                                                On: {{ $e->event_info->event_date }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="text-center">
                        <?php
                        $paginator = $events;
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
                </div>
            </div>
        </div>
    </section>
@endsection