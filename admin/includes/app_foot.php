<?php
require_once('../includes/initialize.php');

require_login();
?>



<script src="<?php echo url_for('dist/lightbox.js'); ?>"></script>
    <script>


$(function() {

    // Write on keyup event of keyword input element
    $("#search").keyup(function() {
        $('#load_search').toggleClass('loading');
        var searchText = $(this).val().toLowerCase();
        // Show only matching TR, hide rest of them
        $.each($("#table tbody tr"), function() {
            if ($(this).text().toLowerCase().indexOf(searchText) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });
  // js toggle example "1"
  $("#leftbar-toggle").click(function() {
    event.preventDefault();
  $("body").toggleClass("opened");
 });

 $(document).ready(function(){
		$('#search_piece').on('keydown',function(){
			var searched_piece = $(this).val();
			console.log(searched_piece);
			if(searched_piece){
				$.ajax({
					type:'POST',
					url:'../search_piece.php',
					data:'search='+searched_piece,
					success:function(html){
						//$('#compatible').html(html);					
					}
				}); 
			}else{
				$('#moteur').html('<option value="">Select category first</option>');
				
			}
		});
		
		
	});

  // js toggle example "2"
  /*
   $(".leftbar").hover(function() {
     $("body").toggleClass("opened");
   });
   */
  // js toggle example "3"
  // $("#leftbar-toggle").click(function() {
  //   $("body").toggleClass("opened");
  // });
  
});

function filterDropdownOptions(dropdownId, query) {
        const dropdown = document.getElementById(dropdownId);
        for (let i = 0; i < dropdown.options.length; i++) {
            const optionText = dropdown.options[i].text.toLowerCase();
            if (optionText.includes(query.toLowerCase())) {
                dropdown.options[i].style.display = "block";
            } else {
                dropdown.options[i].style.display = "none";
            }
        }
    }
                           
</script>

</body>
</html>