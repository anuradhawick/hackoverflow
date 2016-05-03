<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/4/16
 * Time: 02:14
 */
?>
@extends('layouts.master')
@section('title','Contact us')
@section('contactus','active')
@section('body_content')
    <section id="contact-info">
        <div class="center">
            <h2>Want to Reach Us?</h2>
            <p class="lead">Ask us anything or give us feedback, we are listening to you.</p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d55444.35850301776!2d79.92527791946048!3d7.019772278601448!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f9a3c36f2f03%3A0x67ee085af4f07579!2zN8KwMDInNDIuOCJOIDc5wrA1NycyNy41IkU!5e0!3m2!1sen!2slk!4v1462308902129" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5>Head Office</h5>
                                    <p>387/23, Pokuna Junction, <br>
                                        Kadawatha Road,<br>
                                        Ganemulla 11020</p>
                                    <p>Phone: (+94) 0712 165 724<br>
                                        Email Address: anuradhawick@gmail.com</p>
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-page">
        <div class="container">
            <div class="center">
                <h2>Drop Your Message</h2>
                <p class="lead">We will get back to you.</p>
            </div>
            <div class="row contact-wrap">
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post"
                      action="sendemail.php">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control"
                                      rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">
                                Submit Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection