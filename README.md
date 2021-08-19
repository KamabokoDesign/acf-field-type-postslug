# ACF Field Type Post Slug

Select a post name and acf returns with the post index.

Use cases are for the plugin WPSiteSync. Where the PostObject field for multidev sites don't share the same POST ID's (due to database uniqueness).


Unfortunately at the moment this only takes the published Post / Page's index. There's something happening in the update_value function where ACF won't recognize an update of the value + keep the current choice stored on the $post_id

# Resources
[How to clear values on Admin <select>](https://support.advancedcustomfields.com/forums/topic/use-select2-instead-of-browser-dropdown/)
