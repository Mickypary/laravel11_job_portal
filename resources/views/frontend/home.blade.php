@extends('frontend.layout.app')

@section('seo_title')
{{ $home_page_data->title }}
@endsection

@section('seo_meta_description')
{{ $home_page_data->meta_description }}
@endsection

@section('main_content')

<div class="slider" style="background-image: url({{ asset('uploads/'.$home_page_data->background_image) }})">
  <div class="bg"></div>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="item">
                  <div class="text">
                      <h2>{{ $home_page_data->heading }}</h2>
                      <p>
                        {!! $home_page_data->text !!}
                      </p>
                  </div>
                  <div class="search-section">
                      <form action="jobs.html" method="post">
                          <div class="inner">
                              <div class="row">
                                  <div class="col-lg-3">
                                      <div class="form-group">
                                          <input
                                              type="text"
                                              name=""
                                              class="form-control"
                                              placeholder="{{ $home_page_data->job_title }}"
                                          />
                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <div class="form-group">
                                          <select name="" class="form-select select2">
                                              <option value="">
                                                {{ $home_page_data->job_location }}
                                              </option>
                                              @foreach($all_job_locations as $item)
                                              <option value="{{ $item->id }}">
                                                  {{ $item->name }}
                                              </option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <div class="form-group">
                                          <select name="" class="form-select select2">
                                              <option value="">
                                                {{ $home_page_data->job_category }}
                                              </option>
                                              @foreach($all_job_categories as $item)
                                              <option value="{{ $item->id }}">
                                                  {{ $item->name }}
                                              </option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <button
                                          type="submit"
                                          class="btn btn-primary"
                                      >
                                          <i
                                              class="fas fa-search"
                                          ></i>
                                          {{ $home_page_data->search }}
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@if($home_page_data->job_category_status == 'Show')
<div class="job-category">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="heading">
                  <h2>{{ $home_page_data->job_category_heading }}</h2>
                  <p>
                    {{ $home_page_data->job_category_subheading }}
                  </p>
              </div>
          </div>
      </div>
      <div class="row">
        @foreach($job_categories as $item)
          <div class="col-md-4">
              <div class="item">
                  <div class="icon">
                      <i class="{{ $item->icon }}"></i>
                  </div>
                  <h3>{{ $item->name }}</h3>
                  <p>(5 Open Positions)</p>
                  <a href=""></a>
              </div>
          </div>
          @endforeach
          
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="all">
                  <a href="{{ route('job_categories') }}" class="btn btn-primary"
                      >See All Categories</a
                  >
              </div>
          </div>
      </div>
  </div>
</div>
@endif

@if($home_page_data->why_choose_us_status == 'Show')
<div
  class="why-choose"
  style="background-image: url({{ asset('uploads/'.$home_page_data->why_choose_us_background) }})"
>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="heading">
                  <h2>{{ $home_page_data->why_choose_us_heading }}</h2>
                  <p>
                    {!! $home_page_data->why_choose_us_subheading !!}
                  </p>
              </div>
          </div>
      </div>
      <div class="row">
        @foreach($why_choose as $item)
          <div class="col-md-4">
              <div class="inner">
                  <div class="icon">
                      <i class="{{ $item->icon }}"></i>
                  </div>
                  <div class="text">
                      <h2>{{ $item->heading }}</h2>
                      <p>
                          {!! nl2br($item->text) !!}
                      </p>
                  </div>
              </div>
          </div>
          @endforeach

      </div>
  </div>
</div>
@endif


@if($home_page_data->featured_jobs_status == 'Show')
<div class="job">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="heading">
                  <h2>{{ $home_page_data->featured_jobs_heading }}</h2>
                  <p>{!! $home_page_data->featured_jobs_subheading !!}</p>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-6 col-md-12">
              <div class="item d-flex justify-content-start">
                  <div class="logo">
                      <img src="{{ asset('uploads/logo1.png') }}" alt="" />
                  </div>
                  <div class="text">
                      <h3>
                          <a href="job.html"
                              >Software Engineer, Google</a
                          >
                      </h3>
                      <div
                          class="detail-1 d-flex justify-content-start"
                      >
                          <div class="category">Web Development</div>
                          <div class="location">United States</div>
                      </div>
                      <div
                          class="detail-2 d-flex justify-content-start"
                      >
                          <div class="date">3 days ago</div>
                          <div class="budget">$300-$600</div>
                          <div class="expired">Expired</div>
                      </div>
                      <div
                          class="special d-flex justify-content-start"
                      >
                          <div class="featured">Featured</div>
                          <div class="type">Full Time</div>
                          <div class="urgent">Urgent</div>
                      </div>
                      <div class="bookmark">
                          <a href=""
                              ><i class="fas fa-bookmark active"></i
                          ></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12">
              <div class="item d-flex justify-content-start">
                  <div class="logo">
                      <img src="{{ asset('uploads/logo2.png') }}" alt="" />
                  </div>
                  <div class="text">
                      <h3>
                          <a href="job.html">Web Designer, Amplify</a>
                      </h3>
                      <div
                          class="detail-1 d-flex justify-content-start"
                      >
                          <div class="category">Web Development</div>
                          <div class="location">United States</div>
                      </div>
                      <div
                          class="detail-2 d-flex justify-content-start"
                      >
                          <div class="date">1 day ago</div>
                          <div class="budget">$1000</div>
                      </div>
                      <div
                          class="special d-flex justify-content-start"
                      >
                          <div class="featured">Featured</div>
                          <div class="type">Part Time</div>
                      </div>
                      <div class="bookmark">
                          <a href=""
                              ><i class="fas fa-bookmark"></i
                          ></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12">
              <div class="item d-flex justify-content-start">
                  <div class="logo">
                      <img src="{{ asset('uploads/logo3.png') }}" alt="" />
                  </div>
                  <div class="text">
                      <h3>
                          <a href="job.html"
                              >Laravel Developer, Gimpo</a
                          >
                      </h3>
                      <div
                          class="detail-1 d-flex justify-content-start"
                      >
                          <div class="category">Web Development</div>
                          <div class="location">Canada</div>
                      </div>
                      <div
                          class="detail-2 d-flex justify-content-start"
                      >
                          <div class="date">2 days ago</div>
                          <div class="budget">$1000-$3000</div>
                      </div>
                      <div
                          class="special d-flex justify-content-start"
                      >
                          <div class="featured">Featured</div>
                          <div class="type">Full Time</div>
                          <div class="urgent">Urgent</div>
                      </div>
                      <div class="bookmark">
                          <a href=""
                              ><i class="fas fa-bookmark"></i
                          ></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12">
              <div class="item d-flex justify-content-start">
                  <div class="logo">
                      <img src="{{ asset('uploads/logo4.png') }}" alt="" />
                  </div>
                  <div class="text">
                      <h3>
                          <a href="job.html"
                              >PHP Developer, Kite Solution</a
                          >
                      </h3>
                      <div
                          class="detail-1 d-flex justify-content-start"
                      >
                          <div class="category">Web Development</div>
                          <div class="location">Australia</div>
                      </div>
                      <div
                          class="detail-2 d-flex justify-content-start"
                      >
                          <div class="date">7 hours ago</div>
                          <div class="budget">$1800</div>
                      </div>
                      <div
                          class="special d-flex justify-content-start"
                      >
                          <div class="featured">Featured</div>
                          <div class="type">Full Time</div>
                          <div class="urgent">Urgent</div>
                      </div>
                      <div class="bookmark">
                          <a href=""
                              ><i class="fas fa-bookmark"></i
                          ></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12">
              <div class="item d-flex justify-content-start">
                  <div class="logo">
                      <img src="{{ asset('uploads/logo5.png') }}" alt="" />
                  </div>
                  <div class="text">
                      <h3>
                          <a href="job.html"
                              >Junior Accountant, ABC Media</a
                          >
                      </h3>
                      <div
                          class="detail-1 d-flex justify-content-start"
                      >
                          <div class="category">Marketing</div>
                          <div class="location">Canada</div>
                      </div>
                      <div
                          class="detail-2 d-flex justify-content-start"
                      >
                          <div class="date">2 hours ago</div>
                          <div class="budget">$400</div>
                      </div>
                      <div
                          class="special d-flex justify-content-start"
                      >
                          <div class="featured">Featured</div>
                          <div class="type">Part Time</div>
                          <div class="urgent">Urgent</div>
                      </div>
                      <div class="bookmark">
                          <a href=""
                              ><i class="fas fa-bookmark"></i
                          ></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12">
              <div class="item d-flex justify-content-start">
                  <div class="logo">
                      <img src="{{ asset('uploads/logo6.png') }}" alt="" />
                  </div>
                  <div class="text">
                      <h3>
                          <a href="job.html"
                              >Sales Manager, Tingshu Limited</a
                          >
                      </h3>
                      <div
                          class="detail-1 d-flex justify-content-start"
                      >
                          <div class="category">Marketing</div>
                          <div class="location">Canada</div>
                      </div>
                      <div
                          class="detail-2 d-flex justify-content-start"
                      >
                          <div class="date">9 hours ago</div>
                          <div class="budget">$600-$800</div>
                      </div>
                      <div
                          class="special d-flex justify-content-start"
                      >
                          <div class="featured">Featured</div>
                          <div class="type">Full Time</div>
                          <div class="urgent">Urgent</div>
                      </div>
                      <div class="bookmark">
                          <a href=""
                              ><i class="fas fa-bookmark"></i
                          ></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="all">
                  <a href="jobs.html" class="btn btn-primary"
                      >See All Jobs</a
                  >
              </div>
          </div>
      </div>
  </div>
</div>
@endif



@if($home_page_data->testimonial_status == 'Show')
<div class="testimonial"
  style="background-image: url({{ asset('uploads/'.$home_page_data->testimonial_background) }})"
>
  <div class="bg"></div>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <h2 class="main-header">{{ $home_page_data->testimonial_heading }}</h2>
          </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="testimonial-carousel owl-carousel">
                @foreach($testimonials as $item)
                  <div class="item">
                      <div class="photo">
                          <img src="{{ asset('uploads/'.$item->photo) }}" alt="" />
                      </div>
                      <div class="text">
                          <h4>{{ $item->name }}</h4>
                          <p>{{ $item->designation }}</p>
                      </div>
                      <div class="description">
                          <p>
                            {!! $item->comment !!}
                          </p>
                      </div>
                  </div>
                  @endforeach

              </div>
          </div>
      </div>
  </div>
</div>
@endif



@if($home_page_data->blog_status == 'Show')
<div class="blog">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="heading">
                  <h2>{{ $home_page_data->blog_heading }}</h2>
                  <p>
                    {!! $home_page_data->blog_subheading !!}
                  </p>
              </div>
          </div>
      </div>
      <div class="row">
        @foreach($posts as $item)
          <div class="col-lg-4 col-md-6">
              <div class="item">
                  <div class="photo">
                      <img src="{{ asset('uploads/'.$item->photo) }}" alt="" />
                  </div>
                  <div class="text">
                      <h2>
                          <a href="{{ route('post', $item->slug) }}"
                              >{{ $item->title }}</a
                          >
                      </h2>
                      <div class="short-des">
                          <p>
                            {!! nl2br($item->short_description) !!}
                          </p>
                      </div>
                      <div class="button">
                          <a href="{{ route('post', $item->slug) }}" class="btn btn-primary"
                              >Read More</a
                          >
                      </div>
                  </div>
              </div>
          </div>
          @endforeach

      </div>
  </div>
</div>
@endif


@endsection