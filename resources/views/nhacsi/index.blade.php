<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border ="1">
        <a href="{{route('musicians.create')}}" class=""> Thêm mới</a>
   <thead>
    <tr>
        <th>ID</th>
        <th>TÊN</th>
        <th>Anh</th>
        <th>Ngay sinh</th>
        <th>Instrument</th>
        <th>Biography</th>
        <th> Hành động</th>

        <tbody>
               @foreach($listnhacsi as $key=>$item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>@if($item->profile_picture)
                    <img src="{{Storage::url($item->profile_picture)}}" width="100">
                    @endif
                </td>
                <td>{{$item->birth_date}}</td>
                <td>{{$item->instrument}}</td>
                <td>{{$item->biography}}</td>
                <td>
                    <a href="{{route('musicians.edit',$item->id)}}" class=""> Sua</a>
                    <form action="{{route('musicians.destroy',$item->id)}}" method="POST">
                          @csrf
                          @method('delete')
                          <button onclick="return confirm('ban co muon xoa ko')"> Xoa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </tr>
   </thead>
    </table>
</body>
</html>