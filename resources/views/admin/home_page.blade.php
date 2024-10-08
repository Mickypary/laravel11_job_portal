@extends('admin.layout.app')


@section('heading', 'Home Page')


@section('main_section')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    

                    <form action="{{ route('admin_home_page_update') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row custom-tab">

                            <div class="col-lg-3 col-md-12">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    {{-- Search Tab --}}
                                    <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Search</button>
        
                                    {{-- Job Category Tab --}}
                                    <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">Job Category</button>

                                    {{-- Why Choose Us Tab --}}
                                    <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">Why Choose Us</button>

                                    {{-- Featured Jobs Tab --}}
                                    <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">Featured Jobs</button>

                                    {{-- Why Choose Us Tab --}}
                                    <button class="nav-link" id="v-pills-5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5" aria-selected="false">Testimonial</button>

                                    {{-- Blog Tab --}}
                                    <button class="nav-link" id="v-pills-6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-6" type="button" role="tab" aria-controls="v-pills-6" aria-selected="false">Blog</button>

                                    {{-- Home Page Metas Tab --}}
                                    <button class="nav-link" id="v-pills-7-tab" data-bs-toggle="pill" data-bs-target="#v-pills-7" type="button" role="tab" aria-controls="v-pills-7" aria-selected="false">Home Page SEO Metas</button>
        
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-12">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab" tabindex="0">
                                    {{-- Search Section Start --}}
        
                                            <div class="row">
                
                                                <div class="col-md-12">
                                                    <div class="mb-4">
                                                        <label class="form-label">Heading *</label>
                                                        <input type="text" class="form-control" name="heading" value="{{ $home_page_data->heading }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Text</label>
                                                        <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ $home_page_data->text }}</textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="mb-4">
                                                                <label class="form-label">Job Title *</label>
                                                                <input type="text" class="form-control" name="job_title" value="{{ $home_page_data->job_title }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="mb-4">
                                                                <label class="form-label">Job Location *</label>
                                                                <input type="text" class="form-control" name="job_location" value="{{ $home_page_data->job_location }}">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                        
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="mb-4">
                                                                <label class="form-label">Job Category *</label>
                                                                <input type="text" class="form-control" name="job_category" value="{{ $home_page_data->job_category }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="mb-4">
                                                                <label class="form-label">Search *</label>
                                                                <input type="text" class="form-control" name="search" value="{{ $home_page_data->search }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="mb-4">
                                                        <label class="form-label">Existing Background *</label>
                                                        <div>
                                                            <img src="{{ asset('uploads/'.$home_page_data->background_image) }}" alt="" class="w_300">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Change Background *</label>
                                                        <div>
                                                            <input type="file" class="form-control mt_10" name="background_image">
                                                        </div> 
                                                    </div>
                                                    
                                                </div>
                                            </div>
        
                                    {{-- Search Section End --}}
                                    </div>
        
                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab" tabindex="0">
                                    {{-- Job Category Section Start --}}
        
                                    <div class="row">
                
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Heading *</label>
                                                <input type="text" class="form-control" name="job_category_heading" value="{{ $home_page_data->job_category_heading }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Sub Heading </label>
                                                <input type="text" class="form-control" name="job_category_subheading" value="{{ $home_page_data->job_category_subheading }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Status *</label>
                                                <select name="job_category_status" class="form-control select2">
                                                    <option value="Show" @if($home_page_data->job_category_status == 'Show') selected @endif>Show</option>
                                                    <option value="Hide" {{ $home_page_data->job_category_status == 'Hide' ? 'selected' : '' }}>Hide</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
        
                                    {{-- Job Category Section End --}}
                                    </div>


                                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab" tabindex="0">
                                        {{-- Why Choose Us Section Start --}}
            
                                        <div class="row">
                    
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control" name="why_choose_us_heading" value="{{ $home_page_data->why_choose_us_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Sub Heading </label>
                                                    <input type="text" class="form-control" name="why_choose_us_subheading" value="{{ $home_page_data->why_choose_us_subheading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Existing Background *</label>
                                                    <div>
                                                        <img src="{{ asset('uploads/'.$home_page_data->why_choose_us_background) }}" alt="" class="w_300">
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Change Background *</label>
                                                    <div>
                                                        <input type="file" class="form-control mt_10" name="why_choose_us_background">
                                                    </div> 
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Status *</label>
                                                    <select name="why_choose_us_status" class="form-control select2">
                                                        <option value="Show" @if($home_page_data->why_choose_us_status == 'Show') selected @endif>Show</option>
                                                        <option value="Hide" {{ $home_page_data->why_choose_us_status == 'Hide' ? 'selected' : '' }}>Hide</option>
                                                    </select>
                                                </div>
                                            </div>
    
                                        </div>
            
                                        {{-- Why Choose Us Section End --}}
                                        </div>


                                        <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab" tabindex="0">
                                            {{-- Featured Jobs Section Start --}}
                
                                            <div class="row">
                        
                                                <div class="col-md-12">
                                                    <div class="mb-4">
                                                        <label class="form-label">Heading *</label>
                                                        <input type="text" class="form-control" name="featured_jobs_heading" value="{{ $home_page_data->featured_jobs_heading }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Sub Heading </label>
                                                        <input type="text" class="form-control" name="featured_jobs_subheading" value="{{ $home_page_data->featured_jobs_subheading }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Status *</label>
                                                        <select name="featured_jobs_status" class="form-control select2">
                                                            <option value="Show" @if($home_page_data->featured_jobs_status == 'Show') selected @endif>Show</option>
                                                            <option value="Hide" {{ $home_page_data->featured_jobs_status == 'Hide' ? 'selected' : '' }}>Hide</option>
                                                        </select>
                                                    </div>
                                                </div>
        
                                            </div>
                
                                            {{-- Featured Jobs Section End --}}
                                            </div>




                                            <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab" tabindex="0">
                                                {{-- Testimonial Section Start --}}
                    
                                                <div class="row">
                            
                                                    <div class="col-md-12">
                                                        <div class="mb-4">
                                                            <label class="form-label">Heading *</label>
                                                            <input type="text" class="form-control" name="testimonial_heading" value="{{ $home_page_data->testimonial_heading }}">
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Existing Background *</label>
                                                            <div>
                                                                <img src="{{ asset('uploads/'.$home_page_data->testimonial_background) }}" alt="" class="w_300">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Change Background *</label>
                                                            <div>
                                                                <input type="file" class="form-control mt_10" name="testimonial_background">
                                                            </div> 
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Status *</label>
                                                            <select name="testimonial_status" class="form-control select2">
                                                                <option value="Show" @if($home_page_data->testimonial_status == 'Show') selected @endif>Show</option>
                                                                <option value="Hide" {{ $home_page_data->testimonial_status == 'Hide' ? 'selected' : '' }}>Hide</option>
                                                            </select>
                                                        </div>
                                                    </div>
            
                                                </div>
                    
                                                {{-- Testimonial Section End --}}
                                                </div>



                                                <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab" tabindex="0">
                                                    {{-- Blog Section Start --}}
                        
                                                    <div class="row">
                                
                                                        <div class="col-md-12">
                                                            <div class="mb-4">
                                                                <label class="form-label">Heading *</label>
                                                                <input type="text" class="form-control" name="blog_heading" value="{{ $home_page_data->blog_heading }}">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Sub Heading </label>
                                                                <input type="text" class="form-control" name="blog_subheading" value="{{ $home_page_data->blog_subheading }}">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label">Status *</label>
                                                                <select name="blog_status" class="form-control select2">
                                                                    <option value="Show" @if($home_page_data->blog_status == 'Show') selected @endif>Show</option>
                                                                    <option value="Hide" {{ $home_page_data->blog_status == 'Hide' ? 'selected' : '' }}>Hide</option>
                                                                </select>
                                                            </div>
                                                        </div>
                
                                                    </div>
                        
                                                    {{-- Blog Section End --}}
                                                    </div>





                                                    <div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab" tabindex="0">
                                                        {{-- Home SEO Section Start --}}
                            
                                                        <div class="row">
                                    
                                                            <div class="col-md-12">
                                                                <div class="mb-4">
                                                                    <label class="form-label">Title</label>
                                                                    <input type="text" class="form-control" name="title" value="{{ $home_page_data->title }}">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">Meta Description </label>
                                                                    <textarea name="meta_description" class="form-control h_100" cols="30" rows="10">{{ $home_page_data->meta_description }}</textarea>
                                                                
                                                                </div>
                                                                
                                                            </div>
                    
                                                        </div>
                            
                                                        {{-- Home SEO Section End --}}
                                                        </div>






        
                                </div>

                                {{-- Submit div --}}
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>    {{-- End Col-md-9 --}} 

                        </div>  {{-- End 2nd row  --}}
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
