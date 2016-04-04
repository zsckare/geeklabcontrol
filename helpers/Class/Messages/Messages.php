<?php
if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
	$type = ["alert", "delete", "edit", "complete"];

	$cookies = Cookies::getAll();

	for ($i=0; $i < count($cookies) ; $i++) {
	   for ($j=0; $j < count($type) ; $j++) {
	      if($cookies[$i] == $type[$j]){
	?>
	      <div id="msj" class="hide">
	         <figure><img src="" alt=""></figure>
	         <p></p>
	      </div>
	      <script src="/media/js/messages.js"></script>
	<?php
	      }
	   }
	}
}