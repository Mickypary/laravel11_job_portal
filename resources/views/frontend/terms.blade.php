@extends('frontend.layout.app')

@section('seo_title')
{{ $term_page->title }}
@endsection

@section('seo_meta_description')
{{ $term_page->meta_description }}
@endsection

@section('main_content')

<div
            class="page-top"
            style="background-image: url('{{ asset('uploads/banner.jpg') }}')"
        >
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $term_page->heading }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {!! $term_page->content !!}
                    </div>
                </div>
            </div>
        </div>



@endsection