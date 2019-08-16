      <style>
          <?php $xs_bg_image = get_field('xs_bg_image'); if( !empty($xs_bg_image) ): ?>        
          @media (max-width: 576px) {
            body {
              background-image: url(<?php echo $xs_bg_image['url']; ?>);
              background-position-x: 30%;
              background-size:cover;
              background-repeat: no-repeat;
              background-attachment: fixed;
                
            }
          }
          <?php 
           endif; 
           $sm_bg_image = get_field('sm_bg_image'); if( !empty($sm_bg_image) ): ?>        
          @media (max-width: 784px) {
            body {            
              background-image: url(<?php echo $sm_bg_image['url']; ?>);
              padding-left:0;
              padding-right:0;
              background-size:cover;
              background-repeat: no-repeat;
              background-attachment: fixed;
            
            }
          }
          <?php 
           endif; 
           $md_bg_image = get_field('md_bg_image'); if( !empty($md_bg_image) ): ?>        
          @media (max-width: 992px) {
            body {            
              background-image: url(<?php echo $md_bg_image['url']; ?>);
              background-size:cover;
              background-repeat: no-repeat;
              background-attachment: fixed;
            }
          }
          <?php 
           endif; 
           $lg_bg_image = get_field('lg_bg_image'); if( !empty($lg_bg_image) ): ?>        
          @media (max-width: 1199.98px) {
            body {            
              background-image: url(<?php echo $lg_bg_image['url']; ?>);
              background-size:cover;
              background-repeat: no-repeat;
              background-attachment: fixed;
            }
          }
          <?php 
           endif; 
           $xl_bg_image = get_field('xl_bg_image'); if( !empty($xl_bg_image) ): ?>        
          @media (min-width: 1200px) {
            body {            
              background-image: url(<?php echo $xl_bg_image['url']; ?>);
              background-size:cover;
              background-repeat: no-repeat;
              background-attachment: fixed;
            }
          }
          <?php endif; ?>
      </style>
