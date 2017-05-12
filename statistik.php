<?php
/* Template Name: Statistic Template */
get_header();
?>
<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="col-md-1">
        </div>
        <div class="col-md-10" role="main">
            <div class="row">
                <h1></h1>
            </div>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default" style="color:#000;background-color: #ddd">
                    <div class="panel-heading" role="tab" id="headingOne" style="color:#000;background-color: #ddd">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Statistik Pengunjung Mitra Netra</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Statistik Pengunjung Mitra Netra">
                        <div class="panel-body" style="color:#000;background-color:#fff">
                            <?php
                            $user_query = new WP_User_Query( array( 'role' => 'Subscriber' ) );
                            $authors = $user_query->get_results();
                            if (!empty($authors)) {
                                echo '<table class="table table-bordered table-striped">';
                                echo '<th>Nama</th><th>Tanggal Bergabung</th>';
                                foreach ($authors as $author)
                                {
                                    echo '<tr><td>'.$author->first_name.' '.$author->last_name. '</td><td>'. $author->user_registered.'</td></tr>';
                                    $metadata = get_metadata('user',$author->id);
                                    $age = date_diff(date_create($metadata['tanggal_lahir'][0]), date_create('today'))->y;
                                }
                                echo '</table>';
                            } else {
                                echo 'No users found';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default" style="color:#000;background-color: #ddd">
                    <div class="panel-heading" role="tab" id="headingTwo" style="color:#000;background-color: #ddd">
                        <h4 class="panel-title">
                            <a role="button" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Statistik Download Buku Mitra Netra</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Statistik Download Buku Mitra Netra">
                      <div class="panel-body" style="color:#000;background-color:#fff">
                        <?php
                        global $wpdb;
                        $databuku=$wpdb->get_results($wpdb->prepare('SELECT post_title,date_time FROM ' . $wpdb->prefix . 'sdm_downloads'));
                        if (!empty($databuku)) {
                            echo '<p>' . $wpdb->num_rows . ' buku telah diunduh</p>';
                            echo '<table class="table table-bordered table-striped">';
                            echo '<th>Judul</th><th>Diunduh pada</th>';
                            foreach ($databuku as $author)
                            {
                                echo '<tr><td>'.$author->first_name.' '.$author->post_title. '</td><td>'. $author->date_time.'</td></tr>';
                            }
                            echo '</table>';
                        } else {
                            echo 'Tidak ada buku yang diunduh';
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
