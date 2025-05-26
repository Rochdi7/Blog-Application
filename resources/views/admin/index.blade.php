@hasanyrole('admin')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.template.css')
    <title>Dashboard</title>
</head>
<body class="with-welcome-text">
    <div class="container-scroller">
        @include('admin.template.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.template.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('admin.template.footer')
    @include('admin.template.scripts')

    <style>
        .chartjs-wrapper {
            position: relative;
            height: 400px;
            width: 100%;
            margin: 0 auto;
        }
    </style>
</body>
</html>
@else
    {{-- Optional fallback --}}
    <script>window.location = "{{ route('home') }}";</script>
@endhasanyrole
