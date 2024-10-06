<footer class="bg-secondary text-white py-3 mt-auto" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
    <div class="container text-center text-md-start">
        <div class="row">
            <!-- About Us Section -->
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase" style="font-size: 1.2rem;">About Us</h5>
                <p class="small">
                    Sebagai bagian dari komunitas Rukun Tetangga, kami hadir untuk membangun lingkungan yang nyaman,
                    aman, dan penuh kebersamaan. Dengan semangat gotong royong, kami mendukung kesejahteraan warga demi
                    terciptanya kehidupan yang harmonis dan sejahtera.
                </p>
            </div>

                <div class="col-md-4 mb-4">
                <h5 class="text-uppercase" style="font-size: 1.2rem;">Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('beranda') }}" class="text-white text-decoration-none link-hover">
                            <i class="fas fa-home me-2"></i>Beranda
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('pengajuan') }}" class="text-white text-decoration-none link-hover">
                            <i class="fas fa-file-alt me-2"></i>Ajukan Surat
                        </a>
                    </li>
                </ul>
            </div>

        
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase" style="font-size: 1.2rem;">Contact Us</h5>
                <p class="small">Alamat: Jalan Mendalo Darat, Kota Jambi</p>
                <p class="small">Email: zahranezaldi123@.com</p>

                <!-- Social Media Icons -->
                <div class="social-icons mt-3">
                    <a href="#" class="text-white me-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white me-3">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center mt-3">
            <p class="small mb-0">&copy; 2024 Rukun Tetangga. Semua hak dilindungi undang-undang.</p>
        </div>
    </div>
</footer>

<style>
    .link-hover:hover {
        color: #ffc107 !important;
        text-decoration: underline !important;
    }

    .social-icons a {
        font-size: 1.5rem; /* Meningkatkan ukuran ikon media sosial */
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: #ffc107 !important; /* Warna saat dihover */
    }
</style>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>