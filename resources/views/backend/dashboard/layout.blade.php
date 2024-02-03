<!DOCTYPE html>
<html>
    <head>
        {{-- header --}}
        @include('backend.dashboard.component.header')
    </head>
    <body>
        <div id="wrapper">
            {{-- slidebar --}}
            @include('backend.dashboard.component.slidebar')
                <div id="page-wrapper" class="gray-bg">
                    {{-- nav --}}
                    @include('backend.dashboard.component.nav')
                    {{-- home --}}
                    @include($templates)
                </div>
        </div>
        {{-- script --}}
        @include('backend.dashboard.component.script')
    </body>
</html>
