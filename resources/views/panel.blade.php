@extends('layouts.app')

@section('title','Painel administrativo')

@section('content')

    <div class="container">
        <div class="col">

              <div class="tabs">
                <input name="tabs" type="radio" id="tab-1" checked="checked" class="input"/>
                <label for="tab-1" class="label">Gerir utilizadores</label>
                <div class="panel">
                    <form method="POST" action="{{ route('panel.users.update') }}">{{ csrf_field() }}
                            <div>
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Tipo de utilizador</th>
                                      <th scope="col">Ações</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    @foreach ($users as $user)
                                    <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <select class="custom-select" name="userType-user{{ $user->id }}">
                                                    @foreach ($userTypes as $type)
                                                        <option value="{{ $type->id }}" {{ ($type->id == $user->userType) ? 'selected' : '' }}>
                                                            {{ $type->id }} -  {{ $type->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">{{ csrf_field() }}
                                                  <button type="submit" class="btn btn-danger fa fa-trash"/>
                                                </form>
                                            </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                        <button class="btn btn-success fa fa-check" type="submit">Guardar alterações</button>
                                </div>
                                <div class="col-6 text-right">
                                        <a class="btn btn-danger fa" href="{{ url()->previous() }}">Cancelar</a>
                                </div>
                            </div>
                                    </form>
                </div>

                <input name="tabs" type="radio" id="tab-2" class="input"/>
                <label for="tab-2" class="label">Gerir anúncios</label>
                <div class="panel">
                          <div>
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Anúncio</th>
                                    <th scope="col">Ações</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($ads as $ad)
                                  <tr>
                                          <td>{{ $ad->id }}</td>
                                          <td>{{ $ad->title }}</td>
                                          <td>
                                              <form method="POST" action="{{ route('ads.destroy', $ad->id) }}">{{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger fa fa-trash"/>
                                              </form>
                                          </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                          </div>
                </div>

                <input name="tabs" type="radio" id="tab-3" class="input"/>
                <label for="tab-3" class="label">Gerir tipos de anúncios</label>
                <div class="panel">
                          <div>
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tipo de anúncio</th>
                                    <th scope="col">Ações</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($types as $type)
                                  <tr>
                                          <td>{{ $type->id }}</td>
                                          <td>{{ $type->description }}</td>
                                          <td>
                                              <form method="POST" action="{{ route('types.destroy', $type->id) }}">{{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger fa fa-trash"/>
                                              </form>
                                          </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                          </div>
                          <form id="types-store" method="POST" action="{{ route('types.store') }}">{{ csrf_field() }}
                            <input type="hidden" id="type-name" name="type-name"/>
                            <button type="button" class="col btn btn-success fa fa-plus" onclick="
                            event.preventDefault();
                            var name = prompt('Nome do tipo de anúncio?');
                            if(name)
                            {
                              document.getElementById('type-name').value = name;
                              document.getElementById('types-store').submit();

                            }" />
                          </form>

                </div>

                <input name="tabs" type="radio" id="tab-4" class="input"/>
                <label for="tab-4" class="label">Gerir extras</label>
                <div class="panel">

                        <div>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Descrição do extra</th>
                                  <th scope="col">Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($extras as $extra)
                                <tr>
                                        <td>{{ $extra->id }}</td>
                                        <td>{{ $extra->name }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('extras.destroy', $extra->id) }}">{{ csrf_field() }}
                                              <button type="submit" class="btn btn-danger fa fa-trash"/>
                                            </form>
                                        </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                        <form id="extras-store" method="POST" action="{{ route('extras.store') }}">{{ csrf_field() }}
                          <input type="hidden" id="extra-name" name="extra-name"/>
                          <button type="button" class="col btn btn-success fa fa-plus" onclick="
                          event.preventDefault();
                          var name = prompt('Nome do extra?');
                          if(name)
                          {
                            document.getElementById('extra-name').value = name;
                            document.getElementById('extras-store').submit();

                          }" />
                        </form>
                </div>

                <input name="tabs" type="radio" id="tab-5" class="input"/>
                <label for="tab-5" class="label">Gerir recheios</label>
                <div class="panel">

                    <div>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Recheio</th>
                                  <th scope="col">Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($sitems as $sitem)
                                <tr>
                                        <td>{{ $sitem->id }}</td>
                                        <td>{{ $sitem->name }}</td>
                                        <td>
                                             <form method="POST" action="{{ route('sitems.destroy', $sitem->id) }}">{{ csrf_field() }}
                                              <button type="submit" class="btn btn-danger fa fa-trash"/>
                                            </form>
                                        </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                        <form id="sitems-store" method="POST" action="{{ route('sitems.store') }}">{{ csrf_field() }}
                          <input type="hidden" id="sitem-name" name="sitem-name"/>
                          <button type="button" class="col btn btn-success fa fa-plus" onclick="
                          event.preventDefault();
                          var name = prompt('Nome do recheio?');
                          if(name)
                          {
                            document.getElementById('sitem-name').value = name;
                            document.getElementById('sitems-store').submit();

                          }" />
                        </form>

                </div>

                <input name="tabs" type="radio" id="tab-6" class="input"/>
                <label for="tab-6" class="label">Gerir regras de aluguer</label>
                <div class="panel">

                    <div>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Descrição da regra</th>
                                  <th scope="col">Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($grules as $grule)
                                <tr>
                                        <td>{{ $grule->id }}</td>
                                        <td>{{ $grule->description }}</td>
                                        <td>
                                             <form method="POST" action="{{ route('grules.destroy', $grule->id) }}">{{ csrf_field() }}
                                              <button type="submit" class="btn btn-danger fa fa-trash"/>
                                            </form>
                                        </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                        <form id="grules-store" method="POST" action="{{ route('grules.store') }}">{{ csrf_field() }}
                          <input type="hidden" id="grule-name" name="grule-name"/>
                          <button type="button" class="col btn btn-success fa fa-plus" onclick="
                          event.preventDefault();
                          var name = prompt('Nome da regra de aluguer?');
                          if(name)
                          {
                            document.getElementById('grule-name').value = name;
                            document.getElementById('grules-store').submit();

                          }" />
                        </form>

                </div>

                <input name="tabs" type="radio" id="tab-7" class="input"/>
                <label for="tab-7" class="label">Gerir tipologias</label>
                <div class="panel">
                       <div>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Tipologia</th>
                                  <th scope="col">Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($typos as $typo)
                                <tr>
                                        <td>{{ $typo->id }}</td>
                                        <td>{{ $typo->description }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('typos.destroy', $typo->id) }}">{{ csrf_field() }}
                                              <button type="submit" class="btn btn-danger fa fa-trash"/>
                                            </form>
                                        </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                        <form id="typos-store" method="POST" action="{{ route('typos.store') }}">{{ csrf_field() }}
                          <input type="hidden" id="typo-name" name="typo-name"/>
                          <button type="button" class="col btn btn-success fa fa-plus" onclick="
                          event.preventDefault();
                          var name = prompt('Nome da tipologia?');
                          if(name)
                          {
                            document.getElementById('typo-name').value = name;
                            document.getElementById('typos-store').submit();

                          }" />
                        </form>
                </div>
              </div>
        </div>
    </div>
@endsection
<link rel="stylesheet" href="{{ asset('css/panel.css') }}"/>
