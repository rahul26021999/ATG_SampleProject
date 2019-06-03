<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Validation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <style>
        .bigFont{
            font-size:1.5rem;
            margin-left: 5px;
            color: grey;
        }
    </style>
</head>
<body>
    <h1 class="text-center my-5 text-success">Task 1 : Form Validation</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



    <div class="container">

      @isset($success)
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>successfull submitted !!</strong> .
      </div>
      @endisset

      @if($errors->any())
      <div>
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error! </strong>{{$error}} .
      </div>
      @endforeach
  </div>
  @endif

  <form action="/" method="POST">
    @csrf()
    <div class="form-group">
        <label for="email" class="font-weight-bold bigFont">Email</label>
        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your mail" autofocus value="{{old('email')}}" required pattern="[a-Z0-9._%+-]+@[a-z0-9.-]+\.[a-Z]{2,4}$">
    </div>

    <div class="form-group">
        <label for="name" class="font-weight-bold bigFont">Name</label>
        <input type="text" class="form-control form-control-lg" id="name"  name="name" placeholder="Enter your name" value="{{old('name')}}" required pattern="[a-Z]">
    </div>
    <div class="form-group">
        <label for="pincode" class="font-weight-bold bigFont">Pincode</label>
        <input type="number" class="form-control form-control-lg" id="pincode" name="pincode" placeholder="Pincode" value="{{old('pincode')}}" required minlength="6" maxlength="6">
    </div>
    <div class="text-center">
        <input type="submit" name="submit" value="submit" class="btn btn-info btn-lg text-uppercase">
    </div>
</form>

</div>
</body>
</html>