<?php
// Article Template
function article_card()
{ ?>
    <article class="row single-article mb-4">
        <div class="col-lg-5">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large', array('class' => 'img-fluid')) ?>
            </a>
        </div>
        <div class="col-lg-7 single-article-content">
            <a href="<?php the_permalink(); ?>">
                <h2><?= the_title(); ?></h2>
            </a>
            <div class="the-excerpt mb-20">
                <?php the_excerpt(); ?>
            </div>
            <div class="blog-archive-meta mb-20">
                <h5>By <?php the_author() ?> on <?= get_the_date('d/m/Y'); ?> in <?= categories(); ?></h5>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary" role="button">Read More</a>
        </div>
    </article>
<?php }
// Fleet Template
function fleet_card()
{
    // Get the page featured image
    $image = wp_get_attachment_url(get_post_thumbnail_id());

    // Get the page title
    $title =  get_the_title();

    // Get the page link
    $link = get_the_permalink() ?: get_bloginfo('url');

    // Check if it is a featured vessel 
    $featured_tag = 'featured';
    $featured_class = '';
    if (has_term($featured_tag, 'fleet-tags'))
    {
        $featured_class = 'big';
    } ?>

    <div class="fleet-cards normal-state <?= $featured_class; ?>" style="background: linear-gradient(180deg, #24000280 0%, #26010380 19%, #0D000180 100%) 0% 0%, url('<?= $image; ?>') no-repeat center center; background-size: cover;" data-link="<?= $link; ?>">
        <a href="<?= $link; ?>" class="fleet-cards-link">
            <video onmouseover="this.play()" onmouseout="this.pause(); this.currentTime=0;">
                <source src="<?= get_field('video')['url']; ?>" type="video/mp4"></source>
            </video>
            <div class="details">
                <div class="title"><?= $title; ?></div>
                <div class="info">
                    <div class="det">Year - <span><?= get_field('year'); ?></span></div>
                    <div class="det">Overall Length - <span><?= get_field('length'); ?></span>M</div>
                    <div class="det">Tonnage - <span><?= get_field('grt'); ?></span>GRT</div>
                </div>
            </div>
        </a>
    </div>

    <div class="fleet-cards loading-cards loading-state <?= $featured_class; ?>">
        <div class="loading-cards-image"></div>
    </div>
<?php }
// Services Template
function services_cards()
{ ?>
    <div class="col-hld">
        <a href="<?php echo the_permalink(); ?>">
            <div class="card-top">
                <div class="col-photo" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                <div class="title"><?= the_title(); ?></div>
                <div class="overlay"></div>
            </div>
            <div class="card-btm">
                <div class="details"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></div>
                <div class="arrow d-flex justify-content-between align-items-center">
                    <span>Learn More</span>
                    <span><i class="fas fa-arrow-right"></i></span>
                </div>
            </div>                                
        </a>
    </div>

<?php }
// Compliance Template
function events_cards()
{ ?>
    <div class="events-hld">
        <a href="<?php echo the_permalink(); ?>">
            <div class="title"><?php echo the_title(); ?></div>
            <div class="cont">
                <div class="photo bkg-std" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                <div class="overlay"></div>
                <div class="date">
                    <span><?= get_field('event_day')?></span>
                    <span><?= get_field('event_month')?></span>
                </div>
            </div>
        </a>
    </div>
<?php } 
// Careers Template
function careers_card()
{ ?>
    <article class="row single-article mb-lg-4 mb-2">
        <div class="col-lg-12">
            <a href="<?php the_permalink(); ?>">
                <?php 
                    //get the categories
                    $termsCat = get_the_terms($post->ID, 'career-categories' );
                    $termsTag = get_the_terms($post->ID, 'career-tags' );
                ?>
                <div class="header">
                    <div class="sec-hdr rg dark"><?= the_title(); ?></div>
                    <!-- <div class="dept"><?= $termsCat[0]->name; ?></div> -->
                    <div class="action">Job Details <i class="fas fa-chevron-right"></i></div>
                </div>
                <div class="content">
                    <div class="sec-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. </div>
                </div>
                <!-- <div class="info">
                    <div class="det">
                        <span><i class="fas fa-location-dot"></i></span>
                        <span><?= get_field('location')[0] -> post_title ?></span>
                    </div>
                    <div class="det">
                        <span><i class="fas fa-briefcase"></i></span>
                        <span><?= $termsTag[0]->name; ?></span>
                    </div>
                </div> -->
            </a>
        </div>
    </article>
<?php }
// Resources Template
function news_cards()
{ ?>
    <div class="news-hld">
        <a href="<?php the_permalink(); ?>">
            <div class="image bkg-std" style="background-image: url('<?= the_post_thumbnail_url(); ?>')"></div>
            <div class="details">
                <div class="title"><?= the_title(); ?></div>
                <?php $date = get_post_meta(get_the_ID(), 'date', true)?>
				<div class="date"><?php echo date('d F, Y', strtotime($date)); ?></div>
                <!-- <div class="sec-text sm"><?php echo wp_trim_words(get_field('content'), 15); ?></div> -->
            </div>
        </a>
    </div>
<?php }
// Projects Template
function projects_cards()
{ ?>
    <div class="col-hld">
        <a href="<?php echo the_permalink(); ?>">
            <div class="overlay"></div>
            <div class="col-photo" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
            <div class="details">
                <?php $date = get_field('date')?>
                <div class="date"><?php echo date('F Y', strtotime($date)); ?></div>
                <div class="title"><?php echo the_title(); ?></div>
            </div>
            
            <span class="tag <?= get_field('status'); ?>"><?= get_field('status'); ?></span>
        </a>
    </div>
<?php }
// Media Template
function media_cards()
{ ?>
    <div class="media-hld">
        <div class="inner-wrap">
            <div class="image bkg-std" style="background-image: url('<?= the_post_thumbnail_url(); ?>')">
                <div class="overlay"></div>
                <div class="media-trigger">
                    <div class="btn-hld">
                        <?php if (get_field('video_link')) : ?>
                            <a href="#" id="open-lightbox" class="btn btn_bold transparent video playVid">
                                <span><img class="hovered" src="<?= get_stylesheet_directory_uri() . '/dist/img/play-fill.svg' ?>" alt="" /></span>
                            </a>
                        <?php endif; ?>
                        <?php $images = get_field('photos'); ?>
                        <div class="gallery-cont">
                            <?php if( $images ): ?>
                                <?php foreach( $images as $image ): ?>
                                    <a class="gallery-hld cta" href="<?= $image['url']; ?>" data-fancybox="gallery" data-caption="<?= the_title(); ?>">
                                        <span><i class="fas fa-image"></i></span>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="details">
                <div class="title"><?= the_title(); ?></div>
                <div class="sec-text sm"><?= the_content(); ?></div>
            </div>
            
        </div>
    </div>
<?php }
// Team Template
function team_cards()
{ ?>
    <div class="col-hld">
        <div class="col-cont">
            <div class="col-photo">
                <div class="image" style="background-image: url('<?= get_sub_field('photo')['url']; ?>');"></div>
                <?php if(get_sub_field('linkedin')): ?>
                    <a class="arrow" href="<?= get_sub_field('linkedin'); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <?php endif; ?>
                <div class="overlay"></div>
            </div>
            <div class="col-det">
                <div class="col-title"><?= get_sub_field('name'); ?></div>
                <div class="col-cat"><?= get_sub_field('role'); ?></div>
            </div>
        </div>
    </div>
<?php }
// Workshops Template
function workshops_cards()
{ ?>
    <div class="workshops-hld">
        <a class="inner" href="<?= the_permalink(); ?>">
            <div class="details">
                <div class="title"><?= the_title(); ?></div>
                <div class="info-wrap">
                    <div class="info">
                        <span><i class="fas fa-calendar-days"></i></span>
                        <?php $date = get_post_meta(get_the_ID(), 'date', true)?>
				        <span class="date"><?= date('d F, Y', strtotime($date)); ?></span>
                    </div>
                    <div class="info">
                        <span><i class="fas fa-clock"></i></span>
                        <span><?= get_field('time'); ?></span>
                    </div>
                    <div class="info">
                        <span><i class="fas fa-globe"></i></span>
                        <span><?= get_field('location'); ?></span>
                    </div>
                    <div class="info price">
                        <span><?= get_field('price'); ?></span>
                    </div>
                </div>
            </div>
            <div class="btn-hld">Register now</div>
            
        </a>
    </div>
<?php }