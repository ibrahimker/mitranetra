<?php
/* Template Name: Statistic Template */
get_header();
?>
<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="row">
                <h1></h1>
            </div>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default" style="color:#000;background-color: #ddd">
                    <div class="panel-heading" role="tab" id="headingOne" style="color:#000;background-color: #ddd">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Statistik Pengunjung Mitra Netra
                      </a>
                  </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body" style="color:#000;background-color:#ddd">
                    <?php
                    $user_query = new WP_User_Query( array( 'role' => 'Subscriber' ) );
                    $authors = $user_query->get_results();
                    // print_r($authors);
                    if (!empty($authors)) {
                        echo '<ol>';
                        foreach ($authors as $author)
                        {
                            echo '<li>'.$author->first_name.' '.$author->last_name. ' Bergabung tanggal '. $author->user_registered.'</li>';
                            $metadata = get_metadata('user',$author->id);
                            $age = date_diff(date_create($metadata['tanggal_lahir'][0]), date_create('today'))->y;
                            // echo ''.$metadata['tanggal_lahir'][0].'';
                        }
                        echo '</ol>';
                    } else {
                        echo 'No users found';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<?php get_footer(); ?>
