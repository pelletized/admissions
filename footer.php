<?php //The template for displaying the footer. ?>


<script>
head.js(
   {jquery: "http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"},	   
   {placeholder:"/wp-content/themes/admissions/js/jquery.placeholder.min.js"}, //ie doesn't support placeholder attribute      
   {masonry: "/wp-content/themes/admissions/js/jquery.masonry.min.js"}, //for homepage post layout	      
   {infinitescroll: "/wp-content/themes/admissions/js/jquery.infinitescroll.min.js"}, //for homepage post layout	
   //{addthis: "http://s7.addthis.com/js/250/addthis_widget.js"}, //for share button	
   {common: "/wp-content/themes/admissions/js/utils.js"} //common  	
);
</script>

<?php wp_footer(); ?>
</body>
</html>
