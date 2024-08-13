@extends('admin.layout.app')


@section('heading', 'Add Post')
@section('button')
<div class="ms-auto">
  <a href="{{ route('admin_post') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View All</a>
</div>
@endsection

@section('main_section')

<div class="section-body">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                      <div class="form-group mb-3">
                        <label>Photo *</label>
                        <div>
                          <input type="file" class="form-control" name="photo">
                        </div>
                      </div>
                      <div class="form-group mb-3">
                          <label>Title *</label>
                          <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                      </div>
                      <div class="form-group mb-3">
                          <label>Slug *</label>
                          <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                      </div>
                      <div class="form-group mb-3">
                          <label>Short Description *</label>
                          <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ old('short_description') }}</textarea>
                      </div>
                      <div class="form-group mb-3">
                        <label>Description *</label>
                        <textarea name="description" class="form-control h_100 editor" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>
</div>


@endsection