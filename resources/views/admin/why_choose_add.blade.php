@extends('admin.layout.app')


@section('heading', 'Add Why Choose Us')
@section('button')
<div class="ms-auto">
  <a href="{{ route('admin_why_choose') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View All</a>
</div>
@endsection

@section('main_section')

<div class="section-body">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <form action="{{ route('admin_why_choose_store') }}" method="post">
                    @csrf
                    
                      <div class="form-group mb-3">
                        <label>Icon *</label>
                        <input type="text" class="form-control" name="icon">
                      </div>
                      <div class="form-group mb-3">
                          <label>Heading *</label>
                          <input type="text" class="form-control" name="heading">
                      </div>
                      <div class="form-group mb-3">
                        <label>Text *</label>
                        <textarea name="text" class="form-control h_100" cols="30" rows="10"></textarea>
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