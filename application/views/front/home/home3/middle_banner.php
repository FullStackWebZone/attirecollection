<style>
    @import url(https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,900,700italic,700,600italic,600,400italic);

    .body_row {
        font-family: 'Titillium Web', cursive;
        /*width: 800px;*/
        margin: 0 auto;
        text-align: center;
        color: white;
        background: #222;
        font-weight: 100;
    }

    .body_row div {
        display: inline-block;
        line-height: 1;
        padding: 20px;
        font-size: 40px;
    }

    #days span {
        display: block;
        font-size: 20px;
        color: white;
    }

    #hours span {
        display: block;
        font-size: 20px;
        color: white;
    }

    #minutes span {
        display: block;
        font-size: 20px;
        color: white;
    }

    #seconds span {
        display: block;
        font-size: 20px;
        color: white;
    }

    #days {
        font-size: 100px;
        color: #db4844;
    }

    #hours {
        font-size: 100px;
        color: #f07c22;
    }

    #minutes {
        font-size: 100px;
        color: #f6da74;
    }

    #seconds {
        font-size: 50px;
        color: #abcd58;
    }
</style>
<!-- PAGE -->
<?php
$this->db->where("place", "after_slider");
$this->db->where("status", "ok");
$banners = $this->db->get('banner')->result_array();

$count = count($banners);
if ($count == 1) {
    $md = 12;
    $sm = 12;
    $xs = 12;
} elseif ($count == 2) {
    $md = 6;
    $sm = 6;
    $xs = 6;
} elseif ($count == 3) {
    $md = 4;
    $sm = 4;
    $xs = 12;
} elseif ($count == 4) {
    $md = 3;
    $sm = 6;
    $xs = 6;
}

if ($count !== 0) {
?>
    <section class="page-section" style="padding-top: 30px">
        <div class="container">
            <div class="row">
                <?php
                foreach ($banners as $row) {
                ?>
                    <div class="col-md-<?php echo $md; ?> col-sm-<?php echo $sm; ?> col-xs-<?php echo $xs; ?>">
                        <div class="thumbnail no-scale no-border no-padding thumbnail-banner size-1x<?php echo $count; ?>">
                            <div class="media">
                                <a class="media-link" href="<?php echo $row['link']; ?>">
                                    <div class="img-bg image_delay" data-src="<?php echo $this->crud_model->file_view('banner', $row['banner_id'], '', '', 'no', 'src', '', '', $row['image_ext']) ?>" style="background-image: url('<?php echo img_loading(); ?>')"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

<?php
}
?>
<!-- /PAGE -->