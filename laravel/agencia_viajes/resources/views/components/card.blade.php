@props(['titulo', 'contenido', 'imgSrc', 'imgAlt'])
<div class="card">
 @isset($titulo)
 <h2>{{ $titulo }}</h2>
 @endisset
 @isset($imgSrc)
 @isset($imgAlt)
 <img src="{{asset('assets/images/'.$imgSrc)}}" alt="{{$imgAlt}}" width="128px"/>
 @endisset
 @endisset
 @isset($contenido)
 <p>{{ $contenido }}</p>
 @endisset
</div>
