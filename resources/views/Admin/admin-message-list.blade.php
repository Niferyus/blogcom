@extends("Admin.admin-panel-layout")

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">mail</th>
        <th scope="col">topic</th>
        <th scope="col">message</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($messages as $message)
        <tr>
            <th scope="row">{{ $message->id }}</th>
            <td>{{ $message->name }}</td>
            <td>{{ $message->mail }}</td>
            <td>{{ $message->topic }}</td>
            <td>{{ Str::limit($message->message, 10, '...') }}</td>
            <td>
              <form action="{{ route('message-delete', $message->id) }}" method="POST" onsubmit="return confirm('Bu kaydı silmek istediğinize emin misiniz?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Sil</button>
              </form>
            </td>
            <td>
              <a class="btn btn-primary" href="{{ route('message-read', $message->id) }}">Devamını oku</a>
            </td>
        </tr>      
        @endforeach
    </tbody>
</table>

@endsection