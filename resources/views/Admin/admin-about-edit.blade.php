@extends('Admin.admin-panel-layout')

@section('content')

<form action="{{ url('/admin-panel/admin-about-edit/' .$info->id) }}" method="POST" onsubmit="return validateform()">
  @csrf
  <div class="container">
    <div class="form-group">
        <label for="abouttext" class="form-label">Hakkında Metin</label>
        <textarea name="abouttext" id="abouttext" class="form-control" cols="30" rows="10">{{ $info->abouttext }}</textarea>
    </div>
    <div class="form-group">
        <label for="aboutimg" class="form-label">Hakkında Resim İsmi</label>
        <textarea name="aboutimg" id="aboutimg" class="form-control" cols="30" rows="1">{{ $info->aboutimg }}</textarea>
    </div>
      <button type="submit" class="btn btn-primary">Kaydet</button>
</div> 
</form>

<script>
  function validateform(){
    const abouttext = document.getElementById('abouttext').value.trim();
    
    if(!abouttext){
      alert("Lütfen hakkında metin giriniz.");
      return false;
    }
  }
</script>

@endsection