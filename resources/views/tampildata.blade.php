<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d931a8b882.js" crossorigin="anonymous"></script>
</head>
  <body>
    <div class="container">

        <h1 class="text-center mb-5 mt-5">Edit  Pegawai</h1>

        <div class="card">
            <div class="card-body">
                <form action="/updatedata/{{$data->id}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nama}}" required>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                      <select class="form-select" name="jenis_kelamin" aria-label="Default select example" required>
                        <option selected>{{ $data->jenis_kelamin}}</option>
                        <option value="cowo">cowo</option>
                        <option value="cewe">cewe</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label" >No Telepon</label>
                      <input type="number" class="form-control" name="no_telpon" id="exampleInputEmail1" value="{{ $data->no_telpon}}" aria-describedby="emailHelp" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
    </body>
</html>
