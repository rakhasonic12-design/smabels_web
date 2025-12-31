# TODO: Update Website to Match SMA 11 Bekasi Image

## Steps from Approved Plan

1. **Edit index.html - Update Navbar**
   - Add "Berita" link after "Profil" in the header-right div, before the hamburger menu.
   - Update sidepanel links to match: Home, Profil, Berita, Prestasi.

2. **Edit index.html - Update Hero Section**
   - Change hero-text h1 to "Melahirkan Generasi Berprestasi".
   - Change hero-text p to '"Optimalisasi belajar, Optimalisasi beribadah, Optimalisasi berbuat kebaikan"'.
   - Add a new div class="hero-images" below hero-text, containing three img elements: src="assets/foto1.jpeg", "assets/foto2.png", and repeat "assets/foto1.jpeg" (or adjust if more images available). Each with alt="School Image", class="hero-img".

3. **Edit index.html - Update Welcome Section**
   - Update sambutan h1 to "Welcome To Website SMA 11".
   - Update sambutan p to the full welcome text from the image: "Assalamualaikum Warahmatullahi Wabarakatuh. Pertama-tama, mari kita panjatkan puji syukur kehadirat Allah SWT. atas nikmat yang dianugerahkan kepada kita semua sehingga diberi kenikmatan berupa kesehatan jasmani dan rohani untuk hadir dan bertatap muka di tempat yang sama dalam rangka "Acara Kepemudaan. Selanjutnya saya sampaikan ucapan terima kasih yang sebesar-besarnya kepada segenap hadirin yang dengan tulus dan ikhlas meluangkan waktu untuk menghadiri "Acara Kepemudaan" ini."
   - Replace aplikasi div content with four <div class="dot"></div> elements in a new div class="dots".

4. **Edit index.html - Adjust Profil Section**
   - Since the image focuses on hero and welcome, repurpose Profil as optional or remove gallery if not needed; update text to match image if keeping, but minimize for now (keep as placeholder).
   - Limit gallery to three images if keeping, using different assets.

5. **Edit css/main.css - Header Styles**
   - Set .header { background: white; } and .header a { color: black; } for visibility.
   - .header a.logo { color: #2E60A3; font-weight: bold; }

6. **Edit css/main.css - Hero Styles**
   - Ensure .hero-image { height: 100vh; background-image: url("../assets/sma11home.png"); } (adjust path if needed).
   - Add .hero-images { display: flex; justify-content: center; gap: 20px; margin-top: 20px; position: absolute; bottom: 10%; left: 50%; transform: translateX(-50%); width: 90%; }
   - .hero-img { width: 30%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }

7. **Edit css/main.css - Welcome Styles**
   - .welcome { background-color: #f0f8ff; padding: 50px 20px; flex-direction: column; align-items: center; text-align: center; }
   - .sambutan h1 { color: #2E60A3; }
   - .sambutan p { color: #333; max-width: 800px; }
   - Add .dots { display: flex; justify-content: center; gap: 30px; margin-top: 40px; }
   - .dot { width: 50px; height: 50px; background-color: #FD9F33; border-radius: 50%; }

8. **Edit css/main.css - Profil and Responsive**
   - If keeping Profil, adjust .Profil { background-color: white; } or remove blue if not in image.
   - Update .responsive { width: 30%; } for three images.
   - Add media queries for mobile: @media (max-width: 768px) { .hero-images { flex-direction: column; align-items: center; } .dots { flex-wrap: wrap; } }

9. **Test and Verify**
   - Use browser_action or execute_command to open and check layout.
   - Update TODO.md with [x] as steps complete.

Progress: None completed yet.
