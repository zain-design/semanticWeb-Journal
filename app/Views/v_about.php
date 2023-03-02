<section class="clearfix">
    <article class="span8">
        <header class="header header-title-dark standalone search-height text-container">
            <h1 class="title b-font-family-serif"><?php echo $type ?></h1>
        </header>

        <section class="block text-container container-no-padding">
            <h1 class="text-container container-title b-font-family-serif">Sistem Pencarian Karya Ilmiah Dosen Teknik Informatika Universitas Muria Kudus</h1>
            <p class="text-container  b-font-family-serif">Sistem Pencarian Karya Ilmiah Dosen Teknik Informatika Universitas Muria Kudus adalah sebuah sistem yang dikembangkan untuk membantu pencarian karya ilmiah dari para dosen Teknik Informatika Universitas Muria Kudus. Sistem ini mempermudah akses terhadap informasi karya ilmiah dari para dosen, membantu meningkatkan transparansi dan keterbukaan informasi yang berkaitan dengan karya ilmiah yang dilakukan oleh dosen di universitas tersebut. <br> <br> Dengan menggunakan sistem ini, para pengguna dapat mencari informasi karya ilmiah dosen Teknik Informatika Universitas Muria Kudus secara cepat dan efisien. Sistem ini memiliki database berupa ontology dan memiliki fitur pencarian yang intuitif dan mudah digunakan. Pengguna dapat mencari karya ilmiah berdasarkan nama dosen, judul karya, tahun publikasi, atau subjek yang berkaitan. <br> <br> Sistem Pencarian Karya Ilmiah Dosen Teknik Informatika Universitas Muria Kudus merupakan sebuah inovasi dalam bidang akademis yang membantu meningkatkan efisiensi dan transparansi informasi karya ilmiah. Sistem ini mempermudah akses terhadap informasi dan meningkatkan keterbukaan informasi bagi masyarakat, sehingga membantu meningkatkan kualitas pendidikan dan riset di Universitas Muria Kudus.<br><br>Sistem ini dibuat untuk memenuhi Tugas Akhir Skripsi dengan judul Implementasi Web Semantik pada Web Pencarian Karya Ilmiah Dosen Teknik Informatika Universitas Muria Kudus yang di tulis oleh Zainuz Zuha (201951101)</p>

        </section>
    </article>

    <!-- Sidebar -->

    <aside class="span4">
        <section class="search text-container">
            <h2 class="b-font-family-serif">Cari...</h2>
            <span class="angle">&nbsp;</span>
            <p>Explore our projects, publications and blog posts</p>
            <form id="search" action="<?php echo base_url() ?>/search" method="get">
                <label for="search-text">Search BBC R&amp;D</label>
                <input id="search-text" class="text" name="query" type="text" placeholder="Enter titles, keywords, names..." value="" />
                <input type="hidden" name="Year" value="All" />
                <input type="hidden" name="Type" value="All" />
                <button type="submit" id="search-submit">
                    <i aria-hidden="true" class="gelicon gelicon--search"></i>
                    <span class="hidden">Search</span>
                </button>
            </form>
        </section>

        <section class="block research-areas">
            <h2 class="hd title text-container container-title container-weight-normal b-font-family-serif">
                Browse projects by <strong>topic</strong>
            </h2>
            <div class="topics text-container container-no-padding">
                <ul class="clearfix">
                    <?php foreach ($listTopic as $data) { ?>
                        <li>
                            <a href="<?php echo base_url() ?>/search?query=<?php echo $data->topic ?>&Type=<?php echo $type ?>&Year=All"><?php echo $data->topic ?></a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </section>
    </aside>
</section>
</div>
</div>