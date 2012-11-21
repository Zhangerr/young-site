	<!-- main span10 end--></div> 
	<!-- row fluid end --></div> 
	<div class="clear"></div>
	 <!-- main container end --></div>
	 <!-- #wrap end--></div>
<footer>
      <!--credits for one sided box shadow: http://stackoverflow.com/questions/4756316/css3-box-shadows-in-one-direction-only -->
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span10 offset1" id="footer-lists">
          <div class="row-fluid">
            <div class="span3">
              <h5>
              <i class="icon-home icon-white"></i> Navigation</h5>
              <ul>
                <li>
                  <a href="<?php echo home_url();?>">Home</a>
                </li>
                <li>
                  <a href="http://sctritons.schoolloop.com">Grades</a>
                </li>
                <li>
                  <a href="wp-login.php">Login</a>
                </li>
              </ul>
            </div>
            <div class="span3">
              <h5>
              <i class="icon-list icon-white"></i> Subjects</h5>
              <ul>
                <?php wp_list_categories( array('title_li' => '')); ?>
              </ul>
            </div>
            <div class="span3">
              <h5>
              <i class="icon-heart icon-white"></i> Leisure</h5>
              <ul>
                <li>
                  <a href="http://sctritonscience.com/Young/morph_young.htm">Morph Mr. Young</a>
                </li>
                <li>
                  <a href="http://apod.nasa.gov/apod/">Astronomy Corner</a>
                </li>
              </ul>
            </div>
            <div class="span3">
            <h5>
            <i class="icon-user icon-white"></i> Contact</h5>
            <strong class="contact-title">EMAIL</strong>
            <hr class="contact-hr" />
            <i class="icon-envelope icon-white"></i> 
            <a href='mailto:GYYOUNG@capousd.org'>gyyoung@capousd.org</a>
            <br />
            <br />
            <strong class="contact-title">Work Phone</strong>
            <hr class="contact-hr" />
            <i class="icon-phone icon-white"></i> (949)-492-4165 ext. 2504
            <br />
            <br />
            <strong class="contact-title">Best time to call</strong>
            <hr class="contact-hr" />
            <i class="icon-calendar icon-white"></i> M,T,W and F before 9 A.M.</div>
          </div>
          <br />
          &copy; <a href="http://code.google.com/p/schs-site">SCHS Web Design Club</a> 2012 | Built with 
          <a href="http://twitter.github.com/bootstrap/">Bootstrap</a> and 
          <a href="http://wordpress.org">Wordpress</a> | 
          <a href="#">Top</a>
          <br />
          <br /></div>
        </div>
      </div>
      <div id="copyright"></div>
    </footer><?php wp_footer(); ?>
