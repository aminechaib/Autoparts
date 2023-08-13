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
<script>
        document.getElementById('uploadButton').addEventListener('click', function() {
            const input = document.getElementById('imageInput');
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = new Image();
                    img.src = e.target.result;

                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = 200;
                        canvas.height = 200;
                        ctx.drawImage(img, 0, 0, 200, 200);

                        const resizedDataURL = canvas.toDataURL('image/jpeg', 0.8);

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'upload.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                console.log(xhr.responseText);
                                location.reload(); // Reload the page to show the session variable
                            }
                        };
                        xhr.send('image=' + encodeURIComponent(resizedDataURL));
                    };
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>