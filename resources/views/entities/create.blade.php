<h1> Create new Governmental Entity</h1>

<form action="{{route('entities.store')}}" method="post">
    @csrf
    <br><br>
    <label for="fname">Governmental Entity Name:</label><br>
    <br>
    <input type="text" id="name" name="name" placeholder="هيئة النقابة الادارية"><br>
    <br>
    <button type="submit">submit</button>
  </form>