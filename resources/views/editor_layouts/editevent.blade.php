<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/27/16
 * Time: 23:44
 */
?>
@extends('layouts.master')
@if($type == 1)
    @section('title','Edit hackathon event')
@elseif($type == 2)
    @section('title','Edit meetup event')
@elseif($type == 3)
    @section('title','Edit other event')
@endif
@section('body_content')
    <section class="container">
        <div class="center wow fadeInDown">
            <div class="col-md-12">
                <h2>Update event details</h2>
                <hr>
                <form id="event_form" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Name</label>
                            <div class="col-sm-8">
                                <input id="name" name="name" type="text"
                                       placeholder="Name of the event"
                                       class="form-control input-md" required value="{{ $event->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Organizer</label>
                            <div class="col-sm-8">
                                <input id="organizer" name="organizer" type="text"
                                       placeholder="eg: Microsoft"
                                       class="form-control input-md" required
                                       value="{{ $event->event_info->organizer }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Venue</label>
                            <div class="col-sm-8">
                                <input id="venue" name="venue" type="text"
                                       placeholder="eg: BMICH"
                                       class="form-control input-md" required value="{{ $event->event_info->venue }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Registration deadline</label>
                            <div class="col-sm-8">
                                <input id="regDate" name="regDate" type="date"
                                       value="{{ $event->event_info->reg_deadline }}"
                                       min="{{ \Carbon\Carbon::now()->toDateString() }}"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Event date</label>
                            <div class="col-sm-8">
                                <input id="eventDate" name="eventDate" type="date"
                                       value="{{ $event->event_info->event_date }}"
                                       min="{{ \Carbon\Carbon::now()->toDateString() }}"
                                       class="form-control input-md" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Description</label>
                            <div class="col-sm-8">
                                <textarea id="desc" name="desc" type="text"
                                          placeholder="Small description explaining the event"
                                          class="form-control input-md"
                                          required>{{ $event->event_info->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Flier URL</label>
                            <div class="col-sm-8">
                                <input id="furl" name="furl" type="url"
                                       placeholder="URL for the flier image"
                                       class="form-control input-md" value="{{ $event->commondata->flier_url }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Web URL</label>
                            <div class="col-sm-8">
                                <input id="wurl" name="wurl" type="url"
                                       placeholder="Web site of the organizer or the registration page"
                                       class="form-control input-md" value="{{ $event->commondata->url }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Google form</label>
                            <div class="col-sm-8">
                                <input id="gform" name="gform" type="url"
                                       placeholder="Link for the GOOGLE form"
                                       class="form-control input-md" value="{{ $event->commondata->google_form }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Tags</label>
                            <div class="col-sm-8">
                                <input id="tags" name="tags" type="text"
                                       placeholder="Comma separated tags. eg: java, iot, android"
                                       class="form-control input-md" required
                                       value="<?php
                                       $i = 0;
                                       foreach ($event->tags as $tag) {
                                           if ($i != 0) {
                                               echo ', ';
                                           }
                                           echo $tag->tag;
                                           $i++;
                                       }
                                       ?>">
                            </div>
                        </div>
                        {{-- Common data for the 3 event types --}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Participant information</label>
                            <div class="col-sm-8">
                                <input id="partInfo" name="partInfo" type="text"
                                       placeholder="eg: University students/ Individuals etc"
                                       class="form-control input-md" required
                                       value="@if($event->hackathon){{ $event->hackathon->participant_info }}@elseif($event->otherevent){{ $event->otherevent->participant_info }}@elseif($event->meetup){{ $event->meetup->participant_info }}@endif">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">Duration information</label>
                            <div class="col-sm-8">
                                <input id="duration" name="duration" type="text"
                                       placeholder="eg: 36 hours"
                                       class="form-control input-md" required
                                       value="@if($event->hackathon){{ $event->hackathon->duration }}@elseif($event->otherevent){{ $event->otherevent->duration }}@elseif($event->meetup){{ $event->meetup->duration }}@endif">
                            </div>
                        </div>
                        @if($type != 1)
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="name">Head count</label>
                                <div class="col-sm-8">
                                    <input id="headcount" name="headcount" type="number" min="1"
                                           placeholder="Total number of participants"
                                           class="form-control input-md" required
                                           value="@if($event->otherevent){{ $event->otherevent->head_count }}@elseif($event->meetup){{ $event->meetup->head_count }}@endif">
                                </div>
                            </div>
                            {{-- Hackathon specific information --}}
                        @elseif($type == 1)
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="name">Reward</label>
                                <div class="col-sm-8">
                                    <textarea id="reward" name="reward" type="text"
                                              placeholder="Reward of the event"
                                              class="form-control input-md"
                                              required>{{ $event->hackathon->reward }}</textarea>
                                </div>
                            </div>
                            {{-- Min per team --}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="name">Min per team</label>
                                <div class="col-sm-8">
                                    <input id="minTeam" name="minTeam" type="number" min="1"
                                           placeholder="Minimum number per team"
                                           class="form-control input-md" required
                                           value="{{ $event->hackathon->min_per_team_no }}">
                                </div>
                            </div>
                            {{-- Max per team --}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="name">Max per team</label>
                                <div class="col-sm-8">
                                    <input id="maxTeam" name="maxTeam" type="number" min="1"
                                           placeholder="Maximum number per team"
                                           class="form-control input-md" required
                                           value="{{ $event->hackathon->max_per_team_no }}">
                                </div>
                            </div>
                            {{-- No of teams selected --}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="name">Team count</label>
                                <div class="col-sm-8">
                                    <input id="teamcount" name="teamcount" type="number" min="1"
                                           placeholder="Number of teams selected"
                                           class="form-control input-md" required
                                           value="{{ $event->hackathon->team_count }}">
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="btn"></label>
                            <div class="col-sm-1 col-sm-offset-6">
                                <button type="submit" name="submit" class="btn btn-default btn-block" value="update">
                                    Update
                                </button>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" name="submit" class="btn btn-default btn-block" value="delete">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <hr>
            </div><!--/.row-->

        </div>
    </section><!--/#blog-->
    <script>
        $(document).ready(function () {
            jQuery.validator.addMethod("greaterThan",
                    function (value, element, params) {

                        if (!/Invalid|NaN/.test(new Date(value))) {
                            return new Date(value) > new Date($(params).val());
                        }

                        return isNaN(value) && isNaN($(params).val())
                                || (Number(value) > Number($(params).val()));
                    }, 'Must be greater than registration deadline.');

            jQuery.validator.addMethod("largerThan",
                    function (value, element, params) {

                        if (!/Invalid|NaN/.test(new Date(value))) {
                            return value >= $(params).val();
                        }

                        return isNaN(value) && isNaN($(params).val())
                                || value >= $(params).val();
                    }, 'Must be greater than or equal to minimum number.');

            $("#event_form").validate({
                rules: {
                    eventDate: {
                        greaterThan: $('#event_form').find("#regDate")
                    },
                    maxTeam: {
                        largerThan: $('#event_form').find("#minTeam")
                    }
                }
            });
        });
    </script>
@endsection
