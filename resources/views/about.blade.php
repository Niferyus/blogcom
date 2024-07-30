@extends('layout')

@section('content')

<div style="display:block; background-color: bisque; padding: 20px; text-align: center;">
  <h1 style="font-size: 2.5rem; margin: 0;">Hakkımızda</h1>
</div>
<section class="about-us" style="margin-top: 20px; padding: 20px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="text-align: center;">
          <div class="about-item" style="margin-bottom: 40px;">
            <img src="assets/images/{{ $aboutdata->aboutimg }}" alt="" style="width: 100%; max-width: 600px; margin: 20px auto; display: block; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <p style="text-align: justify; font-size: 1.2rem; color: #333; line-height: 1.6;">{!! $aboutdata->abouttext !!}</p>
          </div>
      </div>
    </div>
  </div>
</section>


@endsection