@extends('Admin.admin-panel-layout')

@section('content')

 <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">text</th>
        <th scope="col">image</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($infos as $info)
        <tr>
            <th scope="row">{{ $info->id }}</th>
            <td>{{ $info->title }}</td>
            <td>{{ $info->text, }}</td>
            <td>{{ $info->image }}</td>
             <td>
               <form action="{{ route('homepage-delete', $info->id) }}" method="POST" onsubmit="return confirm('Bu kaydı silmek istediğinize emin misiniz?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Sil</button>
              </form> 
            </td> 
             <td>
              <a class="btn btn-primary" href="{{ route('homepage-update', $info->id) }}">Düzenle</a>
            </td> 
        </tr>      
        @endforeach
      
    </tbody>
  </table>
 

@endsection