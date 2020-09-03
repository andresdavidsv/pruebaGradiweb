@extends('layouts.layout')

@section('title')
    @lang('Contact')
@stop

@section('content')

<section class="container">

@if (session('status'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <h1 class="display-5">
            @lang('Thanks for trusting us! We will contact you as soon as possible.')
        </h1> 
        <button type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close">
            <span aria-hidden="true">
                &times;
            </span>
        </button>
    </div>
@endif

    <h1 class="my-4"><i class="fas fa-headset" aria-hidden="true"> CONTACTANOS</i></h1>
        <p class="subtitle">
            ¿Tiene usted alguna duda? Por favor no dude en contactarnos directamente. Nuestro equipo se pondrá en contacto con usted en cuestión de horas para ayudarlo.
        </p>

    <div class="row">

        <div class="col-md-9">
            <form id="contact-form" name="contact-form" action="{{route('contact',app()->getLocale())}}" method="POST">
                {!! RecaptchaV3::field('contact-form') !!}
                @csrf
                <div class="row">

                    <div class="col-md-6">
                            <input type="text"
                            id="name" name="name"
                            class="form-control"
                            value="{{ old('name','') }}">
                            <label for="name">
                                Tu nombre
                            </label>
                            @error('name')
                                <strong>{{$errors->first('name')}}</strong>
                            @enderror
                    </div>

                    <div class="col-md-6">
                            <input type="text"
                            id="email" name="email"
                            class="form-control"
                            value="{{ old('email','') }}">
                            <label for="email">
                                Tu Email
                            </label>
                            @error('email')
                                <strong>{{$errors->first('email')}}</strong>
                            @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                            <input type="text"
                            id="subject" name="subject"
                            class="form-control"
                            value="{{ old('subject','') }}">
                            <label for="subject">
                                Encabezado
                            </label>
                            @error('subject')
                                <strong>{{$errors->first('subject')}}</strong>
                            @enderror
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea">{{ old('message') }}</textarea>
                            <label for="message">
                                Tu mensaje
                            </label>
                            @error('message')
                                <strong>{{$errors->first('message')}}</strong>
                            @enderror
                    </div>
                </div>

            </form>

            <div class="text-center text-md-left">
                <button type="submit" class="btn btn-primary btn-block" onclick="document.getElementById('contact-form').submit();">
                    Enviar
                </button>
            </div>
            <div class="status"></div>
        </div>


        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Santiago de Cali, Col</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 57 312 259 9959</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>contacto@turbotransav.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->
    </div>

    <div class="contact__area py-3 col-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.521152356574!2d-76.50941688591057!3d3.465807652092484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a73cd22fe32b%3A0x9b8f7039132c2508!2sTurbo%20Transportes%20AV%20sas!5e0!3m2!1ses-419!2sco!4v1594528557155!5m2!1ses-419!2sco" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

</section>

{!! RecaptchaV3::initJs() !!}
@endsection