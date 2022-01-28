
<div class="nav-search">
    <p class="search-button"><i class="fa fa-search"></i></p>
    <div class="search-box">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
           
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'radiate' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
            <button type="submit" class="search-submit">Search</button>
        </form>
    </div>
</div>



