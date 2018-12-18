@extends('layouts.app')
<link href="{{ asset('css/inserirAnuncio.css') }}" rel="stylesheet">
        <script defer="" src="{{asset('js/inserirAnuncio.js')}}">
        </script>
        @section('title','Novo anúncio')
@section('content')
        <form action="/saveAnuncio" method="POST" role="form">
                {{ csrf_field() }}
                <div class="card">
                        <div>
                                <h4>
                                        Informação Básica
                                </h4>
                                <hr/>
                        </div>
                        <div>
                                <label>
                                        Título do anúncio *
                                </label>
                                <input class="form-control" id="title" name="title" type="text">
                                </input>
                        </div>
                        <div>
                                <label>
                                        Preço *
                                </label>
                                <input class="form-control" id="price" name="price" type="number">
                                </input>
                        </div>
                        <div>
                                <label>
                                        Área útil m
                                        <sup>
                                                2
                                        </sup>
                                        *
                                </label>
                                <input class="form-control" id="areaU" name="areaU" type="number">
                                </input>
                        </div>
                        <div>
                                <label>
                                        Área bruta m
                                        <sup>
                                                2
                                        </sup>
                                        *
                                </label>
                                <input class="form-control" id="areaB" name="areaB" type="number">
                                </input>
                        </div>
                        <div>
                                <label>
                                        Tipologia *
                                </label>
                                <select class="custom-select form-control" id="typology" name="typology">
                                        @foreach ($typologies as $typology)
                                        <option value="{{ $typology->id }}">
                                                {{ $typology->description }}
                                        </option>
                                        @endforeach
                                </select>
                        </div>
                        <div>
                                <label>
                                        Ano de construção *
                                </label>
                                <input class="form-control" id="anoConstrucao" name="anoConstrucao" type="date">
                                </input>
                        </div>
                        <div>
                                <label>
                                        Casas de banho *
                                </label>
                                <input class="form-control" id="qtdWC" name="qtdWC" type="number">
                                </input>
                        </div>
                        <div>
                                <label>
                                        Tipo de anúncio *
                                </label>
                                <input class="form-check-input" id="isPrivate" name="isPrivate" type="radio" value="1">
                                        <label class="form-check-label" for="defaultCheck1">
                                                Privado
                                        </label>
                                        <input class="form-check-input" id="isPrivate" name="isPrivate" type="radio" value="1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                        Profissional
                                                </label>
                                        </input>
                                </input>
                        </div>
                        <div>
                                <label>
                                        Tipo de aluguer/venda *
                                </label>
                                <select class="custom-select form-control" id="type" name="type">
                                        @foreach ($advertisements_types as $advertisement_type)
                                        <option value="{{$advertisement_type->id }}">
                                                {{ $advertisement_type->description }}
                                        </option>
                                        @endforeach
                                </select>
                        </div>
                        <div>
                                <h4>
                                        Adicionar multimédia
                                </h4>
                                <hr/>
                                <div>
                                        <label>
                                                Insira pelo menos uma imagem para tornar o seu anúncio mais apelativo
                                        </label>
                                        <div class="custom-file">
                                                <label class="btn btn-lg btn-success fa fa-plus" for="file">
                                                </label>
                                                <input accept="image/*" class="btn btn-basic fa fa-edit" id="file" name="fotos" style="display:none;" type="file"/>
                                        </div>
                                </div>
                                <div>
                                        <div id="images">
                                        </div>
                                </div>
                        </div>
                        <div>
                                <h4>
                                        Adicionar Localização
                                </h4>
                                <div class="map" id="mapa">
                                </div>
                                <input class="form-control" id="morada" name="address" placeholder="Morada" type="text">
                                </input>
                        </div>
                        <div>
                                <h4>
                                        Informação Detalhada
                                </h4>
                                <textarea class="form-control" id="description" name="description">
                                </textarea>
                        </div>
                        <div class="container shadow p-4 mb-4 bg-white">
                                <div class="row">
                                        <h4>
                                                Características
                                        </h4>
                                </div>
                                @foreach ($extras as $extra)
                                <input name="extra[]" type="checkbox" value="{{ $extra->id }}">
                                        {{ $extra->name }}
                                        <br>
                                                @endforeach
                                        </br>
                                </input>
                        </div>
                        <div>
                                <div class="row">
                                        <h4>
                                                Recheio
                                        </h4>
                                </div>
                                @foreach ($stuffingItems as $stuffingItem)
                                <input name="stuffingItem[]" type="checkbox" value="{{ $stuffingItem->id }}">
                                        {{ $stuffingItem->name }}
                                        <br>
                                                @endforeach
                                        </br>
                                </input>
                        </div>
                        <div>
                                <div>
                                        <h4>
                                                Informação adicional
                                        </h4>
                                </div>
                                <div>
                                        <label>
                                                Gêneros possíveis
                                        </label>
                                </div>
                                <div>
                                        @foreach($genderRules as $genderRule)
                                        <div>
                                                <input name="genderRuleId" type="radio" value="{{ $genderRule->id }}">
                                                        {{ $genderRule->description }}
                                                </input>
                                        </div>
                                        @endforeach
                                </div>
                                <div>
                                        <label>
                                                Outras
                                        </label>
                                </div>
                                <div>
                                        <div>
                                                <input name="landlordResides" type="checkbox" value="1">
                                                        <label>
                                                                Dono reside na casa
                                                        </label>
                                                </input>
                                        </div>
                                        <div class="col-md-4">
                                                <input name="providesInvoice" type="checkbox" value="1">
                                                        <label>
                                                                Passa factura
                                                        </label>
                                                </input>
                                        </div>
                                        <div class="col-md-4">
                                                <input name="needsSecurityDeposit" type="checkbox" value="1">
                                                        <label>
                                                                Caução
                                                        </label>
                                                </input>
                                        </div>
                                </div>
                        </div>
                        <div>
                                <button class="btn btn-success" type="submit">
                                        Submeter anúncio
                                </button>
                        </div>
                </div>
        </form>
        @endsection
</link>
