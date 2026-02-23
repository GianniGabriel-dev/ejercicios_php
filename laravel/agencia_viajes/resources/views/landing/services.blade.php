@extends('landing.layouts.landing')
@section('title', 'Servicios')
@section('header')
 <h1>Servicios</h1>
@endsection
@section('content')
    <x-card titulo="Servicio 1" contenido="Descripción breve del servicio 1." imgSrc="alicante.png" imgAlt="Imagen de Alicante"></x-card>
    <x-card titulo="Servicio 2" contenido="Descripción breve del servicio 2." imgSrc="orihuela.png" imgAlt="Imagen de Orihuela"></x-card>
    <x-card titulo="Servicio 3" contenido="Descripción breve del servicio 3." imgSrc="valencia.png" imgAlt="Imagen de Valencia"></x-card>
    <x-card titulo="Servicio 3" contenido="Descripción breve del servicio 3." imgSrc="valencia.png" imgAlt="Imagen de "></x-card>
@endsection
