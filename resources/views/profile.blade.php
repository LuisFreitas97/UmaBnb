@extends('layouts.app')

@section('title','Editar perfil')

@section('content')

    <div class="card">

<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">{{ csrf_field() }}

                <b>
                    Perfil
                    <hr/>
                </b>
            <table>
              <tbody>
                <tr>
                  <td>Nome</td>
                  <td>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name"/>
                  </td>
                </tr>
                <tr>
                  <td>E-mail</td>
                  <td>
                    <input type="email" class="form-control" value="{{ $user->email }}" name="email"/>
                  </td>
                </tr>
                <tr>
                  <td>Contacto</td>
                  <td>
                    <input type="tel" class="form-control" value="{{ $user->phone }}" name="phone"/>
                  </td>
                </tr>
                <tr>
                  <td>Foto de perfil</td>
                  <td>
                    <div class="profile-pic-selector">
                      <img src="{{ asset('storage/images/profile-pic/'.$user->id) }}?{{rand()}}" onerror='this.onerror=null;this.src="{{ asset('storage/images/profile-pic/none.png') }}";' class="profile-pic" id="profile-pic" />
                      <label for="profile-pic-input" class="btn btn-lg btn-primary fa fa-edit"/>
                      <input type="file" id="profile-pic-input" name="profile-pic-input" class="btn btn-basic fa fa-edit" accept="image/*"/>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

              <button class="btn btn-success btn-lg fa fa-check p-1 w-100" type="submit">Guardar alterações</button>

</div>

</form>
</div>
@endsection

<link rel="stylesheet" href="{{ asset('css/profile.css') }}"/>
<script src="{{ asset('js/profile.js') }}" defer></script>
