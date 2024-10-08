@extends('frontend.layout.app')

@section('seo_title')
{{ $other_page->signup_page_title }}
@endsection

@section('seo_meta_description')
{{ $other_page->signup_page_meta_description }}
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
                        <h2>{{ $other_page->signup_page_heading }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <div class="login-form">
                            <ul
                                class="nav nav-pills mb-3"
                                id="pills-tab"
                                role="tablist"
                            >
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link active"
                                        id="pills-home-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-home"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-home"
                                        aria-selected="true"
                                    >
                                        <i class="far fa-user"></i> Candidate
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link"
                                        id="pills-profile-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-profile"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-profile"
                                        aria-selected="false"
                                    >
                                        <i class="fas fa-briefcase"></i>
                                        Company
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

                                    <form action="{{ route('candidate.signup.store') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Candidate Name *</label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Username *</label>
                                            <input type="text" name="username" value="{{ old('username') }}" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email Address *</label>
                                            <input type="text" name="email" value="{{ old('email') }}" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Password *</label>
                                            <input type="password" name="password" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Confirm Password *</label>
                                            <input type="password" name="confirm_password" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary bg-website">
                                                Create Account
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0"
                                >

                                    <form action="{{ route('company.signup.store') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Company Name *</label>
                                            <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Contact Person Name *</label>
                                            <input type="text" name="contact_person" value="{{ old('contact_person') }}" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Username *</label>
                                            <input type="text" name="username" value="{{ old('username') }}" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email Address *</label>
                                            <input type="text" name="email" value="{{ old('email') }}" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Password *</label>
                                            <input type="password" name="password" class="form-control"
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Confirm Password *</label>
                                            <input type="password" name="confirm_password" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary bg-website">
                                                Create Account
                                            </button>
                                        </div>

                                </form>
                            </div>
                        </div>

                            <div class="mb-3">
                                <a href="{{ route('login') }}" class="primary-color"
                                    >Existing User? Login Now</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection