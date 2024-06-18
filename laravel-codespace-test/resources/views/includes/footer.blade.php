<footer class="footer bg-dark text-white mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-4 mb-lg-0">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="Logo" class="img-fluid">
                <p class="mt-3">123 Street, City, Country</p>
                <p>+1234567890</p>
                <p>info@example.com</p>
            </div>
            <div class="col-lg-3 mb-4 mb-lg-0">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('privacy') }}" class="text-white">Privacy</a></li>
                    <li><a href="{{ route('imprint') }}" class="text-white">Imprint</a></li>
                    <li><a href="{{ route('pages.contact') }}" class="text-white">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
