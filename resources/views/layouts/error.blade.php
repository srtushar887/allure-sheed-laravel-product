{{--@if ($errors->any())--}}
{{--    <div class="text-center">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li style="list-style-type: none">{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="text-center text-danger">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif


