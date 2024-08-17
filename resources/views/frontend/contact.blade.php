@extends('frontend.layout.app')

@section('seo_title')
{{ $contact_page->title }}
@endsection

@section('seo_meta_description')
{{ $contact_page->meta_description }}
@endsection


@section('main_content')

<div
            class="page-top"
            style="background-image: url('uploads/banner.jpg')"
        >
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="contact-form">
                            <form action="{{ route('contact.store') }}" method="post">
                              @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label"
                                        >Email Address</label
                                    >
                                    <input type="text" name="email" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label"
                                        >Message</label
                                    >
                                    <textarea
                                        class="form-control" name="message"
                                        rows="3"
                                    ></textarea>
                                </div>
                                <div class="mb-3">
                                    <button
                                        type="submit"
                                        class="btn btn-primary bg-website"
                                    >
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="map">
                            {!! $contact_page->map_code !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection