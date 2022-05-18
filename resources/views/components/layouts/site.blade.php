<!doctype html>
<html lang="en">

<head>
    @include('components.layouts.head')

    <title>{{$title}}</title>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar">
@include('components.layouts.navbar')

{{$slot}}

@include('components.layouts.footer')
@include('components.layouts.script')
</body>
</html>
