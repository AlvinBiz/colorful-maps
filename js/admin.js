
(function($) {
  $(document).ready(function(){
    	
    	//Color picker fields
    	$('.color-field').wpColorPicker();

    	//Address prefiller
	 	input = document.getElementById("cm-address-input");
	  	searchBox = new google.maps.places.SearchBox(input);

	  	//Clear marker image choice 
	  	var image = $('#marker-image');
	  	var deleter = $('#image-clear');
	  	var preview = $('#marker-preview');
	  	$(deleter).click(removeImage);
	  	function removeImage() {
	  		console.log('fired');	
	  		image.val("");
	  		preview.attr("src","");
	  	}

		//Marker styles
	  	$('.cm-admin-opt-form input[type=range]').on('click', markerSlider);
		  function markerSlider() {
		    $(this).siblings('.range-result').text($(this).val());
		  }

		// default tab
		document.getElementById("default-tab").click();

		
	}); 

})(jQuery)

// Tabs js
function openTab(evt, tabName) {
// Declare all variables
var i, tabcontent, tablinks;

// Get all elements with class="tabcontent" and hide them
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}

// Get all elements with class="tablinks" and remove the class "active"
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" active", "");
}

// Show the current tab, and add an "active" class to the button that opened the tab
document.getElementById(tabName).style.display = "block";
evt.currentTarget.className += " active";
}