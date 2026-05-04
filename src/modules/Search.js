import $ from 'jquery';

class Search {
  constructor() {
    this.addSearchHTML();
    this.resultsDiv = $('#search-overlay__results');
    this.openButton = $('.js-search-trigger');
    this.closeButton = $('.search-overlay__close');
    this.searchOverlay = $('.search-overlay');
    this.searchField = $('#search-term');
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.typingTimer;
    this.previousValue;
    this.events();
  }

  events() {
    this.openButton.on('click', this.openOverlay.bind(this));
    this.closeButton.on('click', this.closeOverlay.bind(this));
    $(document).on('keydown', this.keyPressDispatcher.bind(this));
    this.searchField.on('keyup', this.typingLogic.bind(this));
  }

  openOverlay() {
    console.log('open');
    this.searchField.val('');
    this.searchOverlay.addClass('search-overlay--active');
    $('body').addClass('body-no-scroll');
    setTimeout(() => this.searchField.focus(), 301);
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    console.log('close');
    this.searchOverlay.removeClass('search-overlay--active');
    $('body').removeClass('body-no-scroll');
    this.isOverlayOpen = false;
  }

  typingLogic() {
    if (this.searchField.val() != this.previousValue) {
      clearTimeout(this.typingTimer);

      if (this.searchField.val()) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.html('<div class="spinner-loader"></div>');
          this.isSpinnerVisible = true;
          this.previousValue = this.searchField.val();
        }
        this.typingTimer = setTimeout(this.getResult.bind(this), 750);
      } else {
        this.resultsDiv.html('');
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.searchField.val();
  }
  // knowledgeData

  // https://developer.wordpress.org/rest-api/reference/posts/#list-posts
  getResult() {
    $.when(
      $.getJSON(knowledgeData.root_url + '/wp-json/wp/v2/posts?search=' + this.searchField.val()),
      $.getJSON(knowledgeData.root_url + '/wp-json/wp/v2/pages?search=' + this.searchField.val()),
    ).then(
      (posts, pages) => {
        var combinedResults = posts[0].concat(pages[0]);
        this.resultsDiv.html(`
        <h2 class="search-overlay__section-title">General Information</h2>
        ${combinedResults.length ? '<ul class="link-list min-list">' : '<p>No general information matches that search.</p>'}
          ${combinedResults.map((item) => `<li><a href="${item.link}">${item.title.rendered}</a></li>`).join('')}
        ${combinedResults.length ? '</ul>' : ''}
      `);
        this.isSpinnerVisible = false;
      },
      () => {
        this.resultsDiv.html('<p>Unexpected error; please try again.</p>');
      },
    );
  }

  keyPressDispatcher(e) {
    if (e.keyCode === 83 && !this.isOverlayOpen && !$('input, textarea').is(':focus')) {
      this.openOverlay();
    }
    if (e.keyCode === 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

  addSearchHTML() {
    $('body').append(`
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input autocomplete="off" type="text" class="search-term" placeholder="What you are looking for?" id="search-term">
            <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
          </div>
        </div>

        <!-- SEARCH RESULTS -->
        <div class="container">
          <div id="search-overlay__results"></div>
        </div>
      </div>
  `);
  }
}

export default Search;

// this.resultsDiv.html(`
//             <h2 class="search-overlay__section-title">General Information</h2>
//             ${
//               posts.length
//                 ? '<ul class="link-list min-list">'
//                 : '<p>No general information matches that search.</p>'
//             }
//             ${posts
//               .map(
//                 (post) =>
//                   `<li><a href="${post.link}">${post.title.rendered}</a></li>`,
//               )
//               .join('')}
//             ${posts.length ? '</ul>' : ''}

//         `);
