<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('musicians.store')}}" method = "POST" enctype="multipart/form-data">
       @csrf
       <label> Ten</label>
       <input type="text" name="name">
       <br>

       <label> Anh</label>
       <input type="file" name="profile_picture">
       <br>
       <label> Ngay sinh</label>
       <input type="date" name="birth_date">
       <br>

       <label> instrument</label>
       <input type="text" name="instrument">
       <br>

       <label> biography</label>
       <input type="text" name="biography">
       <br>

       <button> Them</button>
       <br>
    </form>
</body>
</html>