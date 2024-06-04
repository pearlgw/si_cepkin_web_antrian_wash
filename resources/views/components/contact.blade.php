<style>
    .contact {
        /* width: 80%; */
        position: relative;
        padding: 50px 0;
        background-color: #122F59;
        background-size: cover;
        background-attachment: fixed;
    }

    .contact h2 {
        width: 100%;
        color: #fff;
        font-size: 36px;
        text-align: center;
        margin-bottom: 10px;
        padding-top: 20px;
    }
</style>

<div id="contact" class="pt-3 mt-5">
    <div class="contact">
        <h2>Contact Us<br><center><hr class="bg-light" style="border: none; width: 10%; height: 8px; border-radius: 50px;"></center></h2>
        <div class="container mt-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-center text-white mb-3">Kritik & Saran</h5>
                    <form method="post" action="/kritik-saran">
                        @csrf
                        <div class="mb-3">
                            <label for="firstname" class="form-label text-white">Firstname</label>
                            <input type="text" class="form-control text-white" id="firstname" name="firstname"
                                style="background-color: rgba(255, 255, 255, 0.2); border:none;">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label text-white">Lastname</label>
                            <input type="text" class="form-control text-white" id="lastname" name="lastname"
                                style="background-color: rgba(255, 255, 255, 0.2); border:none;">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" class="form-control text-white" id="email" name="email"
                                style="background-color: rgba(255, 255, 255, 0.2); border:none;">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label text-white">Insert Your Message</label>
                            <textarea class="form-control text-white" id="message" name="message" rows="3"
                                style="background-color: rgba(255, 255, 255, 0.2); border:none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-light">Send</button>
                    </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    <h5 class="text-center text-white mb-3">Lokasi</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63352.274197547726!2d110.3314709558211!3d-7.065877510226191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70898387e7111f%3A0x60b8611c18453cfa!2sGunung%20Pati%2C%20Semarang%20City%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1717123685971!5m2!1sen!2sid" width="100%" height="90%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
