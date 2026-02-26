@extends('landing.layouts.landing')
@section('title', 'Servicios')
@section('header')
 <h1>Servicios</h1>
@endsection
@section('content')
<x-card titulo="Excursión a Alicante" precio="50$" contenido="Disfruta de un recorrido por la histórica ciudad de Alicante, visitando su castillo, las playas y su centro cultural." imgSrc="alicante.png" imgAlt="Imagen de Alicante"></x-card>

<x-card titulo="Escapada a Orihuela" precio="25$" contenido="Explora la encantadora ciudad de Orihuela, conocida por su arquitectura medieval y su rica historia. Ideal para una salida de fin de semana." imgSrc="orihuela.png" imgAlt="Imagen de Orihuela"></x-card>

<x-card titulo="Aventura en Valencia" precio="60$" contenido="Vive la vibrante ciudad de Valencia, con visitas a la Ciudad de las Artes y las Ciencias, el Oceanográfico y sus deliciosas paellas." imgSrc="valencia.png" imgAlt="Imagen de Valencia"></x-card>

<x-card titulo="Tour por Torrevieja" precio="25$" contenido="Recorre Torrevieja, una ciudad costera famosa por sus lagunas salinas, sus playas y su ambiente relajante." imgSrc="torrevieja.png" imgAlt="Imagen de Torrevieja"></x-card>
@endsection
