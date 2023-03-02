<section class="clearfix">
    <div class="span-full spanning-header clearfix text-container container-no-padding container-transparent">
        <article class="span8">
            <header class="header header-title-dark standalone search-height text-container">
                <h1 class="title b-font-family-serif">Menampilkan Hasil pencarian dari '<?php echo $_GET["query"] ?>' </h1>
            </header>
        </article>
        <aside class="span4">
            <section class="search text-container container-discreet">
                <h2 class="b-font-family-serif">Cari...</h2>
                <span class="angle">&nbsp;</span>
                <p>Explore our projects, publications and blog posts</p>
                <form id="search" action="
                /search
                " method="get" class="searching">
                    <label for="search-text">Search</label>
                    <input id="search-text" class="text" name="query" type="text" placeholder="Enter titles, keywords, names..." value="<?php echo $_GET["query"] ?>" />
                    <input type="hidden" name="Year" value="<?php echo $_GET["Year"] ?>" />
                    <button type="submit" id="search-submit">
                        <i aria-hidden="true" class="gelicon gelicon--search"></i>
                        <span class="hidden">Search</span>
                    </button>
                </form>
            </section>

        </aside>
    </div>

    <!-- Filters -->

    <aside id="facets" class="span4 left">
        <div class="facet-group">
            <section class="block text-container container-no-padding">
                <h2 class="text-container container-title b-font-family-serif">
                    <span>Years</span> <span class="selected-label">All</span>
                </h2>
                <ul class="facets listing">
                    <li class="text-container container-no-padding container-collapsed">
                        <p>
                            <a class="facet-item text-container container-link container-discreet <?php echo ($_GET["Year"] == 'All' ? "facet-active" : "") ?>" href="<?php echo base_url() ?>/search?query=<?php echo $_GET["query"] ?>&Year=All">All <span class="facet-count"></span></a>
                        </p>
                    </li>
                </ul>
                <section class="search text-container container-discreet">
                    <form id="searchYear" action="
                /search
                " method="get" class="searching">

                        <input id="search-textYear" class="text" name="Year" type="text" placeholder="Enter year..." value="<?php echo $_GET["Year"] ?>" />
                        <input type="hidden" name="query" value="<?php echo $_GET["query"] ?>" />
                        <button type="submit" id="search-submitYear">
                            <i aria-hidden="true" class="gelicon gelicon--search"></i>
                            <span class="hidden">Search</span>
                        </button>
                    </form>
                </section>
            </section>
        </div>
    </aside>

    <!-- Results -->
    <article id="results" class="span8">
        <ul class="results shorts listing text-container container-no-padding" id="tbody">
            <?php
            if (isset($recordPublication)) {
                foreach ($recordPublication as $data) { ?>
                    <li class="block container-collapsed text-container container-no-padding">
                        <a href="<?php echo base_url() ?>/Publication/<?php echo str_replace("http://www.wikidata.org/entity/", "", "$data->ID")
                                                                        ?>">
                            <div class="teaser text-container container-discreet">
                                <h3 class="b-font-family-serif"><?php echo $data->title
                                                                ?></h3>

                                <p class="subscript">
                                    <strong><?php echo  str_replace("T00:00:00Z", "", "$data->date")
                                            ?></strong>
                                </p>
                            </div>
                        </a>
                    </li>
            <?php }
            } ?>
        </ul>
        <div class="bottom-field">
            <ul class="pagination">
                <li class="prev"><a href="#" id="prev">&#139;</a></li>
                <!-- page number here -->
                <li class="next"><a href="#" id="next">&#155;</a></li>
            </ul>
        </div>
    </article>
</section>
</div>
</div>