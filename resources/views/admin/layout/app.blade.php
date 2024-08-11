<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- styles.css --}}
    @include('admin.layout.styles')

    {{-- Scripts --}}
    @include('admin.layout.scripts')

    
</head>

<body>
<div id="app">
    <div class="main-wrapper">

        {{-- Navbar --}}
        @include('admin.layout.navbar')


        {{-- Sidebar --}}
        @include('admin.layout.sidebar')

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('heading')</h1>
                    @yield('button')
                </div>

                {{-- Main Section --}}
                @yield('main_section')

            </section>
        </div>

    </div>
</div>

@include('admin.layout.scripts_footer')

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ $error }}',
        });
        </script>
    @endforeach
@endif


@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

@if(session()->get('info'))
    <script>
        iziToast.info({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('info') }}',
        });
    </script>
@endif

</body>
</html>