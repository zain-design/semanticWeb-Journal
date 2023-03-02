<section class="height-match text-container container-no-padding container-transparent">
    <article class="span8">
        <?php foreach ($recordPerson as $data) { ?>
            <header class="header text-container container-title">
                <h1 class="title b-font-family-serif">
                    <?php echo $data->name ?>
                </h1>
                <p><?php echo $data->association ?> at <?php echo $data->organization ?></p>
            </header>

            <h2 class="hidden b-font-family-serif">Biography</h2>

            <div class="text-container body-content">
                <!-- <p>
            <img src="" />
        </p> -->
            </div>
        <?php } ?>
        <section class="block text-container container-no-padding">
            <h2 class="hd text-container container-title container-weight-normal b-font-family-serif">
                Recent Publications
            </h2>
            <ul class="listing">
                <?php foreach ($recordPublication as $data) { ?>
                    <li class="block container-collapsed text-container container-no-padding">
                        <a href="<?php echo base_url() ?>/Publication/<?php echo $data->DOI ?>">
                            <div class="teaser text-container container-discreet">
                                <h3 class="b-font-family-serif">
                                    <?php echo $data->title ?>
                                </h3>

                                <p>
                                    <?php echo $data->type ?>
                                </p>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </section>
    </article>

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

        <!-- Topics -->
        <section class="block research-areas">
            <h2 class="hd title text-container container-title container-weight-normal b-font-family-serif">
                Browse projects by <strong>topic</strong>
            </h2>
            <div class="topics text-container container-no-padding">
                <ul class="clearfix">
                    <?php foreach ($listTopic as $data) { ?>
                        <li>
                            <a href="<?php echo base_url() ?>/search?query=<?php echo $data->topic ?>&Type=All&Year=All"><?php echo $data->topic ?></a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </section>
    </aside>
</section>
</div>
</div>