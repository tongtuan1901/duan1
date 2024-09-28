<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('musicians.update',$nhacsi->id)}}" method = "POST" enctype="multipart/form-data">
       @csrf
       @method('put')
       <label> Ten</label>
       <input type="text" name="name" value="{{$nhacsi->name}}">
       <br>

       <label> Anh</label>
       <input type="file" name="profile_picture" value="{{$nhacsi->profile_picture}}">
       @if($nhacsi->profile_picture)
       <img src="{{Storage::url($nhacsi->profile_picture)}}" width="100">
       @endif
       <br>
       <label> Ngay sinh</label>
       <input type="date" name="birth_date" value="{{$nhacsi->birth_date}}">
       <br>

       <label> instrument</label>
       <input type="text" name="instrument" value="{{$nhacsi->instrument}}">
       <br>

       <label> biography</label>
       <input type="text" name="biography" value="{{$nhacsi->biography}}">
       <br>

       <button> Sua</button>
       <br>
    </form>
</body>
</html>