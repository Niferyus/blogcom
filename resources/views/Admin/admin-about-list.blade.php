@extends('admin/admin-panel-layout')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">text</th>
        <th scope="col">image</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($infos as $info)
        <tr>
            <th scope="row">{{ $info->id }}</th>
            <td>{{ Str::limit($info->abouttext, 10, '...') }}</td>
            <td>{{ $info->aboutimg }}</td>
            <td><button class="btn btn-danger">Sil</button></td>
            <td>
              <a class="btn btn-primary" href="{{ route('about-edit', $info->id) }}">Düzenle</a>
            </td>
            <td><button class="btn btn-success">Aktif Et</button></td>
        </tr>      
        @endforeach
      
    </tbody>
  </table>

@endsection