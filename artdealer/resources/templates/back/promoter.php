<h4>promoter stuff
</h4>

<div class="container">
  <h2>Paintings I am promoting</h2>
    

    get username, query promotions for that username, return id's of paintings promoted, check if less than 5.  if so display add.  either way display edit button.
    
    <ul>
    <?php get_promoted_paintings_for_admin(); ?>
    
    </ul>

  <form class="form-inline">
    <div class="form-group">
      <input type="text" class="form-control" id="art_number" placeholder="add painting id #">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
    
     
</div>

<p>etc etc</p>