<section class="clearfix">
    <article class="span8">
        <?php foreach ($recordPublication as $data) { ?>
            <header class="header collapsed text-container container-title">
                <h1 class="b-font-family-serif">
                    <?php echo $data->title ?>
                </h1>
            </header>

            <!-- Author and Dates -->
            <section id="author" class="collapsed text-container container-collapsed">
                <p>
                    <span class="posted-by">
                        <?php foreach ($recordPerson as $dataP) { ?>
                            <strong>
                                <?php echo $dataP->name ?>
                            </strong><span> - </span>
                        <?php } ?>
                    </span>
                </p>
            </section>

            <section id="download" class="collapsed text-container container-collapsed clearfix">
                <p>


                    <!-- <a class="action postscript center" href="<?php #echo $data->file 
                                                                    ?>" title="Download">
                        <i aria-hidden="true" class="fa fa-download"></i>
                        <span>Download</span>
                    </a> -->

                <p class="center">
                    Published at <?php echo str_replace("T00:00:00Z", "", "$data->date") ?>
                </p>
                </p>
            </section>

            <div class="hero collapsed text-container container-no-padding">
                <!-- <div class="media">
                    <img src="" />
                </div> -->
            </div>

            <!-- <section class="text-container container-no-padding">
                <h2 class="text-container container-title b-font-family-serif">
                    Abstract
                </h2>
                <div class="text-container body-content">
                    <p>
                        <?php #echo $data->abstract 
                        ?>
                    </p>
                </div>
            </section> -->

            <!-- Sections -->

            <!-- Topics -->



            <section class="copyright block">
                <h2 class="text-container container-title b-font-family-serif">
                    copyright
                </h2>
                <div class="teaser text-container body-content">
                    <p>
                        Merupakan artikel ilmiah yang diterbitkan oleh <?php echo $data->publisher ?>.
                    </p>
                    <p>
                        Berikut Sumber asli <a href="https://doi.org/<?php echo str_replace('_', '/', $data->DOI) ?>">https://doi.org/<?php echo str_replace('_', '/', $data->DOI) ?></a>
                    </p>
                </div>
            </section>
        <?php } ?>
        <section class="block text-container container-no-padding">
            <h2 class="hd text-container container-title container-weight-normal b-font-family-serif">
                Recent Publications
            </h2>
            <ul class="listing" id="tbody">
                <?php foreach ($recordAnotherPublication as $data) { ?>
                    <li class="block container-collapsed text-container container-no-padding">
                        <a href="<?php echo base_url() ?>/Publication/<?php echo str_replace("http://www.wikidata.org/entity/", "", "$data->anotherID") ?>">
                            <div class="teaser text-container container-discreet">
                                <h3 class="b-font-family-serif">
                                    <?php echo $data->title ?>
                                </h3>

                                <p>
                                    <?php echo str_replace("T00:00:00Z", "", "$data->date") ?>
                                </p>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="bottom-field">
                <ul class="pagination">
                    <li class="prev"><a href="#" id="prev">&#139;</a></li>
                    <!-- page number here -->
                    <li class="next"><a href="#" id="next">&#155;</a></li>
                </ul>
            </div>
        </section>

        <!-- Topics -->
    </article>
    <!-- !Main content -->

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
                <button type="submit" id="search-submit">
                    <i aria-hidden="true" class="gelicon gelicon--search"></i>
                    <span class="hidden">Search</span>
                </button>
            </form>
        </section>


        <!-- Related Publications -->
    </aside>
</section>
</div>
</div>