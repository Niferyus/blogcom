@extends('admin/admin-panel-layout')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">text</th>
        <th scope="col">image</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($infos as $info)
        <tr>
            <th scope="row">{{ $info->id }}</th>
            <td>{{ Str::limit($info->abouttext, 10, '...') }}</td>
            <td>{{ $info->aboutimg }}</td>
            <td>
              <form action="{{ route('about-delete', $info->id) }}" method="POST" onsubmit="return confirm('Bu kaydı silmek istediğinize emin misiniz?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Sil</button>
              </form>
            </td>
            <td>
              <a class="btn btn-primary" href="{{ route('about-edit', $info->id) }}">Düzenle</a>
            </td>
            <td>
            <form action="{{ route('activate-about', $info->id) }}" method="GET" onsubmit="return confirm('Bu seçeneği aktif etmek istediğinize emin misiniz')">
              @csrf
              <button type="submit" class="btn btn-success">Aktif Et</button>
            </form>
          </td>
        </tr>      
        @endforeach
      
    </tbody>
  </table>

@endsection