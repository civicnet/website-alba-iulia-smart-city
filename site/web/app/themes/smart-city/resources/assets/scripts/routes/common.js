export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    let visitedColors = [];
    $('.project-box .body').each((idx, elem) => {
      let parent = $(elem).parent();
      let color = $(elem).attr('data-tint');
      let className = 'dynamic-tint-' + color.slice(1);
      
      parent.addClass(className);
      if (visitedColors.indexOf(color) > -1) {
        return;
      }

      visitedColors.push(color);
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

          .${className} .body .body-overlay {
            text-shadow:
              0px -1px 0px #333,
              0px 2px 3px ${color}CC,
              0px 4px 13px ${color}AA,
              0px 8px 23px ${color}AA;
          }
        </style>
      `);
    });
  },
};
