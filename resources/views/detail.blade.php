@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}"/>
<script src="{{ asset('js/detail.js') }}"></script>

@section('title','Detalhes do anúncio')

@section('content')
<div class="card">


                <b>
                    Fotos da moradia
                    <hr/>
                </b>
            @if(!count($imagens))
                <div>
          <img class="img-thumbnail" src="{{ asset('storage/images/ads/none.png') }}">
          </div>
            @else
            <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->
                @foreach($imagens as $imagem)
                    <div class="mySlides">
                        <img src="{{asset('advertisementImages/'.$anuncio->id.'/'.$imagem->getFilename())}}">
                    </div>
                @endforeach


                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                @foreach($imagens as $imagem)
                    <span class="dot" onclick="currentSlide({{ ($loop->index +1) }})"></span>
                @endforeach
            </div>
            <script>showSlides(1);</script>
            @endif

              <br/>

                <b>
                    Detalhes do anunciante
                    <hr/>
                </b>
                <br/>

            <table>
              <tbody>
                <tr>
                  <td>Anunciante</td>
                  <td>{{$user->name}}</td>
                </tr>
                <tr>
                  <td>E-mail</td>
                  <td>
                      <a href="mailto:{{$user->email}}">
                        {{$user->email}}
                      </a>
                  </td>
                </tr>
                <tr>
                  <td>Contacto</td>
                  <td>
                      <a href="tel:{{$user->phone}}">
                      {{$user->phone}}
                      </a>
                  </td>
                </tr>
              </tbody>
            </table>

        <br/>
        <b>
                    Descrição da moradia
                    <hr/>
                </b>
    <br/>
              <table>
              <tbody>
                <tr>
                  <td>Tipo de Aluguer </td>
                  <td>{{$anuncio->type}}</td>
                </tr>

                <tr>
                  <td>Géneros possíveis</td>
                  <td>{{$anuncio->genderRule}}</td>
                </tr>
                <tr>
                  <td>Tipologia do imóvel</td>
                  <td>{{$anuncio->typology}}</td>
                </tr>
                <tr>
                  <td>Recheio da casa</td>
                  <td>
                    <ul>
                        @foreach($advertisementStuffingItems as $advertisementStuffingItem)
                            <li>{{$advertisementStuffingItem}}</li>
                        @endforeach
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
      <br/>

                <b>
                    Logística
                    <hr/>
                </b>
                <br/>

            <table>
              <tbody>
                <tr>
                  <td>Valor da renda/venda </td>
                  <td>{{$anuncio->price}} €</td>
                </tr>
                <tr>
                  <td>Recibo de renda</td>
                  <td>{{ $anuncio->providesInvoice ? 'Sim' : 'Não' }}</td>
                </tr>
                <tr>
                  <td>Pagamento de caução</td>
                  <td>{{ $anuncio->needsSecurityDeposit ? 'Sim' : 'Não' }}</td>
                </tr>
                <tr>
                  <td>Senhorio reside no local</td>
                  <td>{{ $anuncio->landlordResides ? 'Sim' : 'Não' }}</td>
                </tr>
                <tr>
                  <td>Senhorio reside no local</td>
                  <td>Sim</td>
                </tr>
                <tr>
                  <td>Extras incluídos</td>
                  <td>
                    <ul>
                        @foreach($advertisementExtras as $advertisementExtra)
                            <li>{{$advertisementExtra}}</li>
                        @endforeach
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
            <br/>

                <b>
                    Localização
                    <hr/>
                </b>
            <br/>
            <p>
                {{$anuncio->address}}
            </p>
            <div id="map" class="map"/>
            <script>
                drawMap("map");
                setMarker([{{$anuncio->latitude}},{{$anuncio->longitude}}]);
            </script>
        </div>
            <br/>
                <b>
                    Descrição
                    <hr/>
                </b>
            <br/>
            <p>
                {{$anuncio->description}}
            </p>

</div>

@endsection
