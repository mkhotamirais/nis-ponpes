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
        "address" => "Kp. Bangong Rt 02/01, Desa Pasirpogor, Kec. Sindangkerta, Kab. Bandung Barat, Jawa Barat, 40563",
        "grand-sheikh" => "KH Jaeni Marjuki, M.Ag"
    ],
    "header" => [
        "menu" => [
            ["label" => "Home", "href" => "/", "route" => "home"],
            [
                "label" => "Profil",
                "href" => "#",
                "submenu" => [
                    "sambutan-pengasuh" => ["label" => "Sambutan Pengasuh", "href" => "/profil/sambutan-pengasuh", "route" => "profil.sambutan-pengasuh"],
                    "sejarah" => ["label" => "Sejarah", "href" => "/profil/sejarah", "route" => "profil.sejarah"],
                    "visi-misi" => ["label" => "Visi Misi", "href" => "/profil/visi-misi", "route" => "profil.visi-misi"],
                ]
            ],
            [
                "label" => "Informasi",
                "href" => "#",
                "submenu" => [
                    // ["label" => "Pengumuman", "href" => "/informasi/pengumuman", "route" => "informasi.pengumuman"],
                    ["label" => "Agenda", "href" => "/informasi/agenda", "route" => "informasi.agenda"],
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
            ["label" => "Tentang Kami", "href" => "/sejarah", "route" => "profil.sejarah"],
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
    ]
];
