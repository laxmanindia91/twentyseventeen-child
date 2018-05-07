<?php
/*
Template Name: Custom Google Search
*/
wp_head();
get_header();
?>


<div class="container">
  <h2>Google Search</h2>
  <div class="row">
  <div class="col-sm-6">
 <div id="custom_search" style="height: 325px;">
 <!--script>
  (function() {
    var cx = '009787743651528933971:dpsywptyjhs';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search-->

<script>
  (function() {
    var cx = '009787743651528933971:dpsywptyjhs';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchbox-only></gcse:searchbox-only>

  </div>
</div>
  
</div>

</div>


<?php get_footer(); ?>