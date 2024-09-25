$(function () {
  const words = ['сочные', 'вкусные', 'ароматные', 'освежающие', 'и неповторимые', 'бургеры!'];
  let index = 0;

  function animateWords() {
    const $animatedText = $('.animated-text');

    $animatedText.removeClass('visible');

    setTimeout(() => {
      $animatedText.text(words[index]);
      $animatedText.addClass('visible'); 
    }, 500);

    index = (index + 1) % words.length;
  }

  setInterval(animateWords, 2000); 
  animateWords();

  $('.tab').on('click', function (e) {
    e.preventDefault();

    const $tabs = $(this).closest('.tabs');
    const index = $(this).parent().index();

    $tabs.find('.tab--active').removeClass('tab--active');
    $(this).addClass('tab--active');

    const $contents = $tabs.closest('.categories').find('.tabs-container .tabs-content');

    $contents.removeClass('tabs-content--active');

    $contents.eq(index).addClass('tabs-content--active');
  });

  $('.input-field').each(function () {
    var $input = $(this);
    var $numberElement = $input.find('.input-field__number');
    var min = Number($input.attr('min')) || 0;
    var max = Number($input.attr('max')) || Infinity;
    var step = Number($input.attr('step')) || 1;
    var value = Number($numberElement.text()) || min;

    function increase() {
      if (value + step <= max) {
        value += step;
        $numberElement.text(value);
      }
    }

    function decrease() {
      if (value - step >= min) {
        value -= step;
        $numberElement.text(value);
      }
    }

    $input.find('.input-field__button.plus').on('click', increase);
    $input.find('.input-field__button.minus').on('click', decrease);
  });

  $('.categories__elem-btn, .categories__elem-img, .categories__elem-title').on('click', function () {
    const $popup = $(this).closest('.categories__elem').find('.categories__popup');

    $popup.addClass('categories__popup--active');

    $('body').addClass('lock');
  });

  $(document).on('click', function (event) {
    if ($(event.target).hasClass('lock')) {
      $('.categories__popup').removeClass('categories__popup--active');
      $('body').removeClass('lock');
    }
  });
});