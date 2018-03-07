export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('.project-box .body').each((idx, elem) => {
      let parent = $(elem).parent();
      let color = $(elem).attr('data-tint');
      let className = 'dynamic-tint-' + color.slice(1);

      parent.addClass(className);
      parent.append(`
        <style>
          .${className} .body::before {
            background-color: ${color};
          }

          .${className} .footer .label {
            color: ${color};
          }

          .${className} .footer .label .icon {
            color: ${color};
          }

          .${className} .body .label .icon {
            color: ${color};
          }
        </style>
      `);
    });
  },
};
