# ACF Field Type Post Slug

Select a post name and acf returns with the post slug


Unfortunately at the moment this only takes the published Post / Page's index. There's something happening in the update_value function where ACF won't recognize an update of the value + keep the current choice stored on the $post_id
