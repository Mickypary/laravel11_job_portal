@extends('admin.layout.app')


@section('heading', 'Edit Company Size')
@section('button')
<div class="ms-auto">
  <a href="{{ route('admin_company_size') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View All</a>
</div>
@endsection

@section('main_section')

<div class="section-body">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <form action="{{ route('admin_company_size_update', $company_size_single->id) }}" method="post"">
                    @csrf
                    
                      <div class="form-group mb-3">
                        <label>Name *</label>
                        <input type="text" class="form-control" name="name" value="{{ $company_size_single->name }}">
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Update</button>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>
</div>


@endsection