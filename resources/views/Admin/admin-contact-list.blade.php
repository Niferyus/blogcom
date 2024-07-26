@extends('Admin.admin-panel-layout')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Telefon</th>
        <th scope="col">Fax</th>
        <th scope="col">Mail</th>
        <th scope="col">2.Mail</th>
        <th scope="col">Adres</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($infos as $info)
        <tr>
            <th scope="row">{{ $info->id }}</th>
            <td>{{ $info->phonenumber }}</td>
            <td>{{ $info->faxnumber }}</td>
            <td>{{ $info->firstmail }}</td>
            <td>{{ $info->secondmail }}</td>
            <td>{{ $info->address }}</td>
            <td>
              <form action="{{ route('contact-delete', $info->id) }}" method="POST" onsubmit="return confirm('Bu kaydı silmek istediğinize emin misiniz?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Sil</button>
              </form>
            </td>
            <td>
              <a class="btn btn-primary" href="{{ route('contact-edit', $info->id) }}">Düzenle</a>
            </td>
            {{-- <td>
            <form action="{{ route('activate-about', $info->id) }}" method="GET" onsubmit="return confirm('Bu seçeneği aktif etmek istediğinize emin misiniz')">
              @csrf
              <button type="submit" class="btn btn-success">Aktif Et</button>
            </form>
          </td> --}}
        </tr>      
        @endforeach
      
    </tbody>
  </table>

@endsection