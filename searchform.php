<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
	<fieldset>
		<div class="input-group">
			 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-search"></i></span>
			<input type="text" id="haha" name="s" id="search" placeholder="I'm looking for" value="<?php the_search_query(); ?>" class="form-control"></input>
		</div>
	</fieldset>
</form>