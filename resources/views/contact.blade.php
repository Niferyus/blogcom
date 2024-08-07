@extends('layout')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div style="display: block; background-color: bisque; padding: 20px; text-align: center;">
  <h1 style="font-size: 2.5rem; margin: 0;">İletişim</h1>
</div>

<section class="contact-us" style="margin-top: 20px; padding: 20px;">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-12">
          <div class="down-contact">
            <div class="row">
              <div class="col-lg-8" style="border-right: 2px solid #ddd; padding-right: 30px;">
                <div class="sidebar-item contact-form">
                  <div class="sidebar-heading" style="margin-top: 1rem;">
                    <h2>Bizimle iletişime geçin...</h2>
                  </div>
                  <div class="content">

                    <form name="createmessage" id="createmessage" action="/contact" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <fieldset style="margin-bottom: 1rem;">
                            <input class="form-control" name="name" type="text" id="name" placeholder="Adınız:" required="" style="border-radius: 5px;">
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <fieldset style="margin-bottom: 1rem;">
                            <input class="form-control" name="mail" type="mail" id="mail" placeholder="Mail adresiniz:" required="" style="border-radius: 5px;">
                          </fieldset>
                        </div>
                        <div class="col-md-12 col-sm-12">
                          <fieldset style="margin-bottom: 1rem;">
                            <input class="form-control" name="topic" type="text" id="topic" placeholder="Konu" maxlength="30" style="border-radius: 5px;">
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset style="margin-bottom: 1rem;">
                            <textarea class="form-control" name="message" rows="6" id="message" placeholder="Mesajınız" required="" style="border-radius: 5px;"></textarea>
                          </fieldset>
                        </div>
                        <div class="col-md-12 col-sm-12">
                          <fieldset style="margin-bottom: 1rem;">
                            <input class="form-control" name="totalclient" type="number" id="totalclient" placeholder="{{ "$number1 + $number2 = ? "}}" style="border-radius: 5px;">
                          </fieldset>
                        </div>
                        <input type="hidden" name="number1" id="number1" value="{{ $number1 }}">
                        <input type="hidden" name="number2" id="number2" value="{{ $number2 }}">
                        <div class="col-lg-12">
                          <fieldset style="margin-bottom: 1rem;">
                            <button type="submit" id="form-submit" class="main-button" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; padding: 10px 20px;">Mesajı Gönder</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-4" style="padding-left: 30px;">
                <div class="sidebar-item contact-information">
                  <div class="sidebar-heading" style="margin-top: 1rem;">
                    <h2>İletişim Bilgileri</h2>
                  </div>
                  <div class="content">
                    <ul style="list-style: none; padding: 0;">
                      <li style="margin-bottom: 10px;">
                        <h5><i class="bi bi-telephone" style="margin-right: 10px;"></i> {{ $contactinfo->phonenumber }}</h5>
                      </li>
                      <li style="margin-bottom: 10px;">
                        <h5><i class="bi bi-printer" style="margin-right: 10px;"></i> {{ $contactinfo->faxnumber }}</h5>
                      </li>
                      <li style="margin-bottom: 10px;">
                        <h5><i class="bi bi-envelope" style="margin-right: 10px;"></i> {{ $contactinfo->firstmail }}</h5>
                      </li>
                      <li style="margin-bottom: 10px;">
                        <h5><i class="bi bi-envelope" style="margin-right: 10px;"></i> {{ $contactinfo->secondmail }}</h5>
                      </li>
                      <li style="margin-bottom: 10px;">
                        <h5><i class="bi bi-building" style="margin-right: 10px;"></i> {{ $contactinfo->address }}</h5>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
</section>


@endsection 