<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d931a8b882.js" crossorigin="anonymous"></script>
</head>
  <body>
    <div class="container">

        <h1 class="text-center mb-5 mt-5">Data Pegawai</h1>
        <div class="d-flex flex-row-reverse">
            <a href="/tambahpegawai"  class="btn btn-primary "><i class="fa-solid fa-user-plus"></i> Tambah Pegawai</a>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ $message }}
            </div>
        @endif
        <table class="table table-hover table-responsive table-primary mt-5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Gender</th>
                    <th>No Telepon</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $row)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $row->nama}}</td>
                    <td>
                        <img class="item" src="{{ asset('foto_pegawai/'.$row->foto)}}" width="100px"  alt="">
                    </td>
                    <td>{{ $row->jenis_kelamin}}</td>
                    <td>{{ $row->no_telpon}}</td>
                    <td>{{ $row->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="/tampilkandata/{{ $row->id }}" class="btn btn-warning"> <i class="fa-solid fa-pen-to-square"></i> </a>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id}}" data-nama="{{ $row->nama }}"> <i class="fa-solid fa-trash"></i> </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script>
        $('.delete').click(function(){
            var pegawaiid = $(this).attr('data-id');
            var pegawainama = $(this).attr('data-nama');
            Swal.fire({
            title: "Yakin ?",
            text: "Kamu akan menghapus data pegawai " + pegawainama +" ? ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/delete/" + pegawaiid
                Swal.fire({
                    title: "Deleted!",
                text: "Data Berhasil Dihapus",
                icon: "success"
                });
            }
            });
        })

    </script>
</body>
</html>
