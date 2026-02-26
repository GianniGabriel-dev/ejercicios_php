@extends('landing.layouts.landing')
@section('title', 'Contacto')
@section('header')
 <h1>Contacto</h1>
@endsection
@section('content')
<section class="contact">
    <img src="{{ asset('assets/images/map.png') }}" alt="Mapa de torrevieja">
    <article>
        <h3>Contáctanos</h3>
        <div>
            <p>Teléfono: +34654302030</p>
            <p>Email: safetravel@gmail.com</p>
            <p>Dirección de oficinas: Torrevieja Calle de las Rosas Nº163</p>
        </div>
    </article>
</section>

@endsection
