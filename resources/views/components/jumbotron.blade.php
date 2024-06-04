@auth
    <div class="jumbotron mt-5"
        style="background-image: url('{{ asset('images/car.png') }}'); height: 100vh; background-size: cover;">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-6 text-center text-white">
                    <h1 class="display-4"><strong>Cuci Kendaraan Cepat & Praktis</strong></h1>
                    <p class="lead">Jangan lewatkan kesempatan untuk membuat kendaraan Anda selalu bersih dan kinclong.
                        Segera daftar antrian cuci mobil/motor di website kami dan nikmati layanan terbaik!</p>
                    <h5><strong>Harap membuat antrian terlebih dahulu</strong></h5>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="jumbotron mt-5" id="home"
        style="background-image: url('{{ asset('images/car.png') }}'); height: 100vh; background-size: cover;">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-6 text-center text-white">
                    <h1 class="display-4"><strong>Cuci Kendaraan Cepat & Praktis</strong></h1>
                    <p class="lead">Jangan lewatkan kesempatan untuk membuat kendaraan Anda selalu bersih dan kinclong.
                        Segera daftar antrian cuci mobil/motor di website kami dan nikmati layanan terbaik!</p>
                    <a class="btn btn-outline-light mt-4" style="width: 30%;" href="/sign-in">Daftar Antrian</a>
                </div>
            </div>
        </div>
    </div>
@endauth
