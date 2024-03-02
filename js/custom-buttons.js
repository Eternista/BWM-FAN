(function () {
  tinymce.create("tinymce.plugins.customButtons", {
    init: function (ed, url) {
      ed.addButton("customButton", {
        type: "listbox",
        text: "Custom Buttons",
        values: [
          { text: "Primary Button", value: "primary-button" },
          { text: "Secondary Button", value: "secondary-button" },
          { text: "Tertiary Button", value: "tertiary-button" },
          {
            text: "Primary + Secondary Button",
            value: "primary-secondary-button",
          },
        ],
        onselect: function (e) {
          var selectedValue = this.value();
          if (selectedValue === "primary-secondary-button") {
            ed.windowManager.open({
              title: "Primary + Secondary Button",
              body: [
                {
                  type: "textbox",
                  name: "primaryLink",
                  label: "Primary Button Link",
                },
                {
                  type: "textbox",
                  name: "primaryText",
                  label: "Primary Button Text",
                },
                {
                  type: "textbox",
                  name: "secondaryLink",
                  label: "Secondary Button Link",
                },
                {
                  type: "textbox",
                  name: "secondaryText",
                  label: "Secondary Button Text",
                },
              ],
              onsubmit: function (e) {
                ed.insertContent(
                  '<div><a class="primary-button" href="' +
                    e.data.primaryLink +
                    '">' +
                    e.data.primaryText +
                    '</a><a class="secondary-button" href="' +
                    e.data.secondaryLink +
                    '">' +
                    e.data.secondaryText +
                    "</a></div>"
                );
              },
            });
          } else {
            ed.windowManager.open({
              title: selectedValue + " Button",
              body: [
                {
                  type: "textbox",
                  name: "link",
                  label: "Button Link",
                },
                {
                  type: "textbox",
                  name: "text",
                  label: "Button Text",
                },
              ],
              onsubmit: function (e) {
                ed.insertContent(
                  '<a class="' +
                    selectedValue +
                    '" href="' +
                    e.data.link +
                    '">' +
                    e.data.text +
                    "</a>"
                );
              },
            });
          }
        },
      });
    },
    createControl: function (n, cm) {
      return null;
    },
  });
  tinymce.PluginManager.add("customButtons", tinymce.plugins.customButtons);
})();
