<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Siswa</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('student.create') }}" class="btn btn-md btn-success mb-3">ADD Siswa</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">nama_lengkap</th>
                                    <th scope="col">tempat_lahir</th>
                                    <th scope="col">tanggal_lahir</th>
                                    <th scope="col">alamat</th>
                                    <th scope="col">asal_sekolah</th>
                                    <th scope="col">email</th>
                                    <th scope="col">foto</th>
                                    <th scope="col">scan_kk</th>
                                    <th scope="col">Waktu Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($student as $data)
                                    <tr>
                                        <td>{{ $data->nama_lengkap }}</td>
                                        <td>{{ $data->tempat_lahir }}</td>
                                        <td>{{ $data->tanggal_lahir }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->asal_sekolah }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/index/'.$data->foto) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/index/'.$data->kk) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $data->created_at }}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Siswa belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $student->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script> -->

</body>
</html> 