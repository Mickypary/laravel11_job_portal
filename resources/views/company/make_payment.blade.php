@extends('frontend.layout.app')



@section('main_content')

<div
class="page-top"
style="background-image: url({{ asset('uploads/banner.jpg') }})"
>
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Payment</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content user-panel">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="card">
              @include('company.sidebar')
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <h4>Current Plan</h4>
            <div class="row box-items mb-4">
                <div class="col-md-4">
                    <div class="box1">
                      @if($active_plan == null)
                      <span class="text-danger">You have no active plan</span>               
                      @else
                        <h4>${{ $active_plan['rPackage']->package_price }}</h4>
                        <p>{{ $active_plan->rPackage->package_name }}</p>
                      @endif
                    </div>
                </div>
            </div>

            <h4>Choose a plan and make payment</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                  <form action="{{ route('company_paypal') }}" method="post">
                    @csrf
                    <tr>
                        <td class="w-200">
                            <select name="package_id" class="form-control select2">
                              @foreach($packages as $item)
                                <option value="{{ $item->id }}">{{ $item->package_name }} (${{ $item->package_price }})</option>
                              @endforeach
                            </select>
                        </td>
                        <td>
                          <button type="submit" class="btn btn-primary">
                            Pay with Paypal
                          </button>
                      </td>
                    </tr>
                  </form>

                  <form action="{{ route('company_stripe') }}" method="post">
                    @csrf
                    <tr>
                      <td class="w-200">
                        <select name="package_id" class="form-control select2">
                          @foreach($packages as $item)
                            <option value="{{ $item->id }}">{{ $item->package_name }} (${{ $item->package_price }})</option>
                          @endforeach
                        </select>
                      </td>
                        <td>
                            <button type="submit" class="btn btn-primary">
                              Pay with Stripe
                            </button>
                        </td>
                    </tr>
                  </form>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



@endsection