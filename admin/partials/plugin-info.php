<div class="wrap">
    <!-- Here are our tabs -->
    <nav class="nav-tab-wrapper">
      <a href="?page=ib-rfw" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Plugin Information</a>
    </nav>

    <div class="tab-content">
        <?php switch($tab) :
          default:
                require_once plugin_dir_path( __FILE__ )."/rfw-default.php";
            break;
        endswitch; ?>
    </div>
</div>