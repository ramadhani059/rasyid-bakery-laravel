@extends('layout/app')

@section('content')
    <section class="home bg-white" id="contact">
        <div class="container-lg">
            <div class="row min-vh-10 align-items-center align-content-center">
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1 class="fw-bold text-uppercase text-dark-brown m-3 p-4">Contact</h1>
                    </div>
                </div>
                <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif
                <div class="row justify-content-center py-5">
                    <div class="col-md-12">
                        <div class="contact-form text-center">
                            <div class="form-row px-3">
                                <div class="control-group col-md-6">
                                    <input type="text" class="form-control p-4" id="name" name="name" style="border-radius:25px" value="{{ old('name') }}" placeholder="Your Name" />
                                    <p class="help-block text-dark-brown"></p>
                                </div>
                                <div class="control-group col-md-6">
                                    <input type="email" class="form-control p-4" id="email" name="email" style="border-radius:25px" value="{{ old('email') }}" placeholder="Your Email" />
                                    <p class="help-block text-dark-brown"></p>
                                </div>
                                <div class="control-group col-md-12">
                                    <input type="text" class="form-control p-4" id="subject" name="subject" style="border-radius:25px" value="{{ old('subject') }}" placeholder="Subject"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-md-12">
                                    <textarea class="form-control py-3 px-4" id="message" name="message" style="border-radius:25px" value="{{ old('message') }}" rows="5" placeholder="Message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-md-12">
                                    <button class="btn btn-warning" type="submit">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
@endsection
