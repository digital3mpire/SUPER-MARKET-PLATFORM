<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('partials/header.php');?>
	<body class="home">

	<?php $this->load->view('partials/navigation.php');?>
	<h1 class="superhead">SUPER-INFORMATION-HIGH-MARKET</h1>
	<h3 class="superhead">A MARKET AFTER THE MARKET ON STEROIDS</h3>

	<div class="fullsize-box">
		<div class="row">
			<div class="col s12">
				<h4 class="flow-text">Shopping as an act of curation.
					<br>Curation as an act of the accumulation of social capital.</h4>

				<h4 class="flow-text">SUPER-INFORMATION-HIGH-MARKET is a pavillon structured like an online shop and its up to you, the audience, to <a href="/Supershop/listentity" class="menue-link">select the products aka artworks</a> from the favorit art brands.
					The idea behind is quite simple. If you go shopping your cart is always a well thought collection of highly wanted things. You curate your cart.<br>
					</h4>
					<h4 class="flow-text">In this special case your shoppingcart will be saved after checkout as personal selection of finest netart.
					<a href="/Supershop/collections" class="menue-link">Shoppingcart-collections</a> are available to other users.</h4>

			</div>
		</div>
	</div>
	<h3 class="superhead">THE LATEST COLLECTIONS</h3>

	<div class="latest-collection-box">
		<article>
		<div class="row">
			<div class="col s12">
			</div>

			<?php

			while ($collectionrow = $collections->fetchArray()) {

				echo "<div class=\"col m2 s12\">";
				$collection = explode(",",rtrim($collectionrow['thecollection'],","));
				$randomartworkformcollection = $allentities[$collection[rand(0,count($collection)-1)]];
				echo "<div class=\"card\">
            			<div class=\"card-image\">";
				echo "		<img src=\"".$randomartworkformcollection->getThumbnail()."\" class=\"responsive-img materialboxed\">";

				echo " 		<span class=\"card-title\">'".$collectionrow['collection_title']."'</span>";
				echo "	</div>";
				echo "	<div class=\"card-content\">by ".$collectionrow['username']."</div>";
				echo "	<div class=\"card-action\"><a href=\"/Supershop/collection/id/".$collectionrow['id']."\">go to collection</a></div>";
				echo "</div>";
				echo "</div>";

			}


			?>

		</div>
			</article>
		</div>
	<h3 class="superhead">DEEP STRUCTURE HOWTO - THIS IS HOW IT WORKS</h3>
		<div class="container content-container z-depth-3">
		<article>
			<div class="row">
				<div class="col s10">
				<h3></h3>
					</div>
		      	<div class="col m6 s12">

					<h5>How this works for the audience</h5>
					<ul class="collection">
						<li class="collection-item">
							<h5>1. Order: Watch and select</h5>
							<p>Browse to the inventory at <a href="/Supershop/listentity" class="menue-link">Products overview</a>.
								If necesary jump to the github sources to get a better idea of the piece.<br>
								Discover, enjoy and if you are interested just download the repo.</p>
						</li>
						<li class="collection-item">
							<h5>2. Order: Super Power Publishing</h5>
							<p>If you like stuff put it in your shopping cart and save your collection for later sharing by checkout.</p>
						</li>
						<li class="collection-item">
							<h5>3. Curate your own show with your shopping cart</h5>
							<p>Go to checkout and save it as your collection. It will be available to other under collections</p>
						</li>
						<li class="collection-item">
							<h5>4. Order: Spread and share</h5>
							<p>Share your collection on the internet.</p>
						</li>
					</ul>

			  </div>
				<div class="col m6 s12">

					<h5>
						How this works for producers</h5>
					<ul class="collection">
						<li class="collection-item">
							<h5>1. Order: Intrude by publish</h5>
							<p>Artis commit artwork (audio, video, text, pics) to the repo on github</a>. Please be aware of the <a href="https://github.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET/tree/master/name_prename">structure</a> which is necessary to make the algorithms work to include github stuff into this frontend.
								<br>Possibilites are: pull request, or please contact <a href="http://twitter.com/fkuhlmann">me</a> for getting access to repo</p>
						</li>
						<li class="collection-item">
							<h5>2. Order: Escalate</h5>
							<p>After review and perhaps discussion new stuff will be merged into the repo</p>
						</li>
						<li class="collection-item">
							<h5>3. Order: Display</h5>
							<p>Artwork will be <a href="/Supershop/listentity">available under product lists</a> and part of THE WRONG now</p>
						</li>
					</ul>
      			</div>



    		</div>
		</article>
	</div>

	<!-- menue overlay -->

		<?php $this->load->view('partials/footer.php');?>

	</body>
</html>
