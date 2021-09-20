<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Arinal's Assignment</title>
    <link href="https://ol.binus.ac.id/images/favicon.ico" rel="Shortcut Icon" type="image/png" media="screen">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg opaque-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://ol.binus.ac.id/images/logo.png" alt="logo">
            </a>
        </div>
    </nav>
    <div class="container content">
        <div class="card">
            <form action="./upload" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header">Upload Data Mahasiswa</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6 divider-vertical">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="Laki-laki">
                                    <label class="form-check-label" for="male">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Perempuan">
                                    <label class="form-check-label" for="female">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="birth-place" class="form-label">Tempat Lahir</label>
                                <input class="form-control" id="birth-place" name="birth-place" id="birth-place">
                            </div>
                            <div class="mb-3">
                                <label for="birth-date" class="form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="birth-date" id="birth-date">
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="mb-3">
                                <label for="profile" class="form-label">Foto Profil</label>
                                <input class="form-control" type="file" name="profile" id="profile"
                                    accept=".jpg, .JPG, .png, .PNG, .jpeg, .JPEG" required>
                                <div class="invalid-feedback">
                                    Mohon pilih foto profil.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="certificate" class="form-label">Sertifikat</label>
                                <input class="form-control" type="file" name="certificate" id="certificate"
                                    accept=".zip, .ZIP, .rar, .RAR">
                            </div>
                            <div class="mb-3">
                                <label for="cv" class="form-label">CV</label>
                                <input class="form-control" type="file" name="cv" id="cv" accept=".pdf, .PDF">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="./upload" class="btn btn-primary" id="btn-reset">Reset</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pemberitahuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Berhasil menyimpan data mahasiswa.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>
    <script>
        function checkResult() {
            if ("{{ session()->has('result') }}") {
                var result = @json(Session::get('result'));
                if (result.success) {
                    bootstrap.Modal.getOrCreateInstance($(".modal")).show();
                } else {
                    $("form").addClass("was-validated");
                }
                console.log(result);
            }
        }
        window.onload = checkResult;
    </script>

</body>

</html>
