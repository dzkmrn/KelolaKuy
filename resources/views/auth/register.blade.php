@extends('layout.app')

@section('title', 'Daftar')

@section('content')
<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3" style="margin-bottom: 30px;border: none;border-radius: 5px;box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img class="d-flex justify-content-center align-items-center" style="width:100px;padding:3px;" src="../../dist/img/k_logo_big.png" alt="">
                                </div>
                                <h5 class="card-title text-center pb-0 fs-4" style="color: #B1B2FF;">Daftar Akun</h5>
                                <p class="text-center small">Masukkan data yang diperlukan untuk daftar akun</p>
                            </div>

                            <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    <div class="invalid-feedback">Tolong masukkan username anda!</div>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                    <div class="invalid-feedback">Tolong masukkan nama anda!</div>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <div class="invalid-feedback">Tolong masukkan email anda!</div>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Konfirmasi Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <div class="invalid-feedback">Tolong masukkan kembali password anda!</div>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                        <label style="font-size:11pt" class="form-check-label" for="acceptTerms">Saya menyetujui dan menerima <a style="color: #AAC4FF;" href="#modalsk" data-bs-toggle="modal">syarat dan ketentuan</a></label>
                                        <div class="invalid-feedback">Anda harus menyetujui syarat dan ketentuan!</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn w-100" style="background-color: #AAC4FF;color: white;" type="submit">Buat Akun</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Sudah memiliki akun? <a style="color: #AAC4FF;" href="login">Masuk</a></p>
                                </div>
                            </form>

                            <div id="modalsk" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Syarat dan Ketentuan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="text-align: justify; text-justify:inter-word">
                                            <b>1. Kepentingan:</b> Registrasi akun pada website inventarisasi organisasi dimaksudkan untuk memberikan akses kepada anggota organisasi yang berkaitan untuk mengelola dan memantau inventaris organisasi.<br>

                                            <b>2. Kelayakan:</b> Registrasi akun hanya tersedia untuk anggota organisasi yang telah memenuhi persyaratan keanggotaan dan telah mendapatkan persetujuan dari pihak yang berwenang.<br>

                                            <b>3. Informasi Pribadi:</b> Saat mendaftar, pengguna diharuskan untuk menyediakan informasi pribadi yang akurat dan lengkap, termasuk nama, alamat email, dan informasi lain yang diperlukan.<br>

                                            <b>4. Keamanan Akun:</b> Pengguna bertanggung jawab untuk menjaga kerahasiaan informasi login akun mereka. Jika ada kecurigaan terhadap penggunaan yang tidak sah atau akses yang tidak diotorisasi, pengguna harus segera menghubungi administrator website.<br>

                                            <b> 5. Tanggung Jawab Pengguna:</b> Pengguna bertanggung jawab atas semua aktivitas yang terjadi di bawah akun mereka. Mereka harus menggunakan akun dengan bijaksana, tidak melanggar hukum, dan tidak menyalahgunakan sistem inventarisasi organisasi.<br>

                                            <b>6. Penggunaan Informasi:</b> Informasi yang diberikan oleh pengguna saat registrasi akan digunakan secara tegas sesuai dengan kebijakan privasi yang berlaku. Informasi tersebut tidak akan dibagikan kepada pihak ketiga tanpa persetujuan pengguna, kecuali jika diwajibkan oleh hukum.<br>

                                            <b>7. Penyalahgunaan:</b> Penyalahgunaan akun atau penggunaan yang melanggar hukum atau ketentuan yang berlaku dapat mengakibatkan penghentian akses akun oleh administrator website.<br>

                                            <b>8. Perubahan Syarat dan Ketentuan:</b> Administrator website berhak untuk mengubah atau memperbarui syarat dan ketentuan ini tanpa pemberitahuan terlebih dahulu. Pengguna disarankan untuk secara berkala memeriksa syarat dan ketentuan untuk mengetahui perubahan yang mungkin terjadi.<br>

                                            <b>9. Pengakhiran Akun:</b> Pengguna dapat meminta penghapusan akun mereka dengan menghubungi administrator website. Pengguna juga dapat dikeluarkan dari akun mereka jika melanggar syarat dan ketentuan yang berlaku.<br>

                                            <b>10. Penyelesaian Sengketa:</b> Setiap sengketa yang timbul terkait dengan penggunaan akun atau website akan diselesaikan secara damai dan berdasarkan hukum yang berlaku di wilayah yang berlaku.<br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>

</section>

</div>

@endsection