const bannerSwiper = new Swiper(".whats-news", {
  slidesPerView: 1,
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    // dynamicBullets: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 40,
      dynamicBullets: false,
    },
  },
});

const menuchildrens = document.querySelectorAll(".menu-item-has-children");
menuchildrens.forEach((child) => {
  child.addEventListener("click", () => {
    menuchildrens.forEach((item) => {
      if (item != child) {
        item.classList.remove("active");
      }
    });
    child.classList.toggle("active");
  });
});

//HEADER MOBILE

const burger = document.querySelector(".burger-container");
burger.addEventListener("click", () => {
  burger.classList.toggle("active");
});

(function () {
  tinymce.PluginManager.add("custom_button_plugin", function (editor, url) {
    editor.addButton("custom_button", {
      title: "Insert Button",
      icon: "icon dashicons-before dashicons-flag",
      onclick: function () {
        editor.windowManager.open({
          title: "Insert Button",
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
            editor.insertContent(
              '<a href="' +
                e.data.link +
                '" class="button">' +
                e.data.text +
                "</a>"
            );
          },
        });
      },
    });
  });
})();

jQuery(document).ready(function ($) {
  $("body").on("click", ".button", function (e) {
    e.preventDefault();
    var link = prompt("Enter Button Link:", "");
    var text = prompt("Enter Button Text:", "");
    if (link != null && link != "" && text != null && text != "") {
      var html = '<a href="' + link + '" class="button">' + text + "</a>";
      tinyMCE.activeEditor.execCommand("mceInsertContent", false, html);
    }
  });
});
