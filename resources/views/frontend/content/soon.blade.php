@extends('frontend.template')

@section ('content')
    <link href="{{url('assets/custom/util.css')}}" rel="stylesheet">
    <link href="{{url('assets/custom/soon.css')}}" rel="stylesheet">
    <style>
        body {
            overflow: hidden;
        }
    </style>
    <div class="bg-g1 size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-t-55 p-b-35 respon1">
        <span></span>
        <div class="flex-col-c p-t-50 p-b-50">
            <h3 class="l1-txt1 txt-center p-b-10">
                @lang('quran.coming-soon')
            </h3>

            <p class="txt-center l1-txt2 p-b-60">
                @lang('quran.soon-message')
            </p>
        </div>

        <div style="height: 200px"></div>
    </div>
@endsection
