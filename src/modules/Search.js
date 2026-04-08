import $ from 'jquery';

class Search {
  constructor() {
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
    this.searchOverlay.addClass('search-overlay--active');
    $('body').addClass('body-no-scroll');
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
        this.typingTimer = setTimeout(this.getResult.bind(this), 2000);
      } else {
        this.resultsDiv.html('');
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.searchField.val();
  }

  getResult() {
    this.resultsDiv.html('Hello World');
    this.isSpinnerVisible = false;
  }

  keyPressDispatcher(e) {
    if (
      e.keyCode === 83 &&
      !this.isOverlayOpen &&
      !$('input, textarea').is(':focus')
    ) {
      this.openOverlay();
    }
    if (e.keyCode === 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }
}

export default Search;
