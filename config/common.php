<?php

return [
    "common" => [
        "links" => [
            "facebook-ponpes" => ["label" => "Ponpes Nurul Iman", "href" => "https://www.facebook.com/ponpes.n.iman.9"],
            "instagram-ponpes" => ["label" => "@pp.nuruliman_sdk", "href" => "https://www.instagram.com/pp.nuruliman_sdk"],
            "email-url" => ["label" => "admin@ponpes.nuruliman-sindangkerta.sch.id", "href" => "https://mailto:admin@ponpes.nuruliman-sindangkerta.sch.id"],
            "wa-url" => ["label" => "081234567890", "href" => "https://wa.me/6281234567890"],
        ],
        "moto" => "Lembur ilmu, Majelis disiplin, Kancah ibadah dan Wahana perjuangan",
        "moto2" => "Nurul Iman tempat orang baik dan orang orang yang ingn menjadi baik",
        "address" => "Kp. Bangong Rt 02/01, Desa Pasirpogor, Kec. Sindangkerta, Kab. Bandung Barat, Jawa Barat, 40563",
        "register-btn" => "Daftar",
        "about-btn" => "Tentang Pondok",
    ],
    "header" => [
        "menuadmin" => [
            ["href" => "/dashboard", "label" => "Dashboard", "route" => "dashboard"],
            ["href" => "/newsarticles", "label" => "Berita", "route" => "newsarticles.index"],
            ["href" => "/achievements", "label" => "Prestasi", "route" => "achievements.index"],
            ["href" => "/facilities", "label" => "Fasilitas", "route" => "facilities.index"],
        ],
        "menu" => [
            ["label" => "Home", "href" => "/", "route" => "home"],
            [
                "label" => "Profil",
                "href" => "#",
                "submenu" => [
                    "sambutan-pimpinan" => ["label" => "Sambutan Pimpinan", "href" => "/profil/sambutan-pimpinan", "route" => "profil.sambutan-pimpinan"],
                    "sejarah" => ["label" => "Sejarah", "href" => "/profil/sejarah", "route" => "profil.sejarah"],
                    "visi-misi" => ["label" => "Visi Misi", "href" => "/profil/visi-misi", "route" => "profil.visi-misi"],
                ]
            ],
            [
                "label" => "Informasi",
                "href" => "#",
                "submenu" => [
                    // ["label" => "Pengumuman", "href" => "/informasi/pengumuman", "route" => "informasi.pengumuman"],
                    // ["label" => "Agenda", "href" => "/informasi/agenda", "route" => "informasi.agenda"],
                    ["label" => "Prestasi", "href" => "/informasi/prestasi", "route" => "informasi.prestasi"],
                    ["label" => "Berita & Artikel", "href" => "/informasi/berita-artikel", "route" => "informasi.berita-artikel"]
                ]
            ],
            ["label" => "Fasilitas", "href" => "/fasilitas", "route" => "fasilitas"],
            ["label" => "Ekstrakulikuler", "href" => "/ekstrakulikuler", "route" => "ekstrakulikuler"],
            ["label" => "Kontak", "href" => "/kontak", "route" => "kontak"],
        ]
    ],
    "footer" => [
        "links" => [
            ["label" => "Tentang Kami", "href" => "/profil/sejarah", "route" => "profil.sejarah"],
            ["label" => "Berita & Artikel", "href" => "/informasi/berita-artikel", "route" => "informasi.berita-artikel"],
            ["label" => "Prestasi", "href" => "/informasi/prestasi", "route" => "informasi.prestasi"],
            ["label" => "Fasilitas", "href" => "/fasilitas", "route" => "fasilitas"],
            ["label" => "Ekstrakulikuler", "href" => "/ekstrakulikuler", "route" => "ekstrakulikuler"],
        ],
        "other-links" => [
            ["label" => "Ponpes Nurul Iman", "href" => "https://ponpes.nuruliman-sindangkerta.sch.id"],
            ["label" => "MA Nurul Iman", "href" => "https://ma.nuruliman-sindangkerta.sch.id"],
            ["label" => "MTS Nurul Iman", "href" => "https://mts.nuruliman-sindangkerta.sch.id"],
            ["label" => "RA Nurul Iman", "href" => "https://ra.nuruliman-sindangkerta.sch.id"],
        ]
    ],
    "home" => [
        "hero" => [
            "title" => "Selamat Datang di<br /> Pondok Pesantren Nurul Iman</br /> Sindangkerta",
        ],
        "speech" => [
            "title" => "Sambutan Pimpinan",
            "grand-sheikh" => "KH Jaeni Marjuki, M.Ag",
            "description" => "Sambutan Pimpinan Pondok Pesantren Nurul Iman Sindangkerta",
            "speech" => [
                // "Assalamualaikum Warahmatullahi Wabarakatuh",
                // "Alhamdulillah, segala puji bagi Allah SWT yang telah memberikan kita nikmat iman, ilmu, dan kesehatan sehingga kita dapat berkumpul dalam kesempatan yang berbahagia ini. Shalawat serta salam senantiasa kita haturkan kepada Nabi Muhammad SAW, semoga kita semua mendapat syafaatnya di yaumul akhir nanti.",
                // "Saya selaku Kepala Sekolah Nurul Iman mengucapkan selamat datang kepada seluruh hadirin, baik para guru, siswa, orang tua, serta tamu undangan yang telah berkenan hadir. Sekolah ini senantiasa berkomitmen untuk menjadi lembaga pendidikan yang tidak hanya unggul dalam ilmu pengetahuan, tetapi juga menanamkan nilai-nilai akhlak dan keislaman dalam setiap aspek kehidupan.",
                // "Kami percaya bahwa pendidikan adalah kunci utama dalam membentuk generasi yang cerdas, berkarakter, dan berdaya saing. Oleh karena itu, kami terus berupaya meningkatkan kualitas pembelajaran, baik dari segi akademik maupun non-akademik, agar para siswa dapat berkembang secara maksimal sesuai dengan potensinya.",
                // "Harapan kami, dengan adanya kerja sama antara pihak sekolah, orang tua, dan masyarakat, kita dapat menciptakan lingkungan belajar yang kondusif serta melahirkan generasi yang tidak hanya cerdas secara intelektual, tetapi juga memiliki akhlak yang mulia dan siap menghadapi tantangan zaman.",
                // "Akhir kata, semoga Allah SWT senantiasa meridhoi langkah kita dalam menuntut ilmu dan membangun pendidikan yang lebih baik. Terima kasih atas dukungan dan kepercayaan yang diberikan kepada Nurul Iman.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi at recusandae minima, sequi ducimus optio molestiae repellat perspiciatis sed aperiam.",
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, natus, Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi at recusandae minima, sequi ducimus optio molestiae repellat perspiciatis sed aperiam.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi.",
                "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo ut architecto dolores aperiam? Quidem doloremque distinctio, quos eos voluptatem, voluptatum ab est amet facere, nihil ipsa asperiores aspernatur perferendis? Debitis similique minus illum, aliquid, vitae aspernatur molestias veritatis eligendi."
            ]
        ],
        "achievement" => [
            "title" => "Prestasi",
            "description" => "Menampilkan berbagai prestasi yang telah diraih oleh santri, baik di tingkat lokal, nasional, maupun internasional.",
        ],
        "ekstrakulikuler" => [
            "title" => "Ekstrakulikuler",
            "description" => "Kembangkan bakat dan minat santri dengan bimbingan khusus dari pembimbing yang ahli di bidangnya.",
        ],
        "newsarticles" => [
            "title" => "Berita & Artikel",
            "description" => "Dapatkan informasi terkini seputar kegiatan, acara, dan berbagai artikel inspiratif yang bermanfaat.",
        ],
        "facilities" => [
            "title" => "Fasilitas",
            "description" => "Beragam fasilitas lengkap dan modern tersedia untuk mendukung kenyamanan dan kualitas pembelajaran santri.",
        ],

    ],
];
