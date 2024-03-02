jQuery(document).ready(function () {
  jQuery("#category-filter-form").submit(function (event) {
    event.preventDefault();

    // Get the selected categories
    const selectedCategories = [];
    jQuery(this)
      .find('input[type="checkbox"]:checked')
      .each(function () {
        selectedCategories.push(jQuery(this).val());
      });

    // Send AJAX request to retrieve filtered posts
    jQuery.ajax({
      url: ajaxurl,
      type: "POST",
      data: {
        action: "category_filter",
        categories: selectedCategories.join(","),
      },
      success: function (response) {
        jQuery("#filtered-posts").html(response.data);
      },
      error: function (xhr, status, error) {
        console.error("AJAX request failed: " + status + ", " + error);
      },
    });
  });
});
