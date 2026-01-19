<footer class="footer-modern">
    <!-- Main Footer Content -->
    <div class="footer-main">
        <div class="container">
            <div class="row g-4">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-brand">
                        <img src="{{ asset('app/assets/logo.png') }}" alt="Logo" class="footer-logo mb-3">
                        <h3 class="footer-company-name">PT. ALKESLAB PRIMATAMA</h3>
                    </div>
                    <p class="footer-description">
                        Perusahaan yang bergerak di bidang distribusi alat kesehatan yang mencakup Radiologi, 
                        Laboratorium, Barang Medis Habis Pakai (BMHP). Kami juga menyediakan Jasa Servis & 
                        Perawatan Alat Kesehatan.
                    </p>
                    <!-- Social Media -->
                    <div class="footer-social mt-4">
                        <h6 class="footer-social-title">Ikuti Kami</h6>
                        <div class="social-icons">
                            <a href="https://tokopedia.link/alkeslabprimatama" 
                               class="social-icon" 
                               target="_blank" 
                               aria-label="Tokopedia"
                               title="Tokopedia">
                                <img src="https://img.icons8.com/nolan/40/tokopedia.png" alt="Tokopedia" />
                            </a>
                            <a href="https://shopee.co.id/alkeskitasemua" 
                               class="social-icon" 
                               target="_blank" 
                               aria-label="Shopee"
                               title="Shopee">
                                <img src="https://img.icons8.com/ios-filled/40/FFFFFF/shopee.png" alt="Shopee" />
                            </a>
                            <a href="https://www.instagram.com/alkeslabprimatama_official" 
                               class="social-icon" 
                               target="_blank" 
                               aria-label="Instagram"
                               title="Instagram">
                                <img src="https://img.icons8.com/ios-filled/40/FFFFFF/instagram-new--v1.png" alt="Instagram" />
                            </a>
                            <a href="https://www.tiktok.com/@alkeslabp" 
                               class="social-icon" 
                               target="_blank" 
                               aria-label="TikTok"
                               title="TikTok">
                                <img src="https://img.icons8.com/ios-filled/40/FFFFFF/tiktok--v1.png" alt="TikTok" />
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Tautan Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="/"><i class="bi bi-house-door me-2"></i>Beranda</a></li>
                        <li><a href="/tentang-kami"><i class="bi bi-info-circle me-2"></i>Tentang Kami</a></li>
                        <li><a href="/produk-kami"><i class="bi bi-box-seam me-2"></i>Produk</a></li>
                        <li><a href="/berita"><i class="bi bi-newspaper me-2"></i>Berita</a></li>
                        <li><a href="/kontak-kami"><i class="bi bi-envelope me-2"></i>Kontak</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Kontak Kami</h5>
                    <ul class="footer-contact">
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=6282280848541" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                                <div>
                                    <span class="contact-label">WhatsApp Admin</span>
                                    <span class="contact-value">0822 8084 8541</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=6282260895899" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                                <div>
                                    <span class="contact-label">WhatsApp Sales</span>
                                    <span class="contact-value">0822 6089 5899</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="tel:02129098991">
                                <i class="bi bi-telephone-fill"></i>
                                <div>
                                    <span class="contact-label">Telepon</span>
                                    <span class="contact-value">021-29098991</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="tel:02122968221">
                                <i class="bi bi-telephone-fill"></i>
                                <div>
                                    <span class="contact-label">Telepon</span>
                                    <span class="contact-value">021-22968221</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:alkeslab.primatama@gmail.com">
                                <i class="bi bi-envelope-fill"></i>
                                <div>
                                    <span class="contact-label">Email</span>
                                    <span class="contact-value">alkeslab.primatama@gmail.com</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Layanan Kami</h5>
                    <ul class="footer-services">
                        <li><i class="bi bi-check-circle me-2"></i>Distribusi Alat Kesehatan</li>
                        <li><i class="bi bi-check-circle me-2"></i>Radiologi</li>
                        <li><i class="bi bi-check-circle me-2"></i>Laboratorium</li>
                        <li><i class="bi bi-check-circle me-2"></i>Barang Medis Habis Pakai</li>
                        <li><i class="bi bi-check-circle me-2"></i>Servis & Perawatan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Bar -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p class="copyright-text">
                        © {{ date('Y') }} <strong>PT. ALKESLAB PRIMATAMA</strong>. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="copyright-text">
                        Made with <i class="bi bi-heart-fill text-danger"></i> in Indonesia
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Footer Modern Design */
    .footer-modern {
        background: linear-gradient(135deg, #1e30f3 0%, #1a28d9 50%, #1826c2 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .footer-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 30%, rgba(226, 30, 128, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(30, 48, 243, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .footer-modern::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    }

    /* Main Footer */
    .footer-main {
        padding: 80px 0 50px;
        position: relative;
        z-index: 1;
    }

    /* Brand Section */
    .footer-brand {
        margin-bottom: 25px;
    }

    .footer-logo {
        height: 60px;
        width: auto;
        filter: brightness(0) invert(1);
        transition: transform 0.3s ease;
    }

    .footer-logo:hover {
        transform: scale(1.05);
    }

    .footer-company-name {
        font-size: 1.5rem;
        font-weight: 800;
        color: white;
        margin: 0;
        letter-spacing: -0.01em;
    }

    .footer-description {
        color: rgba(255, 255, 255, 0.85);
        line-height: 1.7;
        font-size: 0.95rem;
        margin-top: 15px;
    }

    /* Footer Titles */
    .footer-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: white;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 12px;
        letter-spacing: 0.5px;
    }

    .footer-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #e21e80, #ff6b9d);
        border-radius: 2px;
    }

    /* Footer Links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
    }

    .footer-links a {
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }

    .footer-links a:hover {
        color: white;
        transform: translateX(5px);
    }

    .footer-links a i {
        font-size: 0.9rem;
        width: 20px;
    }

    /* Contact Section */
    .footer-contact {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-contact li {
        margin-bottom: 18px;
    }

    .footer-contact a {
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        transition: all 0.3s ease;
        padding: 8px;
        border-radius: 8px;
    }

    .footer-contact a:hover {
        color: white;
        background: rgba(255, 255, 255, 0.1);
        transform: translateX(5px);
    }

    .footer-contact i {
        font-size: 1.2rem;
        margin-top: 2px;
        flex-shrink: 0;
        width: 24px;
    }

    .contact-label {
        display: block;
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 4px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .contact-value {
        display: block;
        font-size: 0.95rem;
        font-weight: 500;
        color: white;
    }

    /* Services Section */
    .footer-services {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-services li {
        margin-bottom: 12px;
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.95rem;
        display: flex;
        align-items: center;
    }

    .footer-services i {
        color: #4ade80;
        font-size: 0.9rem;
    }

    /* Social Media */
    .footer-social {
        margin-top: 30px;
    }

    .footer-social-title {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }

    .social-icons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .social-icon {
        width: 44px;
        height: 44px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .social-icon:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .social-icon img {
        width: 24px;
        height: 24px;
        object-fit: contain;
    }

    /* Footer Bottom */
    .footer-bottom {
        background: rgba(0, 0, 0, 0.2);
        padding: 25px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
        z-index: 1;
    }

    .copyright-text {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
        margin: 0;
    }

    .copyright-text strong {
        color: white;
        font-weight: 600;
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .footer-main {
            padding: 60px 0 40px;
        }

        .footer-company-name {
            font-size: 1.3rem;
        }

        .footer-title {
            margin-top: 30px;
        }

        .footer-title:first-of-type {
            margin-top: 0;
        }
    }

    @media (max-width: 767.98px) {
        .footer-main {
            padding: 50px 0 30px;
        }

        .footer-logo {
            height: 50px;
        }

        .footer-company-name {
            font-size: 1.2rem;
        }

        .footer-description {
            font-size: 0.9rem;
        }

        .footer-bottom {
            padding: 20px 0;
        }

        .copyright-text {
            font-size: 0.85rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
        }

        .social-icon img {
            width: 20px;
            height: 20px;
        }
    }

    @media (max-width: 575.98px) {
        .footer-main {
            padding: 40px 0 25px;
        }

        .footer-title {
            font-size: 1rem;
        }

        .footer-links a,
        .footer-services li,
        .footer-contact a {
            font-size: 0.9rem;
        }
    }
</style>
