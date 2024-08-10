@extends('admin.layout.app')


@section('heading', 'Edit Profile')


@section('main_section')

<div class="section-body">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <form action="{{ route('admin_profile_submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="row">
                          <div class="col-md-3">
                              <img src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" alt="" class="profile-photo w_100_p">
                              <input type="file" class="form-control mt_10" name="photo">
                          </div>
                          <div class="col-md-9">
                              <div class="mb-4">
                                  <label class="form-label">Name *</label>
                                  <input type="text" class="form-control" name="name" value="{{ Auth::guard('admin')->user()->name }}">
                                  @error('name')
                                      <div class=" text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="mb-4">
                                  <label class="form-label">Email *</label>
                                  <input type="text" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email }}">
                                  @error('email')
                                      <div class=" text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="mb-4">
                                  <label class="form-label">Password</label>
                                  <input type="password" class="form-control" name="new_password">
                                  @error('new_password')
                                      <div class=" text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="mb-4">
                                  <label class="form-label">Confirm Password</label>
                                  <input type="password" class="form-control" name="retype_password">
                                  @error('retype_password')
                                      <div class=" text-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="mb-4">
                                  <label class="form-label"></label>
                                  <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection