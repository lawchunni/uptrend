@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="imageaboutpagenotfound"
                style="background-image: url('/images/istockphoto-621975996-170667a.jpg');"data-img-width="1280"
                data-img-height="512"></div>
            <article class="pagearticle">
                <div class="pageadjustment">

                    <div class="titlepagenotfound">
                        <span><strong>Page Not Found</strong></span>
                    </div>
                    <br />
                    <div class="subtitlepagenotfound">
                        <span>This page is not longer available</span>
                    </div>
                    <br />
                    <div class="actionpagenotfound">
                        <a class="btn btn_black" href="/">
                            <span>Go To Homepage</span>
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection
