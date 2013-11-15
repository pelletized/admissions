//common functions here
$('input, textarea').placeholder();


//homepage masonry

//in a setTimeout because of firefox overlapping bug
window.setTimeout((function() {
	$('.homepage-content').masonry({  
	  itemSelector: '.home-post'
	});	
	}	
),100);



var $container = $('.homepage-content');

$container.infinitescroll({
  navSelector  : '#nav-below',    // selector for the paged navigation 
  nextSelector : '#nav-below a',  // selector for the NEXT link (to page 2)
  itemSelector : '.home-post',     // selector for all items you'll retrieve
  loading: {
	  finishedMsg: 'No more pages to load.',
	  img: 'http://i.imgur.com/6RMhx.gif'
	}
  },
  // trigger Masonry as a callback
  function( newElements ) {
	// hide new items while they are loading
	var $newElems = $( newElements ).css({ opacity: 0 });
	// ensure that images load before adding to masonry layout
	$newElems.imagesLoaded(function(){
	  // show elems now they're ready
	  $newElems.animate({ opacity: 1 });
	  $container.masonry( 'appended', $newElems, true ); 	  
	  //addthis.counter('.addthis_counter');
	  addthis.toolbox('.addthis_counter');
	  addthis.counter('.addthis-link');
	});
	//addthis.counter('.addthis-link');
	
  }
);

function addthisLink(atId, atPermalink, atTitle) {
	var addthisButton = addthis.counter('#' + atId,{},{url : atPermalink , title: atTitle});
	return addthisButton;			
}

function recentArticles() {	
	//display last 2 posts with shortened excerpt in sidebar
	var url = '/?feed=json&jsonp=?'
	$.getJSON(url, function(data){
		for (var i=0; i<=1; i++) {
           postPermalink = data[i].permalink;
           postExcerpt = data[i].excerpt;
           shortExcerpt = jQuery.trim(postExcerpt).substring(0, 100).trim(this) + "...";
		   postDate = data[i].date;

		   postTitle = '<a href="'+ postPermalink + '">' + postDate + '</a>';
		   postContent = postTitle + '<br />' + shortExcerpt +'<br /><br />'; 

		   $('#recent-articles').append(postContent);
        }   
    });
}

$(document).ready(function() {	
	recentArticles();
});