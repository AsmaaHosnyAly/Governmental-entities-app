<h1> Edit new Governmental Entity</h1>

<form action="{{route('entities.update',$entity->id)}}" method="post">
    @method('PATCH')
    @csrf
    <br><br>
    <label for="Name">Governmental Entity Name:</label><br>
    <br>
    <input type="text" id="name" name="Name" value="{{$entity->Name}}"><br>
    <br>
    <button type="submit">update</button>
  </form>