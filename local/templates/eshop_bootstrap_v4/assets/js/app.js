"use strict";



$(window).ready(function () {
  $('.banner-index__items').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true
  });
  $('.index-project-photo__items').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false
  });
  $('.index-brand__items').slick({
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    prevArrow: '<button type="button" class="index-brand-slider__btn index-brand-slider__left"><div class="icon-brand-slider-left"></div></button>',
    nextArrow: '<button type="button" class="index-brand-slider__btn index-brand-slider__right"><div class="icon-brand-slider-right"></div></button>'
  });
  $('.index-catalog-control__btn').on('click', function () {
    pageIndexCatalogOpenHideElement();
  });
  $(".validPhone").mask("+7-(999)-999-99-99");
  $(".data_shop").mask("99.99.99");
  $('.form-leaveRequest__close').on('click', function (e) {
    e.preventDefault();
    $('.form-leaveRequest').hide();
  });
  pageIndexCatalogHeightItem();
  toggleTitle();
  catalogDetailPhoto();
  $('.catalogDetail-tabs__item').on('click', function (e) {
    e.preventDefault();
    catalogDetailTabs($(this));
  });
  catalogDetailSlider();
  catalogDetailSlider2();
  $('.catalogDetailInfo-buy-count__btn').on('click', function () {
    catalogDetailCount($(this));
  });
  $('.catalogDetailInfo-prop-select__value').on('click', function () {
    catalogDetailPropSelect($(this));
  });
  $('.catalogDetailInfo-prop-select__item').on('click', function () {
    catalogDetailPropSelectItem($(this));
  });
  $('.sectionCatalogFilter-selected__value').on('click', function () {
    pageCatalogSectionsToggleSelectedFilter($(this));
  });
  
  /*
  $('.sectionCatalogFilter-selected__item').on('click', function () {
    pageCatalogSectionsGetSelectedFilter($(this));
  });
  */
  
  /*
  $('body').on('click','.sectionCatalogFilter-selected__item', function() {
//	  alert(22222);
    pageCatalogSectionsGetSelectedFilter($(this));
  });
  
  */
  
  /*
  $('.sectionCatalogFilter-selected__item').on('click', function () {
    pageCatalogSectionsGetSelectedFilter($(this));
  });  
  */
  
  
  $('.sectionCatalogList-items__item').hover(function () {
    $(this).find('.sectionCatalogList-items-prev').css('display', 'flex');
  }, function () {
    $(this).find('.sectionCatalogList-items-prev').hide();
  });
  
  /*
  $('.sectionCatalogList-items-count__btn').on('click', function () {
    pageCatalogSectionsCount($(this));
  });
  */
  /*
  $('.sectionCatalogList-items-count__btn').on('click', function () {
    pageCatalogSectionsCount($(this));
  });
  */
  
  
  $('body').on('click','.sectionCatalogList-items-count__btn', function() {
    pageCatalogSectionsCount($(this));
  });
  
  
  
  
  
  
  pageCatalogSectionsItemSLider();
  pageCartSystemSlider();
  $('.cartStep1-table-count__btn').on('click', function () {
    pageCartCount($(this));
  });
  $('.cartStep1-table-count__input-text').on('keyup', function () {
    pageCartCount($(this));
  });
  cartCountLoad();
  checkedDelivery();
  $('.formCommonCheck .formCommonCheck__checkbox-type').on('click', function () {
    checkedDelivery();
  });
  $('.formCommonDelivery .formCommonCheck__checkbox-type').on('click', function () {
    fontBoldCheck($(this));
  });
  setTimeout(function () {
    catalogSectionAhutoHeightProp();
  }, 100);
  $('.catalogDetailPhoto-big__popup.one').on('click', function () {
    $(this).toggleClass('active');
  });
  $('.activePD').on('click', function (e) {
    e.preventDefault();
    var $this = $(this);
    $this.toggleClass('active');
    $this.next().toggleClass('active');
  });
  comparisonTdHide();
  
  
  $('.favourites-items__item').hover(function (e) {
    $(this).find('.favourites-popup-slider__items').slick('setPosition', 0);
  });
  
  
  $('.favourites-popup-count__btn').on('click', function (e) {
    favouritesPlusMinus($(this));
  });
  $('.favourites-control__delete').on('click', function (e) {
    e.preventDefault();
    $('.popupDelete').show();
  });
  $('.popupDelete__close, .popupDelete__btn.white').on('click', function (e) {
    e.preventDefault();
    $('.popupDelete').hide();
  });
  $('.detailCatalogHeroPopup__close').on('click', function (e) {
    e.preventDefault();
    $('.detailCatalogHeroPopup').hide();
  });
  $('.historyPurchase-tab').on('click', function (e) {
    e.preventDefault();
    historyPurchaseToggleItems($(this));
  });
  favouritesHeightItems();
  $('.blogMenu__toggle').on('click', function (e) {
    e.preventDefault();
    pageBlogToggleSections($(this));
  });
  $('.pStock__toggle, .pStock__name').on('click', function (e) {
    e.preventDefault();
    pageStockToggleText($(this));
  });
  $('.openPopoupleaveRequest').on('click', function () {
    popupFormCommon($(this));
  });
  $('.formCommon__submit').on('click', function (e) {
    e.preventDefault();
    popupFormCommonCLose($(this));
  });
  $('.header-middle-control__cart, .scrollHeader-basket').hover(function (e) {
    e.preventDefault();
    toggleHeaderBasket($(this));
  });
  
  
  //Функция скрытия корзины
  $('.basket_header').hover(function (e) {}, function () {
	
	
	enableScrolling();
	
	
	
    $('.basket_header').removeClass('active');
  });
  
  
  headerTopScroll();
  $('body').on('click', function (e) {
    hideBlockHtmlClick($(e.target));
  });
  $('.popupAddBasket-complekt__more').on('click', function (e) {
    e.preventDefault();
    popupItemsAddBasketToggleComplekt($(this));
  });
  $('.popupAddBasket__close').on('click', function (e) {
    e.preventDefault();
    popupItemsAddBasketCLose();
  });
  $('.popupAddBasket__open').on('click', function (e) {
    e.preventDefault();
    popupItemsAddBasketOpen();
  });
  $('.popupAddBasket-item-count__btn').on('click', function () {
    popupAddBasketPlusMinus($(this));
  });
  pTrading_systemHeigtName();
  $('.loginForm-tab__link').on('click', function (e) {
    e.preventDefault();
    popupLoginTab($(this));
  });
  $('.loginForm_lk_lostPassword').on('click', function (e) {
    e.preventDefault();
    loginForm_lk_lostPassword();
  });
  $('.form-leaveRequest').on('click', function (e) {
    if (!$(e.target).closest('.form-leaveRequest__wrap').length) {
      $('.form-leaveRequest').hide();
    }
  });
  $('.formCommon__back').on('click', function (e) {
    e.preventDefault();
    loginForm_lk_back($(this));
  });
  $('.header-menu-sub-menu').jScrollPane();
  $('.header-menu__item, .scrollHeader-menu__item').hover(function () {
    hoverMenuHorizontal($(this));
  }, function () {
    $('.header-menu-sub').removeClass('active');
  });
  $('.header-menu-sub-menu__item').hover(function () {
    hoverMenuHorizontalOpenMenu($(this));
  });
  $('.header-menu-sub-menu-last').hover(function () {
    hoverMenuHorizontalOpenMenu2($(this));
  });
});





function disableScrolling(){
    var x=window.scrollX;
    var y=window.scrollY;
    window.onscroll=function(){window.scrollTo(x, y);};
}

function enableScrolling(){
    window.onscroll=function(){};
}








$(window).scroll(function () {
  scrollTopBottomStyle();
  comparisonTdHide();
  headerTopScroll();
}); // Открытие подразделов в горизонтальном меню

function hoverMenuHorizontal(el) {
  var subMenu = el.find('.header-menu-sub');
  subMenu.find('.header-menu-sub-menu').jScrollPane({
    contentWidth: '0px',
    autoReinitialise: true
  });
  el.addClass('active').siblings().find('.header-menu-sub').removeClass('active');
  subMenu.addClass('active');
} // Открытие подразделов в горизонтальном меню из открытого меню


function hoverMenuHorizontalOpenMenu(el) {
  var section = el.closest('.header-menu-sub'),
      index = el.index();
  $('.header-menu-sub-menu-last').removeClass('active');
  el.addClass('active').siblings().removeClass('active');
  section.find('.header-menu-sub-body').eq(index).addClass('active').siblings().removeClass('active');
} // Открытие подразделов в горизонтальном меню из открытого меню


function hoverMenuHorizontalOpenMenu2(el) {
  $('.header-menu-sub-menu__item').removeClass('active');
  el.addClass('active');
  $('.header-menu-sub-body.last').addClass('active').siblings().removeClass('active');
} // Popup Login Tab Кнопка вернуться назад


function loginForm_lk_back(el) {
  var step = el.attr('data-back');
  $('.formCommon__step[data-step=' + step + ']').show().siblings().hide();
} // Popup Login Tab переключение на вспонмнить пароль


function loginForm_lk_lostPassword() {
  var tab = $('.loginForm-tab'),
      tabs = $('.loginForm-tabs__item'),
      index = 2;
  tab.hide();
  tabs.eq(index).addClass('active').siblings().removeClass('active');
} // Popup Login Tab


function popupLoginTab(el) {
  var tab = el.closest('.loginForm-tab__item'),
      tabs = $('.loginForm-tabs__item'),
      index = tab.index();
  tab.addClass('active').siblings().removeClass('active');
  tabs.eq(index).addClass('active').siblings().removeClass('active');
} // pTrading_system одинаковая высота назвыаний в списке


function pTrading_systemHeigtName() {
  var items = $('.tradingSystemItems__name'),
      count = 0;
  items.each(function (i) {
    var $this = $(this);

    if ($this.height() > count) {
      count = $this.height();
    }

    if (items.length - 1 === i) {
      items.css('height', count + 'px');
    }
  });
} // Всплывашка при добавление в корзину плюс и минус


function popupAddBasketPlusMinus(el) {
  var block = el.closest('.popupAddBasket-item-count'),
      input = block.find('.popupAddBasket-item-count__input-text'),
      inputValue = parseInt(input.val()),
      type = el.attr('data-type');

  if (type === 'minus') {
    if (inputValue > 1) {
      input.val(parseInt(inputValue - 1));
    }
  } else {
    input.val(parseInt(inputValue + 1));
  }
} // скрыть блок при клике в не его


function hideBlockHtmlClick(el) {
  if (!el.closest('.sectionCatalogFilter-selected').length) {
    $('.sectionCatalogFilter-selected').removeClass('active');
  }
} // Шапка при прокрутке


function headerTopScroll() {
  if ($(document).scrollTop() > 200) {
	  
	  
    $('.scrollHeader').addClass('active');
    $('.header-top').addClass('scroll');

    if ($('.propductLine').length) {
      $('.propductLine').show();
    }
  } else {
    $('.scrollHeader').removeClass('active');
    $('.header-top').removeClass('scroll');

    if ($('.propductLine').length) {
      $('.propductLine').hide();
    }
  }
} // Открыть всплывающую корзину в шапке


var sss = 1;



function toggleHeaderBasket(el) {
  var body = $('body'),
      iconBasket = body.find('.header-middle-control__cart'),
      popup = body.find('.basket_header');

  if (el.hasClass('scrollHeader-basket')) {//popup.addClass('scroll');
  } else {// popup.removeClass('scroll');
    }

  iconBasket.addClass('click');
  
  //Добавленный скрипт изменение состояния корзины в зависимости от размера шапки
  if ($(document).scrollTop() > 200) {
    $(".cartinnerpv").css("margin-top","60px");
	
	 
  } else {
    $(".cartinnerpv").css("margin-top","110px");
  }
  
 
/*
 // Фиксация скрола при показа окна
var top = $(window).scrollTop();
var left = $(window).scrollLeft()

$(window).scroll(function(){
    // Force scroll back to original positions
		$(this).scrollTop(top).scrollLeft(left);
});

*/
disableScrolling();

  
  popup.addClass('active');
  $('.basket_header__wrap').jScrollPane();
} // popup товар добавлен в корзину - закрыть


function popupItemsAddBasketOpen() {
  var popup = $('.popupAddBasket');
  popup.show();
} // popup товар добавлен в корзину - закрыть


function popupItemsAddBasketCLose() {
  var popup = $('.popupAddBasket');
  popup.hide();
} // popup товар добавлен в корзину - toggle Соберите комплектацию


function popupItemsAddBasketToggleComplekt(el) {
  var wrap = $('.popupAddBasket-complekt__wrap'),
      textOpen = el.attr('data-open'),
      textClose = el.attr('data-close');
  wrap.toggleClass('active');
  var newWrap = $('body').find('.popupAddBasket-complekt__wrap');

  if (newWrap.hasClass('active')) {
    wrap.jScrollPane();
    el.text(textClose);
  } else {
    el.text(textOpen);
  }
}

function isValidEmailAddress(emailAddress) {
  var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
  return pattern.test(emailAddress);
} // Закрыть общую форму


function popupFormCommonCLose(el) {
  var form = el.closest('.form-leaveRequest'),
      ok = form.find('.form-leaveRequest__ok'),
      body = form.find('.form-leaveRequest__body'),
      formThis = el.closest('.formCommon'),
      thisStep = el.closest('.formCommon__step'),
      step = parseInt(el.attr('data-step')),
      arInputTextRequired = [],
      inputPassword = [],
      inputCheckBox = [],
      inputPText = [],
      stepInput = [],
      sectionCheckbox = '',
      checkedFinal = '',
      checkedRequired = '';

  if (thisStep.length > 0) {
    if (step === 1) {
      var stepOne = formThis.find(".formCommon__step[data-step='1']"),
          checked = stepOne.find('.formCommonCheck__checkbox-type:checked'),
          arNextStep = parseInt(checked.attr('data-next-step'));

      if (checked.length > 0) {
        formThis.find(".formCommon__step[data-step=" + step + "]").hide();
        formThis.find(".formCommon__step[data-step=" + arNextStep + "]").show();
      }
    } else {
      inputPassword = thisStep.find('input[type=password]'), inputPText = thisStep.find('input[type=text]'), inputCheckBox = thisStep.find('input[type=checkbox]'), stepInput = $.merge(inputPassword, inputPText), stepInput = $.merge(stepInput, inputCheckBox), checkedRequired = false, checked = [];
      checkedFinal = true;
      stepInput.each(function (i) {
        var $this = $(this),
            inputWrap = $this.closest('.formCommon__input'),
            inputCheckboxWrap = $this.closest('.formCommonCheck'),
            sectionCheckbox = $this.closest('.formCommon__section');

        if ($this.attr('type') === 'checkbox') {
          sectionCheckbox.find('.formCommon__input-msg').remove();

          if ($this.prop('required')) {
            checkedRequired = true;

            if ($this.is(':checked')) {
              checked.push(1);
            } else {
              sectionCheckbox.css({
                'border-top': '1px solid #8B0000'
              });
              sectionCheckbox.prepend('<div class="formCommon__input-msg">Это поле обязательно для заполнения</div>');
            }
          }
        }

        inputWrap.next().remove();

        if ($this.prop('required') && $this.val() === "") {
          if ($this.hasClass('email')) {
            if (isValidEmailAddress($this.val())) {
              inputWrap.css('border-bottom', '1px solid #616161');
            } else {
              inputWrap.css('border-bottom', '1px solid #8B0000');
              inputWrap.after('<div class="formCommon__input-msg">Это поле обязательно для заполнения</div>');
              arInputTextRequired.push($this);
            }
          } else {
            inputWrap.css('border-bottom', '1px solid #8B0000');
            inputWrap.after('<div class="formCommon__input-msg">Это поле обязательно для заполнения</div>');
            arInputTextRequired.push($this);
          }
        } else {
          if ($this.hasClass('email')) {
            if (isValidEmailAddress($this.val())) {
              inputWrap.css('border-bottom', '1px solid #616161');
            } else {
              inputWrap.css('border-bottom', '1px solid #8B0000');
              inputWrap.after('<div class="formCommon__input-msg">Введите действительный email</div>');
              arInputTextRequired.push($this);
            }
          }

          inputWrap.css('border-bottom', '1px solid #616161');
        }

        if (stepInput.length - 1 === i) {
          if (checkedRequired) {
            if (checked.length > 0) {
              checkedFinal = true;
              thisStep.find('.formCommon__input-msg').remove();
              thisStep.find('.formCommon__section').css('border-top', '0');
            } else {
              checkedFinal = false;
            }
          }

          if (arInputTextRequired.length === 0 && checkedFinal) {
            var stepNextBtn = el.attr('data-step-next');
            formThis.find(".formCommon__step[data-step=" + step + "]").hide();

            if (stepNextBtn === 'end') {
              body.hide();
              ok.show();
              formThis.find(".formCommon__step[data-step='1']").show();
            } else {
              formThis.find(".formCommon__step[data-step=" + parseInt(stepNextBtn) + "]").show();
            }
          }
        }
      });
    }
  } else {
    inputPassword = formThis.find('input[type=password]'), inputPText = formThis.find('input[type=text]'), inputCheckBox = formThis.find('input[type=checkbox]'), stepInput = $.merge(inputPassword, inputPText), stepInput = $.merge(stepInput, inputCheckBox);
    stepInput.each(function (i) {
      var $this = $(this),
          inputWrap = $this.closest('.formCommon__input');
      inputWrap.next().remove();

      if ($this.prop('required') && $this.val() === "") {
        if ($this.hasClass('email')) {
          if (isValidEmailAddress($this.val())) {
            inputWrap.css('border-bottom', '1px solid #616161');
          } else {
            inputWrap.css('border-bottom', '1px solid #8B0000');
            inputWrap.after('<div class="formCommon__input-msg">Это поле обязательно для заполнения</div>');
            arInputTextRequired.push($this);
          }
        } else {
          inputWrap.css('border-bottom', '1px solid #8B0000');
          inputWrap.after('<div class="formCommon__input-msg">Это поле обязательно для заполнения</div>');
          arInputTextRequired.push($this);
        }
      } else {
        if ($this.hasClass('email')) {
          if (isValidEmailAddress($this.val())) {
            inputWrap.css('border-bottom', '1px solid #616161');
          } else {
            inputWrap.css('border-bottom', '1px solid #8B0000');
            inputWrap.after('<div class="formCommon__input-msg">Введите действительный email</div>');
            arInputTextRequired.push($this);
          }
        }

        inputWrap.css('border-bottom', '1px solid #616161');
      }

      if (stepInput.length - 1 === i) {
        if (arInputTextRequired.length === 0) {
          if (el.hasClass('msg_n')) {
            form.hide();
          } else {
            body.hide();
            ok.find('.formCommon__ok-text p').html(el.attr("data-ok_msg"));
            ok.show();
          }
        }
      }
    });
  }
} // Всплывающая форма общая


function popupFormCommon(el) {
  var form = $(el.attr('data-id-form')),
      formWrap = el.closest('.formCommon'),
      ok = form.find('.form-leaveRequest__ok'),
      body = form.find('.form-leaveRequest__body'),
      input = formWrap.find('input[type=text]'),
      arRequired = [];

  if (input.length > 0) {
    input.each(function (i) {
      var $this = $(this);

      if ($this.prop('required') && $this.val() === "") {
        arRequired.push($this);
      }

      if (input.length - 1 === i) {
        if (arRequired.length === 0) {
          body.show();
          ok.hide();
          form.show();
        }
      }
    });
  } else {
    body.show();
    ok.hide();
    form.show();
  }
} // Раскрытия текста на странице Акции


function pageStockToggleText(el) {
  var block = el.closest('.pStock__item'),
      link = block.find('.pStock__toggle'),
      name = block.find('.pStock__name');
  name.toggleClass('active');
  link.toggleClass('active');

  if (link.hasClass('active')) {
    link.text(link.attr('data-hide'));
  } else {
    link.text(link.attr('data-show'));
  }
} // Раскрытие списка разделов на странице Блог


function pageBlogToggleSections(el) {
  var wrap = $('.blogMenu__wrap');
  el.toggleClass('active');
  wrap.toggleClass('active');

  if (!el.hasClass('active')) {
    el.text(el.attr('data-show'));
  } else {
    el.text(el.attr('data-hide'));
  }
} // высота элементов в списке избранное


function favouritesHeightItems() {
  var items = $('.favourites-items__item'),
      newitemsBlock = $('.favourites-items-list'),
      count = 0;
  items.each(function (i) {
    var $this = $(this),
        newBlock = $this.find('.favourites-items-list');

    if (newBlock.outerHeight() > count) {
      count = newBlock.outerHeight();
    }

    if (items.length - 1 === i) {
      newitemsBlock.css('height', count + 'px');
    }
  });
} // Скрыть раскрыть список на странице история покупок


function historyPurchaseToggleItems(el) {
  var section = el.closest('.historyPurchaseItem'),
      wrap = section.find('.historyPurchaseItem__wrap'),
      link = el.find('.historyPurchase-tab__toggle');
  wrap.toggle();
  el.find('.historyPurchase-tab__toggle').toggleClass('active');
  el.toggleClass('active');

  if (el.hasClass('active')) {
    link.text(link.attr('data-show'));
  } else {
    link.text(link.attr('data-hide'));
  }
} // Кол-во товара в избранном у товаров


function favouritesPlusMinus(el) {
  var block = el.closest('.favourites-popup-count'),
      input = block.find('.favourites-popup-count__input-text'),
      inputInt = parseInt(input.val()),
      type = el.attr('data-type'),
      count = 0;

  if (type === 'minus') {
    if (inputInt > 1) {
      input.val(inputInt - 1);
    }
  } else {
    input.val(inputInt + 1);
  }
} // выравниваем блоки товаров,ч тобы были одинаковой высоты catalog_sections.html


function catalogSectionsHeightBlock() {
  var body = $('body'),
      items = body.find('.sectionCatalogList-items__item'),
      count = 0;
  items.each(function (i) {
    var $this = $(this);

    if ($this.height() > count) {
      count = $this.outerHeight();
    }

    if (items.length - 1 === i) {
      items.css('height', count + 'px');
    }
  });
} // Плавующий блок заголовков для страницы сравнения


function comparisonTdHide() {
  if ($(window).scrollTop() > 382) {
    $('.comparison-table-th').css('display', 'table');
  } else {
    $('.comparison-table-th').hide();
  }
} // Высота новинки, на заказ и т.д. для списка в разделе товаров


function catalogSectionAhutoHeightProp() {
  var items = $('.catalogSectionPropHeight'),
      height = 0;
  items.each(function (i) {
    var $this = $(this),
        $thisHeight = $this.height();

    if ($thisHeight > height) {
      height = $thisHeight;
    }

    if (items.length - 1 === i) {
      items.css('height', height + 'px');
      setTimeout(function () {
        catalogSectionsHeightBlock();
      }, 300);
    }
  });
} // Если стоят галочки то текст должен быть жирным


function fontBoldCheck(el) {
  var body = $('body'),
      items = body.find('.formCommonCheck__checkbox-type');
  items.each(function (i) {
    var $this = $(this),
        sections = $this.closest('.formCommonDelivery');
    sections.removeClass('active');
    $this.prop('checked', '');

    if (items.length - 1 === i) {
      el.prop('checked', 'checked');
      el.closest('.formCommonDelivery').addClass('active');

      if (el.closest('.formCommonDelivery').attr('id') === 'Pickup') {
        el.closest('.formCommon').next().hide();
      } else {
        el.closest('.formCommon').next().show();
      }
    }
  });
} // Если стоят галочки то текст должен быть жирным, для подтверждения политики


function checkedDelivery() {
  var body = $('body'),
      items = body.find('.formCommonCheck');
  items.each(function (i) {
    var $this = $(this),
        inputCheckbox = $this.find('.formCommonCheck__checkbox-type'),
        text = $this.find('.formCommonCheck__text');

    if (inputCheckbox.prop('checked')) {
      text.addClass('active');
    } else {
      text.removeClass('active');
    }
  });
} // Процент от числа


function procentInt(summ, pr) {
  return summ - summ / 100 * pr;
} // Плюс - минус, высчитывание цены и скидки для корзины


function cartCountLoad() {
  var body = $('body'),
      countBlock = $('#cartCount'),
      countTotal = $('#countTotal'),
      totalPrice = $('#totalPrice'),
      count = 0,
      totalSumm = 0,
      pr = 30,
      items = body.find('.cartStep1-table-count__input-text');
  items.each(function (i) {
    var $this = $(this),
        section = $this.closest('.cartStep1-table__tr'),
        summ = parseInt(section.find('.cartStep1-table__total').attr('data-total')),
        sale = parseInt(section.find('.cartStep1-table__total-old').attr('data-sale')),
        inputCount = parseInt($this.val());
    count += inputCount;
    totalSumm += summ * inputCount;

    if (items.length - 1 === i) {
      countBlock.html(count);
      countTotal.html(count);
      totalPrice.html(priceSet(totalSumm));
    }
  });
} // Формат числа


var priceSet = function priceSet(data) {
  var price = Number.prototype.toFixed.call(parseFloat(data) || 0, 0),
      price_sep = price.replace(/(\D)/g, ","),
      price_sep = price_sep.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
  return price_sep + ' руб.';
}; // Пересчет цен в корзине при клике на плюс минус


function pageCartCountTotal(el, count, sale) {
  var rowBLock = el.closest('.cartStep1-table__tr'),
      totalBLock = rowBLock.find('.cartStep1-table__td.five .cartStep1-table__total'),
      saleBLock = rowBLock.find('.cartStep1-table__td.five .cartStep1-table__total-old'),
      saleSumm = parseInt(saleBLock.attr('data-total')),
      totalSumm = parseInt(totalBLock.attr('data-total'));

  if (sale) {
    saleBLock.text(priceSet(sale * count));
  }

  totalBLock.text(priceSet(totalSumm * count));
} // Плюс миниус в корзине


function pageCartCount(el) {
  var countRow = el.closest('.cartStep1-table__tr'),
      countBlock = el.closest('.cartStep1-table-count'),
      type = el.attr('data-type'),
      input = countBlock.find('.cartStep1-table-count__input-text'),
      sale = countRow.find('.cartStep1-table__total-old'),
      salePrice = parseInt(sale.attr('data-sale')),
      countInput = parseInt(input.val()),
      countNew;

  if (el.attr('type') === 'text') {
    if (countInput < 1) {
      pageCartCountTotal(el, 1, salePrice);
      cartCountLoad();
      el.val(1);
    } else {
      pageCartCountTotal(el, countInput, salePrice);
      cartCountLoad();
    }
  } else {
    if (type === 'minus') {
      if (countInput > 1) {
        countNew = parseInt(countInput - 1);
        input.val(countNew);
        pageCartCountTotal(el, countNew, salePrice);
        cartCountLoad();
      }
    } else {
      countNew = parseInt(countInput + 1);
      input.val(countNew);
      pageCartCountTotal(el, countNew, salePrice);
      cartCountLoad();
    }
  }
}

function pageCartSystemSlider() {
  $('.cart-systems-hero-photo-big').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.cart-systems-hero-photo-mini'
  });
  $('.cart-systems-hero-photo-mini').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.cart-systems-hero-photo-big',
    vertical: true,
    dots: false,
    arrows: true,
    focusOnSelect: true,
    prevArrow: '<button type="button" class="cart-systems-hero-photo-mini__btn cart-systems-hero-photo-mini__btn-left"><div class="lnr lnr-chevron-left"></div></button>',
    nextArrow: '<button type="button" class="cart-systems-hero-photo-mini__btn cart-systems-hero-photo-mini__btn-right"><div class="lnr lnr-chevron-right"></div></button>'
  });
}

function pageCatalogSectionsItemSLider() {
  $('.sectionCatalogList-items-prev-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    prevArrow: '<button type="button" class="sectionCatalogList-items-prev-slider__btn sectionCatalogList-items-prev-slider__btn-left"><div class="lnr lnr-chevron-left"></div></button>',
    nextArrow: '<button type="button" class="sectionCatalogList-items-prev-slider__btn sectionCatalogList-items-prev-slider__btn-right"><div class="lnr lnr-chevron-right"></div></button>'
  });
  $('.favourites-popup-slider__items').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    prevArrow: '<button type="button" class="favourites-popup-slider__btn favourites-popup-slider__btn-left"><div class="lnr lnr-chevron-left"></div></button>',
    nextArrow: '<button type="button" class="favourites-popup-slider__btn favourites-popup-slider__btn-right"><div class="lnr lnr-chevron-right"></div></button>'
  });
  $('.sectionCatalogList-items__item').on('mouseenter', function () {
    $(this).find(".sectionCatalogList-items-prev-slider").slick('refresh');
  });
}

function pageCatalogSectionsCount(el) {
  var section = el.closest('.sectionCatalogList-items__item'),
      block = el.closest('.sectionCatalogList-items-count'),
      input = block.find('.sectionCatalogList-items-count__input-text'),
      inputInner = section.find('.sectionCatalogList-items-count__input-text'),
      count = parseInt(input.val());

  if (el.hasClass('minus')) {
    if (count > 1) {
      input.val(count - 1);
      inputInner.val(count - 1);
    }
  } else {
    input.val(count + 1);
    inputInner.val(count + 1);
  }
}

function pageCatalogSectionsGetSelectedFilter(el) {
  var select = el.closest('.sectionCatalogFilter-selected'),
      value = select.find('.sectionCatalogFilter-selected__value'),
      text = el.find('.sectionCatalogFilter-selected__text');
  el.siblings().removeClass('active').end().addClass('active');
  value.text(text.text());
  select.removeClass('active');
}

function pageCatalogSectionsToggleSelectedFilter(el) {
  var select = el.closest('.sectionCatalogFilter-selected');
  select.toggleClass('active').siblings().removeClass('active');
}

function catalogDetailPropSelectItem(el) {
  var select = el.closest('.catalogDetailInfo-prop-select'),
      items = select.find('.catalogDetailInfo-prop-select__items'),
      title = select.find('.catalogDetailInfo-prop-select__value');
  el.siblings().removeClass('active').end().addClass('active');
  title.text(el.text());
  items.toggle();
}

function catalogDetailPropSelect(el) {
  var select = el.closest('.catalogDetailInfo-prop-select'),
      items = select.find('.catalogDetailInfo-prop-select__items');
  items.toggle();
}

function catalogDetailCount(el) {
  var section = el.closest('.catalogDetailInfo-buy-count'),
      input = section.find('.catalogDetailInfo-buy-count-input__text'),
      count = parseInt(input.val()),
      type = el.attr('data-type');

  if (type === 'minus') {
    if (count > 1) {
      input.val(count - 1);
    }
  } else {
    input.val(count + 1);
  }
}

function catalogDetailSlider2() {
  $('.catalogDetailProdukts-slider__items').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    prevArrow: '<button type="button" class="catalogDetailProdukts-slider__btn catalogDetailProdukts-slider__btn-left"><div class="lnr lnr-chevron-left"></div></button>',
    nextArrow: '<button type="button" class="catalogDetailProdukts-slider__btn catalogDetailProdukts-slider__btn-right"><div class="lnr lnr-chevron-right"></div></button>'
  });
  $('.catalogDetailProdukts-slider-mini').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    prevArrow: '<button type="button" class="catalogDetailProdukts-slider-mini__btn catalogDetailProdukts-slider-mini__btn-left"><div class="lnr lnr-chevron-left"></div></button>',
    nextArrow: '<button type="button" class="catalogDetailProdukts-slider-mini__btn catalogDetailProdukts-slider-mini__btn-right"><div class="lnr lnr-chevron-right"></div></button>'
  });
}

function catalogDetailSlider() {
  $('.catalogDetail-slider__items').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    prevArrow: '<button type="button" class="catalogDetail-slider__btn catalogDetail-slider__btn-left"><div class="lnr lnr-chevron-left"></div></button>',
    nextArrow: '<button type="button" class="catalogDetail-slider__btn catalogDetail-slider__btn-right"><div class="lnr lnr-chevron-right"></div></button>'
  });
}

function catalogDetailTabs(el) {
  var tab = $('.catalogDetail-tabs-tab__item');
  el.siblings().removeClass('active').end().addClass('active');
  tab.removeClass('active');
  tab.eq(el.index()).addClass('active');
}

function catalogDetailPhoto() {
  $('.catalogDetailPhoto-big__items').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.catalogDetailPhoto-mini__items'
  });
  $('.catalogDetailPhoto-mini__items').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.catalogDetailPhoto-big__items',
    vertical: true,
    dots: false,
    arrows: true,
    focusOnSelect: true,
    easing: 'none',
    prevArrow: '<button type="button" class="catalogDetailPhoto-mini__btn catalogDetailPhoto-mini__btn-left"><div class="lnr lnr-chevron-left"></div></button>',
    nextArrow: '<button type="button" class="catalogDetailPhoto-mini__btn catalogDetailPhoto-mini__btn-right"><div class="lnr lnr-chevron-right"></div></button>'
  });
  $('.fastSeeSliderBig').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.fastSeeSliderMini'
  });
  $('.fastSeeSliderMini').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.fastSeeSliderBig',
    vertical: true,
    dots: false,
    arrows: true,
    focusOnSelect: true,
    prevArrow: '<button type="button" class="catalogDetailPhoto-mini__btn catalogDetailPhoto-mini__btn-left"><div class="icon-detail-slider-mini-slider-arrow-top"></div></button>',
    nextArrow: '<button type="button" class="catalogDetailPhoto-mini__btn catalogDetailPhoto-mini__btn-right"><div class="icon-detail-slider-mini-slider-arrow-bottom"></div></button>'
  });
  $('.fastSeePlusMinus__btn').on('click', function () {
    plusMinusFastSee($(this));
  });
  $('.fastSeeTopNav__close').on('click', function (e) {
    e.preventDefault();
    $('.fastSee').hide();
  });
  $('.fastSeeShow').on('click', function (e) {
    e.preventDefault();
    var block = $('.detailCatalogHeroPopup');
    block.show();
    block.find('.catalogDetailPhoto-mini__items').slick('setPosition', 0);
    block.find('.catalogDetailPhoto-big__items').slick('setPosition', 0);
  });
} // Плюс минус в быстром просмотре


function plusMinusFastSee(el) {
  var section = el.closest('.fastSeePlusMinus'),
      input = section.find('.fastSeePlusMinus__input'),
      count = parseInt(input.val()),
      type = el.attr('data-type');

  if (type === 'minus') {
    if (count > 1) {
      input.attr('value', count - 1);
    }
  } else {
    input.attr('value', count + 1);
  }
}

function scrollTopBottomStyle() {
  if (document.getElementById("footer").getBoundingClientRect().top < 1000) {
    $('.scrollTop').addClass('active');
  } else {
    $('.scrollTop').removeClass('active');
  }
}

function toggleTitle() {
  $(".toggleTitle").hover(function () {
    $(this).addClass('active');
  }, function () {
    $(this).removeClass('active');
  });
}

function pageIndexCatalogHeightItem() {
  var items = $('.index-catalog__item'),
      heightMax = 0;
  items.each(function (i) {
    var $this = $(this);

    if (heightMax < $this.outerHeight()) {
      heightMax = $this.height();
    }

    if (items.length - 1 === i) {
      items.css('height', heightMax + 'px');
    }
  });
}

function pageIndexCatalogOpenHideElement() {
  var catalog = $('.index-catalog__items');

  if (catalog.hasClass('active')) {
    $('.index-catalog__items').removeClass('active');
    $('.index-catalog-control__btn').text('Еще категории');
  } else {
    $('.index-catalog__items').addClass('active');
    $('.index-catalog-control__btn').text('Свернуть');
  }
}
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyJdLCJuYW1lcyI6WyIkIiwid2luZG93IiwicmVhZHkiLCJzbGljayIsInNsaWRlc1RvU2hvdyIsInNsaWRlc1RvU2Nyb2xsIiwiYXJyb3dzIiwiZG90cyIsImluZmluaXRlIiwicHJldkFycm93IiwibmV4dEFycm93Iiwib24iLCJwYWdlSW5kZXhDYXRhbG9nT3BlbkhpZGVFbGVtZW50IiwibWFzayIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImhpZGUiLCJwYWdlSW5kZXhDYXRhbG9nSGVpZ2h0SXRlbSIsInRvZ2dsZVRpdGxlIiwiY2F0YWxvZ0RldGFpbFBob3RvIiwiY2F0YWxvZ0RldGFpbFRhYnMiLCJjYXRhbG9nRGV0YWlsU2xpZGVyIiwiY2F0YWxvZ0RldGFpbFNsaWRlcjIiLCJjYXRhbG9nRGV0YWlsQ291bnQiLCJjYXRhbG9nRGV0YWlsUHJvcFNlbGVjdCIsImNhdGFsb2dEZXRhaWxQcm9wU2VsZWN0SXRlbSIsInBhZ2VDYXRhbG9nU2VjdGlvbnNUb2dnbGVTZWxlY3RlZEZpbHRlciIsInBhZ2VDYXRhbG9nU2VjdGlvbnNHZXRTZWxlY3RlZEZpbHRlciIsImhvdmVyIiwiZmluZCIsImNzcyIsInBhZ2VDYXRhbG9nU2VjdGlvbnNDb3VudCIsInBhZ2VDYXRhbG9nU2VjdGlvbnNJdGVtU0xpZGVyIiwicGFnZUNhcnRTeXN0ZW1TbGlkZXIiLCJwYWdlQ2FydENvdW50IiwiY2FydENvdW50TG9hZCIsImNoZWNrZWREZWxpdmVyeSIsImZvbnRCb2xkQ2hlY2siLCJzZXRUaW1lb3V0IiwiY2F0YWxvZ1NlY3Rpb25BaHV0b0hlaWdodFByb3AiLCJ0b2dnbGVDbGFzcyIsIiR0aGlzIiwibmV4dCIsImNvbXBhcmlzb25UZEhpZGUiLCJmYXZvdXJpdGVzUGx1c01pbnVzIiwic2hvdyIsImhpc3RvcnlQdXJjaGFzZVRvZ2dsZUl0ZW1zIiwiZmF2b3VyaXRlc0hlaWdodEl0ZW1zIiwicGFnZUJsb2dUb2dnbGVTZWN0aW9ucyIsInBhZ2VTdG9ja1RvZ2dsZVRleHQiLCJwb3B1cEZvcm1Db21tb24iLCJwb3B1cEZvcm1Db21tb25DTG9zZSIsInRvZ2dsZUhlYWRlckJhc2tldCIsInJlbW92ZUNsYXNzIiwiaGVhZGVyVG9wU2Nyb2xsIiwiaGlkZUJsb2NrSHRtbENsaWNrIiwidGFyZ2V0IiwicG9wdXBJdGVtc0FkZEJhc2tldFRvZ2dsZUNvbXBsZWt0IiwicG9wdXBJdGVtc0FkZEJhc2tldENMb3NlIiwicG9wdXBJdGVtc0FkZEJhc2tldE9wZW4iLCJwb3B1cEFkZEJhc2tldFBsdXNNaW51cyIsInBUcmFkaW5nX3N5c3RlbUhlaWd0TmFtZSIsInBvcHVwTG9naW5UYWIiLCJsb2dpbkZvcm1fbGtfbG9zdFBhc3N3b3JkIiwiY2xvc2VzdCIsImxlbmd0aCIsImxvZ2luRm9ybV9sa19iYWNrIiwialNjcm9sbFBhbmUiLCJob3Zlck1lbnVIb3Jpem9udGFsIiwiaG92ZXJNZW51SG9yaXpvbnRhbE9wZW5NZW51IiwiaG92ZXJNZW51SG9yaXpvbnRhbE9wZW5NZW51MiIsInNjcm9sbCIsInNjcm9sbFRvcEJvdHRvbVN0eWxlIiwiZWwiLCJzdWJNZW51IiwiY29udGVudFdpZHRoIiwiYXV0b1JlaW5pdGlhbGlzZSIsImFkZENsYXNzIiwic2libGluZ3MiLCJzZWN0aW9uIiwiaW5kZXgiLCJlcSIsInN0ZXAiLCJhdHRyIiwidGFiIiwidGFicyIsIml0ZW1zIiwiY291bnQiLCJlYWNoIiwiaSIsImhlaWdodCIsImJsb2NrIiwiaW5wdXQiLCJpbnB1dFZhbHVlIiwicGFyc2VJbnQiLCJ2YWwiLCJ0eXBlIiwiZG9jdW1lbnQiLCJzY3JvbGxUb3AiLCJib2R5IiwiaWNvbkJhc2tldCIsInBvcHVwIiwiaGFzQ2xhc3MiLCJ3cmFwIiwidGV4dE9wZW4iLCJ0ZXh0Q2xvc2UiLCJuZXdXcmFwIiwidGV4dCIsImlzVmFsaWRFbWFpbEFkZHJlc3MiLCJlbWFpbEFkZHJlc3MiLCJwYXR0ZXJuIiwiUmVnRXhwIiwidGVzdCIsImZvcm0iLCJvayIsImZvcm1UaGlzIiwidGhpc1N0ZXAiLCJhcklucHV0VGV4dFJlcXVpcmVkIiwiaW5wdXRQYXNzd29yZCIsImlucHV0Q2hlY2tCb3giLCJpbnB1dFBUZXh0Iiwic3RlcElucHV0Iiwic2VjdGlvbkNoZWNrYm94IiwiY2hlY2tlZEZpbmFsIiwiY2hlY2tlZFJlcXVpcmVkIiwic3RlcE9uZSIsImNoZWNrZWQiLCJhck5leHRTdGVwIiwibWVyZ2UiLCJpbnB1dFdyYXAiLCJpbnB1dENoZWNrYm94V3JhcCIsInJlbW92ZSIsInByb3AiLCJpcyIsInB1c2giLCJwcmVwZW5kIiwiYWZ0ZXIiLCJzdGVwTmV4dEJ0biIsImh0bWwiLCJmb3JtV3JhcCIsImFyUmVxdWlyZWQiLCJsaW5rIiwibmFtZSIsIm5ld2l0ZW1zQmxvY2siLCJuZXdCbG9jayIsIm91dGVySGVpZ2h0IiwidG9nZ2xlIiwiaW5wdXRJbnQiLCJjYXRhbG9nU2VjdGlvbnNIZWlnaHRCbG9jayIsIiR0aGlzSGVpZ2h0Iiwic2VjdGlvbnMiLCJpbnB1dENoZWNrYm94IiwicHJvY2VudEludCIsInN1bW0iLCJwciIsImNvdW50QmxvY2siLCJjb3VudFRvdGFsIiwidG90YWxQcmljZSIsInRvdGFsU3VtbSIsInNhbGUiLCJpbnB1dENvdW50IiwicHJpY2VTZXQiLCJkYXRhIiwicHJpY2UiLCJOdW1iZXIiLCJwcm90b3R5cGUiLCJ0b0ZpeGVkIiwiY2FsbCIsInBhcnNlRmxvYXQiLCJwcmljZV9zZXAiLCJyZXBsYWNlIiwicGFnZUNhcnRDb3VudFRvdGFsIiwicm93QkxvY2siLCJ0b3RhbEJMb2NrIiwic2FsZUJMb2NrIiwic2FsZVN1bW0iLCJjb3VudFJvdyIsInNhbGVQcmljZSIsImNvdW50SW5wdXQiLCJjb3VudE5ldyIsImZhZGUiLCJhc05hdkZvciIsInZlcnRpY2FsIiwiZm9jdXNPblNlbGVjdCIsImlucHV0SW5uZXIiLCJzZWxlY3QiLCJ2YWx1ZSIsImVuZCIsInRpdGxlIiwiZWFzaW5nIiwicGx1c01pbnVzRmFzdFNlZSIsImdldEVsZW1lbnRCeUlkIiwiZ2V0Qm91bmRpbmdDbGll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SDNHLElBQUFBLENBQUMsQ0FBQyx1QkFBRCxDQUFELENBQTJCNkUsUUFBM0IsQ0FBb0MsUUFBcEM7QUFDQTdFLElBQUFBLENBQUMsQ0FBQyw2QkFBRCxDQUFELENBQWlDMkcsSUFBakMsQ0FBc0MsVUFBdEM7QUFDSDtBQUNKIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQod2luZG93KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgJCgnLmJhbm5lci1pbmRleF9faXRlbXMnKS5zbGljayh7XG4gICAgICAgIHNsaWRlc1RvU2hvdzogMSxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDEsXG4gICAgICAgIGFycm93czogdHJ1ZSxcbiAgICAgICAgZG90czogdHJ1ZVxuICAgIH0pO1xuICAgICQoJy5pbmRleC1wcm9qZWN0LXBob3RvX19pdGVtcycpLnNsaWNrKHtcbiAgICAgICAgc2xpZGVzVG9TaG93OiAxLFxuICAgICAgICBzbGlkZXNUb1Njcm9sbDogMSxcbiAgICAgICAgYXJyb3dzOiB0cnVlLFxuICAgICAgICBkb3RzOiBmYWxzZVxuICAgIH0pO1xuICAgICQoJy5pbmRleC1icmFuZF9faXRlbXMnKS5zbGljayh7XG4gICAgICAgIGluZmluaXRlOiB0cnVlLFxuICAgICAgICBzbGlkZXNUb1Nob3c6IDcsXG4gICAgICAgIHNsaWRlc1RvU2Nyb2xsOiAxLFxuICAgICAgICBhcnJvd3M6IHRydWUsXG4gICAgICAgIGRvdHM6IGZhbHNlLFxuICAgICAgICBwcmV2QXJyb3c6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImluZGV4LWJyYW5kLXNsaWRlcl9fYnRuIGluZGV4LWJyYW5kLXNsaWRlcl9fbGVmdFwiPjxkaXYgY2xhc3M9XCJpY29uLWJyYW5kLXNsaWRlci1sZWZ0XCI+PC9kaXY+PC9idXR0b24+JyxcbiAgICAgICAgbmV4dEFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJpbmRleC1icmFuZC1zbGlkZXJfX2J0biBpbmRleC1icmFuZC1zbGlkZXJfX3JpZ2h0XCI+PGRpdiBjbGFzcz1cImljb24tYnJhbmQtc2xpZGVyLXJpZ2h0XCI+PC9kaXY+PC9idXR0b24+JyxcbiAgICB9KTtcbiAgICAkKCcuaW5kZXgtY2F0YWxvZy1jb250cm9sX19idG4nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHBhZ2VJbmRleENhdGFsb2dPcGVuSGlkZUVsZW1lbnQoKTtcbiAgICB9KTtcbiAgICAkKFwiLnZhbGlkUGhvbmVcIikubWFzayhcIis3LSg5OTkpLTk5OS05OS05OVwiKTtcbiAgICAkKFwiLmRhdGFfc2hvcFwiKS5tYXNrKFwiOTkuOTkuOTlcIik7XG4gICAgJCgnLmZvcm0tbGVhdmVSZXF1ZXN0X19jbG9zZScpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgJCgnLmZvcm0tbGVhdmVSZXF1ZXN0JykuaGlkZSgpO1xuICAgIH0pO1xuICAgIHBhZ2VJbmRleENhdGFsb2dIZWlnaHRJdGVtKCk7XG4gICAgdG9nZ2xlVGl0bGUoKTtcbiAgICBjYXRhbG9nRGV0YWlsUGhvdG8oKTtcblxuICAgICQoJy5jYXRhbG9nRGV0YWlsLXRhYnNfX2l0ZW0nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIGNhdGFsb2dEZXRhaWxUYWJzKCQodGhpcykpO1xuICAgIH0pO1xuXG4gICAgY2F0YWxvZ0RldGFpbFNsaWRlcigpO1xuICAgIGNhdGFsb2dEZXRhaWxTbGlkZXIyKCk7XG5cbiAgICAkKCcuY2F0YWxvZ0RldGFpbEluZm8tYnV5LWNvdW50X19idG4nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNhdGFsb2dEZXRhaWxDb3VudCgkKHRoaXMpKTtcbiAgICB9KTtcblxuICAgICQoJy5jYXRhbG9nRGV0YWlsSW5mby1wcm9wLXNlbGVjdF9fdmFsdWUnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNhdGFsb2dEZXRhaWxQcm9wU2VsZWN0KCQodGhpcykpO1xuICAgIH0pO1xuXG4gICAgJCgnLmNhdGFsb2dEZXRhaWxJbmZvLXByb3Atc2VsZWN0X19pdGVtJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICAgICAgICBjYXRhbG9nRGV0YWlsUHJvcFNlbGVjdEl0ZW0oJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcuc2VjdGlvbkNhdGFsb2dGaWx0ZXItc2VsZWN0ZWRfX3ZhbHVlJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICAgICAgICBwYWdlQ2F0YWxvZ1NlY3Rpb25zVG9nZ2xlU2VsZWN0ZWRGaWx0ZXIoJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcuc2VjdGlvbkNhdGFsb2dGaWx0ZXItc2VsZWN0ZWRfX2l0ZW0nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHBhZ2VDYXRhbG9nU2VjdGlvbnNHZXRTZWxlY3RlZEZpbHRlcigkKHRoaXMpKTtcbiAgICB9KTtcblxuICAgICQoJy5zZWN0aW9uQ2F0YWxvZ0xpc3QtaXRlbXNfX2l0ZW0nKS5ob3ZlcihmdW5jdGlvbiAoKSB7XG4gICAgICAgICQodGhpcykuZmluZCgnLnNlY3Rpb25DYXRhbG9nTGlzdC1pdGVtcy1wcmV2JykuY3NzKCdkaXNwbGF5JywgJ2ZsZXgnKTtcbiAgICB9LCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICQodGhpcykuZmluZCgnLnNlY3Rpb25DYXRhbG9nTGlzdC1pdGVtcy1wcmV2JykuaGlkZSgpO1xuICAgIH0pO1xuXG4gICAgJCgnLnNlY3Rpb25DYXRhbG9nTGlzdC1pdGVtcy1jb3VudF9fYnRuJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICAgICAgICBwYWdlQ2F0YWxvZ1NlY3Rpb25zQ291bnQoJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICBwYWdlQ2F0YWxvZ1NlY3Rpb25zSXRlbVNMaWRlcigpO1xuICAgIHBhZ2VDYXJ0U3lzdGVtU2xpZGVyKCk7XG5cbiAgICAkKCcuY2FydFN0ZXAxLXRhYmxlLWNvdW50X19idG4nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHBhZ2VDYXJ0Q291bnQoJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcuY2FydFN0ZXAxLXRhYmxlLWNvdW50X19pbnB1dC10ZXh0Jykub24oJ2tleXVwJywgZnVuY3Rpb24gKCkge1xuICAgICAgICBwYWdlQ2FydENvdW50KCQodGhpcykpO1xuICAgIH0pO1xuXG4gICAgY2FydENvdW50TG9hZCgpO1xuICAgIGNoZWNrZWREZWxpdmVyeSgpO1xuICAgICQoJy5mb3JtQ29tbW9uQ2hlY2sgLmZvcm1Db21tb25DaGVja19fY2hlY2tib3gtdHlwZScpLm9uKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgY2hlY2tlZERlbGl2ZXJ5KCk7XG4gICAgfSk7XG4gICAgJCgnLmZvcm1Db21tb25EZWxpdmVyeSAuZm9ybUNvbW1vbkNoZWNrX19jaGVja2JveC10eXBlJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICAgICAgICBmb250Qm9sZENoZWNrKCQodGhpcykpO1xuICAgIH0pO1xuXG4gICAgc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNhdGFsb2dTZWN0aW9uQWh1dG9IZWlnaHRQcm9wKCk7XG4gICAgfSwgMTAwKTtcblxuICAgICQoJy5jYXRhbG9nRGV0YWlsUGhvdG8tYmlnX19wb3B1cC5vbmUnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICQodGhpcykudG9nZ2xlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH0pO1xuXG4gICAgJCgnLmFjdGl2ZVBEJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICB2YXJcbiAgICAgICAgICAgICR0aGlzID0gJCh0aGlzKTtcblxuICAgICAgICAkdGhpcy50b2dnbGVDbGFzcygnYWN0aXZlJyk7XG4gICAgICAgICR0aGlzLm5leHQoKS50b2dnbGVDbGFzcygnYWN0aXZlJyk7XG4gICAgfSk7XG5cbiAgICBjb21wYXJpc29uVGRIaWRlKCk7XG5cbiAgICAkKCcuZmF2b3VyaXRlcy1pdGVtc19faXRlbScpLmhvdmVyKGZ1bmN0aW9uIChlKSB7XG4gICAgICAgICQodGhpcykuZmluZCgnLmZhdm91cml0ZXMtcG9wdXAtc2xpZGVyX19pdGVtcycpLnNsaWNrKCdzZXRQb3NpdGlvbicsIDApO1xuICAgIH0pO1xuXG4gICAgJCgnLmZhdm91cml0ZXMtcG9wdXAtY291bnRfX2J0bicpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGZhdm91cml0ZXNQbHVzTWludXMoJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcuZmF2b3VyaXRlcy1jb250cm9sX19kZWxldGUnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICQoJy5wb3B1cERlbGV0ZScpLnNob3coKTtcbiAgICB9KTtcblxuICAgICQoJy5wb3B1cERlbGV0ZV9fY2xvc2UsIC5wb3B1cERlbGV0ZV9fYnRuLndoaXRlJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAkKCcucG9wdXBEZWxldGUnKS5oaWRlKCk7XG4gICAgfSk7XG5cbiAgICAkKCcuZGV0YWlsQ2F0YWxvZ0hlcm9Qb3B1cF9fY2xvc2UnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICQoJy5kZXRhaWxDYXRhbG9nSGVyb1BvcHVwJykuaGlkZSgpO1xuICAgIH0pO1xuXG4gICAgJCgnLmhpc3RvcnlQdXJjaGFzZS10YWInKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgIGhpc3RvcnlQdXJjaGFzZVRvZ2dsZUl0ZW1zKCQodGhpcykpO1xuICAgIH0pO1xuXG4gICAgZmF2b3VyaXRlc0hlaWdodEl0ZW1zKCk7XG5cbiAgICAkKCcuYmxvZ01lbnVfX3RvZ2dsZScpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgcGFnZUJsb2dUb2dnbGVTZWN0aW9ucygkKHRoaXMpKTtcbiAgICB9KTtcblxuICAgICQoJy5wU3RvY2tfX3RvZ2dsZSwgLnBTdG9ja19fbmFtZScpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgcGFnZVN0b2NrVG9nZ2xlVGV4dCgkKHRoaXMpKTtcbiAgICB9KTtcblxuICAgICQoJy5vcGVuUG9wb3VwbGVhdmVSZXF1ZXN0Jykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICAgICAgICBwb3B1cEZvcm1Db21tb24oJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcuZm9ybUNvbW1vbl9fc3VibWl0Jykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICBwb3B1cEZvcm1Db21tb25DTG9zZSgkKHRoaXMpKTtcbiAgICB9KTtcblxuICAgICQoJy5oZWFkZXItbWlkZGxlLWNvbnRyb2xfX2NhcnQsIC5zY3JvbGxIZWFkZXItYmFza2V0JykuaG92ZXIoZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICB0b2dnbGVIZWFkZXJCYXNrZXQoJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcuYmFza2V0X2hlYWRlcicpLmhvdmVyKGZ1bmN0aW9uIChlKSB7XG4gICAgfSwgZnVuY3Rpb24gKCkge1xuICAgICAgICAkKCcuYmFza2V0X2hlYWRlcicpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbiAgICB9KTtcbiAgICBoZWFkZXJUb3BTY3JvbGwoKTtcblxuICAgICQoJ2JvZHknKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICBoaWRlQmxvY2tIdG1sQ2xpY2soJChlLnRhcmdldCkpO1xuICAgIH0pO1xuXG4gICAgJCgnLnBvcHVwQWRkQmFza2V0LWNvbXBsZWt0X19tb3JlJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICBwb3B1cEl0ZW1zQWRkQmFza2V0VG9nZ2xlQ29tcGxla3QoJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcucG9wdXBBZGRCYXNrZXRfX2Nsb3NlJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICBwb3B1cEl0ZW1zQWRkQmFza2V0Q0xvc2UoKTtcbiAgICB9KTtcblxuICAgICQoJy5wb3B1cEFkZEJhc2tldF9fb3BlbicpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgcG9wdXBJdGVtc0FkZEJhc2tldE9wZW4oKTtcbiAgICB9KTtcblxuICAgICQoJy5wb3B1cEFkZEJhc2tldC1pdGVtLWNvdW50X19idG4nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHBvcHVwQWRkQmFza2V0UGx1c01pbnVzKCQodGhpcykpO1xuICAgIH0pO1xuXG4gICAgcFRyYWRpbmdfc3lzdGVtSGVpZ3ROYW1lKCk7XG5cbiAgICAkKCcubG9naW5Gb3JtLXRhYl9fbGluaycpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgcG9wdXBMb2dpblRhYigkKHRoaXMpKTtcbiAgICB9KTtcblxuICAgICQoJy5sb2dpbkZvcm1fbGtfbG9zdFBhc3N3b3JkJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICBsb2dpbkZvcm1fbGtfbG9zdFBhc3N3b3JkKCk7XG4gICAgfSk7XG5cbiAgICAkKCcuZm9ybS1sZWF2ZVJlcXVlc3QnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICBpZiAoISQoZS50YXJnZXQpLmNsb3Nlc3QoJy5mb3JtLWxlYXZlUmVxdWVzdF9fd3JhcCcpLmxlbmd0aCkge1xuICAgICAgICAgICAgJCgnLmZvcm0tbGVhdmVSZXF1ZXN0JykuaGlkZSgpO1xuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICAkKCcuZm9ybUNvbW1vbl9fYmFjaycpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgbG9naW5Gb3JtX2xrX2JhY2soJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcuaGVhZGVyLW1lbnUtc3ViLW1lbnUnKS5qU2Nyb2xsUGFuZSgpO1xuXG4gICAgJCgnLmhlYWRlci1tZW51X19pdGVtLCAuc2Nyb2xsSGVhZGVyLW1lbnVfX2l0ZW0nKS5ob3ZlcihmdW5jdGlvbiAoKSB7XG4gICAgICAgIGhvdmVyTWVudUhvcml6b250YWwoJCh0aGlzKSk7XG4gICAgfSwgZnVuY3Rpb24gKCkge1xuICAgICAgICAkKCcuaGVhZGVyLW1lbnUtc3ViJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH0pO1xuXG4gICAgJCgnLmhlYWRlci1tZW51LXN1Yi1tZW51X19pdGVtJykuaG92ZXIoZnVuY3Rpb24gKCkge1xuICAgICAgICBob3Zlck1lbnVIb3Jpem9udGFsT3Blbk1lbnUoJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcuaGVhZGVyLW1lbnUtc3ViLW1lbnUtbGFzdCcpLmhvdmVyKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgaG92ZXJNZW51SG9yaXpvbnRhbE9wZW5NZW51MigkKHRoaXMpKTtcbiAgICB9KTtcbn0pO1xuXG4kKHdpbmRvdykuc2Nyb2xsKGZ1bmN0aW9uKCkge1xuICAgIHNjcm9sbFRvcEJvdHRvbVN0eWxlKCk7XG4gICAgY29tcGFyaXNvblRkSGlkZSgpO1xuICAgIGhlYWRlclRvcFNjcm9sbCgpO1xufSk7XG5cbi8vINCe0YLQutGA0YvRgtC40LUg0L/QvtC00YDQsNC30LTQtdC70L7QsiDQsiDQs9C+0YDQuNC30L7QvdGC0LDQu9GM0L3QvtC8INC80LXQvdGOXG5mdW5jdGlvbiBob3Zlck1lbnVIb3Jpem9udGFsKGVsKSB7XG4gICAgdmFyXG4gICAgICAgIHN1Yk1lbnUgPSBlbC5maW5kKCcuaGVhZGVyLW1lbnUtc3ViJyk7XG5cbiAgICBzdWJNZW51LmZpbmQoJy5oZWFkZXItbWVudS1zdWItbWVudScpLmpTY3JvbGxQYW5lKHtcbiAgICAgICAgY29udGVudFdpZHRoOiAnMHB4JyxcbiAgICAgICAgYXV0b1JlaW5pdGlhbGlzZTogdHJ1ZVxuICAgIH0pO1xuXG4gICAgZWwuYWRkQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkuZmluZCgnLmhlYWRlci1tZW51LXN1YicpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbiAgICBzdWJNZW51LmFkZENsYXNzKCdhY3RpdmUnKTtcbn1cblxuLy8g0J7RgtC60YDRi9GC0LjQtSDQv9C+0LTRgNCw0LfQtNC10LvQvtCyINCyINCz0L7RgNC40LfQvtC90YLQsNC70YzQvdC+0Lwg0LzQtdC90Y4g0LjQtyDQvtGC0LrRgNGL0YLQvtCz0L4g0LzQtdC90Y5cbmZ1bmN0aW9uIGhvdmVyTWVudUhvcml6b250YWxPcGVuTWVudShlbCkge1xuICAgIHZhclxuICAgICAgICBzZWN0aW9uID0gZWwuY2xvc2VzdCgnLmhlYWRlci1tZW51LXN1YicpLFxuICAgICAgICBpbmRleCA9IGVsLmluZGV4KCk7XG5cbiAgICAkKCcuaGVhZGVyLW1lbnUtc3ViLW1lbnUtbGFzdCcpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcblxuICAgIGVsLmFkZENsYXNzKCdhY3RpdmUnKS5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbiAgICBzZWN0aW9uLmZpbmQoJy5oZWFkZXItbWVudS1zdWItYm9keScpLmVxKGluZGV4KS5hZGRDbGFzcygnYWN0aXZlJykuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG59XG5cbi8vINCe0YLQutGA0YvRgtC40LUg0L/QvtC00YDQsNC30LTQtdC70L7QsiDQsiDQs9C+0YDQuNC30L7QvdGC0LDQu9GM0L3QvtC8INC80LXQvdGOINC40Lcg0L7RgtC60YDRi9GC0L7Qs9C+INC80LXQvdGOXG5mdW5jdGlvbiBob3Zlck1lbnVIb3Jpem9udGFsT3Blbk1lbnUyKGVsKSB7XG4gICAgJCgnLmhlYWRlci1tZW51LXN1Yi1tZW51X19pdGVtJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIGVsLmFkZENsYXNzKCdhY3RpdmUnKTtcblxuICAgICQoJy5oZWFkZXItbWVudS1zdWItYm9keS5sYXN0JykuYWRkQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xufVxuXG4vLyBQb3B1cCBMb2dpbiBUYWIg0JrQvdC+0L/QutCwINCy0LXRgNC90YPRgtGM0YHRjyDQvdCw0LfQsNC0XG5mdW5jdGlvbiBsb2dpbkZvcm1fbGtfYmFjayhlbCkge1xuICAgIHZhclxuICAgICAgICBzdGVwID0gZWwuYXR0cignZGF0YS1iYWNrJyk7XG4gICAgXG4gICAgJCgnLmZvcm1Db21tb25fX3N0ZXBbZGF0YS1zdGVwPScgKyBzdGVwICsgJ10nKS5zaG93KCkuc2libGluZ3MoKS5oaWRlKCk7XG59XG5cbi8vIFBvcHVwIExvZ2luIFRhYiDQv9C10YDQtdC60LvRjtGH0LXQvdC40LUg0L3QsCDQstGB0L/QvtC90LzQvdC40YLRjCDQv9Cw0YDQvtC70YxcbmZ1bmN0aW9uIGxvZ2luRm9ybV9sa19sb3N0UGFzc3dvcmQoKSB7XG4gICAgdmFyXG4gICAgICAgIHRhYiA9ICQoJy5sb2dpbkZvcm0tdGFiJyksXG4gICAgICAgIHRhYnMgPSAkKCcubG9naW5Gb3JtLXRhYnNfX2l0ZW0nKSxcbiAgICAgICAgaW5kZXggPSAyO1xuXG4gICAgdGFiLmhpZGUoKTtcbiAgICB0YWJzLmVxKGluZGV4KS5hZGRDbGFzcygnYWN0aXZlJykuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG59XG5cbi8vIFBvcHVwIExvZ2luIFRhYlxuZnVuY3Rpb24gcG9wdXBMb2dpblRhYihlbCkge1xuICAgIHZhclxuICAgICAgICB0YWIgPSBlbC5jbG9zZXN0KCcubG9naW5Gb3JtLXRhYl9faXRlbScpLFxuICAgICAgICB0YWJzID0gJCgnLmxvZ2luRm9ybS10YWJzX19pdGVtJyksXG4gICAgICAgIGluZGV4ID0gdGFiLmluZGV4KCk7XG5cbiAgICB0YWIuYWRkQ2xhc3MoJ2FjdGl2ZScpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIHRhYnMuZXEoaW5kZXgpLmFkZENsYXNzKCdhY3RpdmUnKS5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbn1cblxuLy8gcFRyYWRpbmdfc3lzdGVtINC+0LTQuNC90LDQutC+0LLQsNGPINCy0YvRgdC+0YLQsCDQvdCw0LfQstGL0LDQvdC40Lkg0LIg0YHQv9C40YHQutC1XG5mdW5jdGlvbiBwVHJhZGluZ19zeXN0ZW1IZWlndE5hbWUoKSB7XG4gICAgdmFyXG4gICAgICAgIGl0ZW1zID0gJCgnLnRyYWRpbmdTeXN0ZW1JdGVtc19fbmFtZScpLFxuICAgICAgICBjb3VudCA9IDA7XG5cbiAgICBpdGVtcy5lYWNoKGZ1bmN0aW9uIChpKSB7XG4gICAgICAgIHZhclxuICAgICAgICAgICAgJHRoaXMgPSAkKHRoaXMpO1xuXG4gICAgICAgIGlmICgkdGhpcy5oZWlnaHQoKSA+IGNvdW50KSB7XG4gICAgICAgICAgICBjb3VudCA9ICR0aGlzLmhlaWdodCgpO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKGl0ZW1zLmxlbmd0aCAtIDEgPT09IGkpIHtcbiAgICAgICAgICAgIGl0ZW1zLmNzcygnaGVpZ2h0JywgY291bnQgKyAncHgnKTtcbiAgICAgICAgfVxuICAgIH0pO1xufVxuXG4vLyDQktGB0L/Qu9GL0LLQsNGI0LrQsCDQv9GA0Lgg0LTQvtCx0LDQstC70LXQvdC40LUg0LIg0LrQvtGA0LfQuNC90YMg0L/Qu9GO0YEg0Lgg0LzQuNC90YPRgVxuZnVuY3Rpb24gcG9wdXBBZGRCYXNrZXRQbHVzTWludXMoZWwpIHtcbiAgICB2YXJcbiAgICAgICAgYmxvY2sgPSBlbC5jbG9zZXN0KCcucG9wdXBBZGRCYXNrZXQtaXRlbS1jb3VudCcpLFxuICAgICAgICBpbnB1dCA9IGJsb2NrLmZpbmQoJy5wb3B1cEFkZEJhc2tldC1pdGVtLWNvdW50X19pbnB1dC10ZXh0JyksXG4gICAgICAgIGlucHV0VmFsdWUgPSBwYXJzZUludChpbnB1dC52YWwoKSksXG4gICAgICAgIHR5cGUgPSBlbC5hdHRyKCdkYXRhLXR5cGUnKTtcblxuICAgIGlmICh0eXBlID09PSAnbWludXMnKSB7XG4gICAgICAgIGlmIChpbnB1dFZhbHVlID4gMSkge1xuICAgICAgICAgICAgaW5wdXQudmFsKHBhcnNlSW50KGlucHV0VmFsdWUgLSAxKSk7XG4gICAgICAgIH1cbiAgICB9IGVsc2Uge1xuICAgICAgICBpbnB1dC52YWwocGFyc2VJbnQoaW5wdXRWYWx1ZSArIDEpKTtcbiAgICB9XG59XG5cbi8vINGB0LrRgNGL0YLRjCDQsdC70L7QuiDQv9GA0Lgg0LrQu9C40LrQtSDQsiDQvdC1INC10LPQvlxuZnVuY3Rpb24gaGlkZUJsb2NrSHRtbENsaWNrKGVsKSB7XG4gICAgaWYoIWVsLmNsb3Nlc3QoJy5zZWN0aW9uQ2F0YWxvZ0ZpbHRlci1zZWxlY3RlZCcpLmxlbmd0aCkge1xuICAgICAgICAkKCcuc2VjdGlvbkNhdGFsb2dGaWx0ZXItc2VsZWN0ZWQnKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxufVxuXG4vLyDQqNCw0L/QutCwINC/0YDQuCDQv9GA0L7QutGA0YPRgtC60LVcbmZ1bmN0aW9uIGhlYWRlclRvcFNjcm9sbCgpIHtcbiAgICBpZiAoJChkb2N1bWVudCkuc2Nyb2xsVG9wKCkgPiAyMDApIHtcbiAgICAgICAgJCgnLnNjcm9sbEhlYWRlcicpLmFkZENsYXNzKCdhY3RpdmUnKTtcbiAgICAgICAgJCgnLmhlYWRlci10b3AnKS5hZGRDbGFzcygnc2Nyb2xsJyk7XG5cbiAgICAgICAgaWYgKCQoJy5wcm9wZHVjdExpbmUnKS5sZW5ndGgpIHtcbiAgICAgICAgICAgICQoJy5wcm9wZHVjdExpbmUnKS5zaG93KCk7XG4gICAgICAgIH1cblxuICAgIH0gZWxzZSB7XG4gICAgICAgICQoJy5zY3JvbGxIZWFkZXInKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgICAgICQoJy5oZWFkZXItdG9wJykucmVtb3ZlQ2xhc3MoJ3Njcm9sbCcpO1xuXG4gICAgICAgIGlmICgkKCcucHJvcGR1Y3RMaW5lJykubGVuZ3RoKSB7XG4gICAgICAgICAgICAkKCcucHJvcGR1Y3RMaW5lJykuaGlkZSgpO1xuICAgICAgICB9XG4gICAgfVxufVxuXG4vLyDQntGC0LrRgNGL0YLRjCDQstGB0L/Qu9GL0LLQsNGO0YnRg9GOINC60L7RgNC30LjQvdGDINCyINGI0LDQv9C60LVcbmZ1bmN0aW9uIHRvZ2dsZUhlYWRlckJhc2tldChlbCkge1xuXG4gICAgdmFyXG4gICAgICAgIGJvZHkgPSAkKCdib2R5JyksXG4gICAgICAgIGljb25CYXNrZXQgPSBib2R5LmZpbmQoJy5oZWFkZXItbWlkZGxlLWNvbnRyb2xfX2NhcnQnKSxcbiAgICAgICAgcG9wdXAgPSBib2R5LmZpbmQoJy5iYXNrZXRfaGVhZGVyJyk7XG5cbiAgICBpZihlbC5oYXNDbGFzcygnc2Nyb2xsSGVhZGVyLWJhc2tldCcpKSB7XG4gICAgICAgIC8vcG9wdXAuYWRkQ2xhc3MoJ3Njcm9sbCcpO1xuICAgIH0gZWxzZSB7XG4gICAgICAgLy8gcG9wdXAucmVtb3ZlQ2xhc3MoJ3Njcm9sbCcpO1xuICAgIH1cbiAgICBcbiAgICBpY29uQmFza2V0LmFkZENsYXNzKCdjbGljaycpO1xuICAgIHBvcHVwLmFkZENsYXNzKCdhY3RpdmUnKTtcblxuICAgICQoJy5iYXNrZXRfaGVhZGVyX193cmFwJykualNjcm9sbFBhbmUoKTtcbn1cblxuLy8gcG9wdXAg0YLQvtCy0LDRgCDQtNC+0LHQsNCy0LvQtdC9INCyINC60L7RgNC30LjQvdGDIC0g0LfQsNC60YDRi9GC0YxcbmZ1bmN0aW9uIHBvcHVwSXRlbXNBZGRCYXNrZXRPcGVuKCkge1xuICAgIHZhclxuICAgICAgICBwb3B1cCA9ICQoJy5wb3B1cEFkZEJhc2tldCcpO1xuXG4gICAgcG9wdXAuc2hvdygpO1xufVxuXG4vLyBwb3B1cCDRgtC+0LLQsNGAINC00L7QsdCw0LLQu9C10L0g0LIg0LrQvtGA0LfQuNC90YMgLSDQt9Cw0LrRgNGL0YLRjFxuZnVuY3Rpb24gcG9wdXBJdGVtc0FkZEJhc2tldENMb3NlKCkge1xuICAgIHZhclxuICAgICAgICBwb3B1cCA9ICQoJy5wb3B1cEFkZEJhc2tldCcpO1xuXG4gICAgcG9wdXAuaGlkZSgpO1xufVxuXG4vLyBwb3B1cCDRgtC+0LLQsNGAINC00L7QsdCw0LLQu9C10L0g0LIg0LrQvtGA0LfQuNC90YMgLSB0b2dnbGUg0KHQvtCx0LXRgNC40YLQtSDQutC+0LzQv9C70LXQutGC0LDRhtC40Y5cbmZ1bmN0aW9uIHBvcHVwSXRlbXNBZGRCYXNrZXRUb2dnbGVDb21wbGVrdChlbCkge1xuICAgIHZhclxuICAgICAgICB3cmFwID0gJCgnLnBvcHVwQWRkQmFza2V0LWNvbXBsZWt0X193cmFwJyksXG4gICAgICAgIHRleHRPcGVuID0gZWwuYXR0cignZGF0YS1vcGVuJyksXG4gICAgICAgIHRleHRDbG9zZSA9IGVsLmF0dHIoJ2RhdGEtY2xvc2UnKTtcblxuICAgIHdyYXAudG9nZ2xlQ2xhc3MoJ2FjdGl2ZScpO1xuXG4gICAgdmFyXG4gICAgICAgIG5ld1dyYXAgPSAkKCdib2R5JykuZmluZCgnLnBvcHVwQWRkQmFza2V0LWNvbXBsZWt0X193cmFwJyk7XG5cbiAgICBpZiAobmV3V3JhcC5oYXNDbGFzcygnYWN0aXZlJykpIHtcbiAgICAgICAgd3JhcC5qU2Nyb2xsUGFuZSgpO1xuICAgICAgICBlbC50ZXh0KHRleHRDbG9zZSk7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgZWwudGV4dCh0ZXh0T3Blbik7XG4gICAgfVxufVxuXG5mdW5jdGlvbiBpc1ZhbGlkRW1haWxBZGRyZXNzKGVtYWlsQWRkcmVzcykge1xuICAgIHZhciBwYXR0ZXJuID0gbmV3IFJlZ0V4cCgvXigoXCJbXFx3LVxcc10rXCIpfChbXFx3LV0rKD86XFwuW1xcdy1dKykqKXwoXCJbXFx3LVxcc10rXCIpKFtcXHctXSsoPzpcXC5bXFx3LV0rKSopKShAKCg/OltcXHctXStcXC4pKlxcd1tcXHctXXswLDY2fSlcXC4oW2Etel17Miw2fSg/OlxcLlthLXpdezJ9KT8pJCl8KEBcXFs/KCgyNVswLTVdXFwufDJbMC00XVswLTldXFwufDFbMC05XXsyfVxcLnxbMC05XXsxLDJ9XFwuKSkoKDI1WzAtNV18MlswLTRdWzAtOV18MVswLTldezJ9fFswLTldezEsMn0pXFwuKXsyfSgyNVswLTVdfDJbMC00XVswLTldfDFbMC05XXsyfXxbMC05XXsxLDJ9KVxcXT8kKS9pKTtcbiAgICByZXR1cm4gcGF0dGVybi50ZXN0KGVtYWlsQWRkcmVzcyk7XG59XG5cbi8vINCX0LDQutGA0YvRgtGMINC+0LHRidGD0Y4g0YTQvtGA0LzRg1xuZnVuY3Rpb24gcG9wdXBGb3JtQ29tbW9uQ0xvc2UoZWwpIHtcbiAgICB2YXJcbiAgICAgICAgZm9ybSA9IGVsLmNsb3Nlc3QoJy5mb3JtLWxlYXZlUmVxdWVzdCcpLFxuICAgICAgICBvayA9IGZvcm0uZmluZCgnLmZvcm0tbGVhdmVSZXF1ZXN0X19vaycpLFxuICAgICAgICBib2R5ID0gZm9ybS5maW5kKCcuZm9ybS1sZWF2ZVJlcXVlc3RfX2JvZHknKSxcbiAgICAgICAgZm9ybVRoaXMgPSBlbC5jbG9zZXN0KCcuZm9ybUNvbW1vbicpLFxuICAgICAgICB0aGlzU3RlcCA9IGVsLmNsb3Nlc3QoJy5mb3JtQ29tbW9uX19zdGVwJyksXG4gICAgICAgIHN0ZXAgPSBwYXJzZUludChlbC5hdHRyKCdkYXRhLXN0ZXAnKSksXG4gICAgICAgIGFySW5wdXRUZXh0UmVxdWlyZWQgPSBbXSxcbiAgICAgICAgaW5wdXRQYXNzd29yZCA9IFtdLFxuICAgICAgICBpbnB1dENoZWNrQm94ID0gW10sXG4gICAgICAgIGlucHV0UFRleHQgPSBbXSxcbiAgICAgICAgc3RlcElucHV0ID0gW10sXG4gICAgICAgIHNlY3Rpb25DaGVja2JveCA9ICcnLFxuICAgICAgICBjaGVja2VkRmluYWwgPSAnJyxcbiAgICAgICAgY2hlY2tlZFJlcXVpcmVkID0gJyc7XG5cbiAgICBpZiAodGhpc1N0ZXAubGVuZ3RoID4gMCkge1xuXG4gICAgICAgIGlmIChzdGVwID09PSAxKSB7XG4gICAgICAgICAgICB2YXJcbiAgICAgICAgICAgICAgICBzdGVwT25lID0gIGZvcm1UaGlzLmZpbmQoXCIuZm9ybUNvbW1vbl9fc3RlcFtkYXRhLXN0ZXA9JzEnXVwiKSxcbiAgICAgICAgICAgICAgICBjaGVja2VkID0gc3RlcE9uZS5maW5kKCcuZm9ybUNvbW1vbkNoZWNrX19jaGVja2JveC10eXBlOmNoZWNrZWQnKSxcbiAgICAgICAgICAgICAgICBhck5leHRTdGVwID0gcGFyc2VJbnQoY2hlY2tlZC5hdHRyKCdkYXRhLW5leHQtc3RlcCcpKTtcblxuICAgICAgICAgICAgaWYgKGNoZWNrZWQubGVuZ3RoID4gMCkge1xuICAgICAgICAgICAgICAgIGZvcm1UaGlzLmZpbmQoXCIuZm9ybUNvbW1vbl9fc3RlcFtkYXRhLXN0ZXA9XCIgKyBzdGVwICsgXCJdXCIpLmhpZGUoKTtcbiAgICAgICAgICAgICAgICBmb3JtVGhpcy5maW5kKFwiLmZvcm1Db21tb25fX3N0ZXBbZGF0YS1zdGVwPVwiICsgYXJOZXh0U3RlcCArIFwiXVwiKS5zaG93KCk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICBpbnB1dFBhc3N3b3JkID0gdGhpc1N0ZXAuZmluZCgnaW5wdXRbdHlwZT1wYXNzd29yZF0nKSxcbiAgICAgICAgICAgICAgICBpbnB1dFBUZXh0ID0gdGhpc1N0ZXAuZmluZCgnaW5wdXRbdHlwZT10ZXh0XScpLFxuICAgICAgICAgICAgICAgIGlucHV0Q2hlY2tCb3ggPSB0aGlzU3RlcC5maW5kKCdpbnB1dFt0eXBlPWNoZWNrYm94XScpLFxuICAgICAgICAgICAgICAgIHN0ZXBJbnB1dCA9ICQubWVyZ2UoaW5wdXRQYXNzd29yZCwgaW5wdXRQVGV4dCksXG4gICAgICAgICAgICAgICAgc3RlcElucHV0ID0gJC5tZXJnZShzdGVwSW5wdXQsIGlucHV0Q2hlY2tCb3gpLFxuICAgICAgICAgICAgICAgIGNoZWNrZWRSZXF1aXJlZCA9IGZhbHNlLFxuICAgICAgICAgICAgICAgIGNoZWNrZWQgPSBbXTtcbiAgICAgICAgICAgICAgICBjaGVja2VkRmluYWwgPSB0cnVlO1xuXG4gICAgICAgICAgICBzdGVwSW5wdXQuZWFjaChmdW5jdGlvbiAoaSkge1xuXG4gICAgICAgICAgICAgICAgdmFyXG4gICAgICAgICAgICAgICAgICAgICR0aGlzID0gJCh0aGlzKSxcbiAgICAgICAgICAgICAgICAgICAgaW5wdXRXcmFwID0gJHRoaXMuY2xvc2VzdCgnLmZvcm1Db21tb25fX2lucHV0JyksXG4gICAgICAgICAgICAgICAgICAgIGlucHV0Q2hlY2tib3hXcmFwID0gJHRoaXMuY2xvc2VzdCgnLmZvcm1Db21tb25DaGVjaycpLFxuICAgICAgICAgICAgICAgICAgICBzZWN0aW9uQ2hlY2tib3ggPSAkdGhpcy5jbG9zZXN0KCcuZm9ybUNvbW1vbl9fc2VjdGlvbicpO1xuXG4gICAgICAgICAgICAgICAgaWYgKCR0aGlzLmF0dHIoJ3R5cGUnKSA9PT0gJ2NoZWNrYm94Jykge1xuICAgICAgICAgICAgICAgICAgICBzZWN0aW9uQ2hlY2tib3guZmluZCgnLmZvcm1Db21tb25fX2lucHV0LW1zZycpLnJlbW92ZSgpO1xuXG4gICAgICAgICAgICAgICAgICAgIGlmICgkdGhpcy5wcm9wKCdyZXF1aXJlZCcpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBjaGVja2VkUmVxdWlyZWQgPSB0cnVlO1xuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCR0aGlzLmlzKCc6Y2hlY2tlZCcpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2hlY2tlZC5wdXNoKDEpO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzZWN0aW9uQ2hlY2tib3guY3NzKHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJ2JvcmRlci10b3AnOiAnMXB4IHNvbGlkICM4QjAwMDAnXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VjdGlvbkNoZWNrYm94LnByZXBlbmQoJzxkaXYgY2xhc3M9XCJmb3JtQ29tbW9uX19pbnB1dC1tc2dcIj7QrdGC0L4g0L/QvtC70LUg0L7QsdGP0LfQsNGC0LXQu9GM0L3QviDQtNC70Y8g0LfQsNC/0L7Qu9C90LXQvdC40Y88L2Rpdj4nKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgIGlucHV0V3JhcC5uZXh0KCkucmVtb3ZlKCk7XG5cbiAgICAgICAgICAgICAgICBpZiAoJHRoaXMucHJvcCgncmVxdWlyZWQnKSAmJiAkdGhpcy52YWwoKSA9PT0gXCJcIikge1xuXG4gICAgICAgICAgICAgICAgICAgIGlmICgkdGhpcy5oYXNDbGFzcygnZW1haWwnKSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGlzVmFsaWRFbWFpbEFkZHJlc3MoJHRoaXMudmFsKCkpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5wdXRXcmFwLmNzcygnYm9yZGVyLWJvdHRvbScsICcxcHggc29saWQgIzYxNjE2MScpO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbnB1dFdyYXAuY3NzKCdib3JkZXItYm90dG9tJywgJzFweCBzb2xpZCAjOEIwMDAwJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5wdXRXcmFwLmFmdGVyKCc8ZGl2IGNsYXNzPVwiZm9ybUNvbW1vbl9faW5wdXQtbXNnXCI+0K3RgtC+INC/0L7Qu9C1INC+0LHRj9C30LDRgtC10LvRjNC90L4g0LTQu9GPINC30LDQv9C+0LvQvdC10L3QuNGPPC9kaXY+Jyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYXJJbnB1dFRleHRSZXF1aXJlZC5wdXNoKCR0aGlzKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGlucHV0V3JhcC5jc3MoJ2JvcmRlci1ib3R0b20nLCAnMXB4IHNvbGlkICM4QjAwMDAnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGlucHV0V3JhcC5hZnRlcignPGRpdiBjbGFzcz1cImZvcm1Db21tb25fX2lucHV0LW1zZ1wiPtCt0YLQviDQv9C+0LvQtSDQvtCx0Y/Qt9Cw0YLQtdC70YzQvdC+INC00LvRjyDQt9Cw0L/QvtC70L3QtdC90LjRjzwvZGl2PicpO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICBhcklucHV0VGV4dFJlcXVpcmVkLnB1c2goJHRoaXMpO1xuICAgICAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgaWYgKCR0aGlzLmhhc0NsYXNzKCdlbWFpbCcpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoaXNWYWxpZEVtYWlsQWRkcmVzcygkdGhpcy52YWwoKSkpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbnB1dFdyYXAuY3NzKCdib3JkZXItYm90dG9tJywgJzFweCBzb2xpZCAjNjE2MTYxJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlucHV0V3JhcC5jc3MoJ2JvcmRlci1ib3R0b20nLCAnMXB4IHNvbGlkICM4QjAwMDAnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbnB1dFdyYXAuYWZ0ZXIoJzxkaXYgY2xhc3M9XCJmb3JtQ29tbW9uX19pbnB1dC1tc2dcIj7QktCy0LXQtNC40YLQtSDQtNC10LnRgdGC0LLQuNGC0LXQu9GM0L3Ri9C5IGVtYWlsPC9kaXY+Jyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYXJJbnB1dFRleHRSZXF1aXJlZC5wdXNoKCR0aGlzKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgaW5wdXRXcmFwLmNzcygnYm9yZGVyLWJvdHRvbScsICcxcHggc29saWQgIzYxNjE2MScpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBcbiAgICAgICAgICAgICAgICBpZiAoc3RlcElucHV0Lmxlbmd0aCAtIDEgPT09IGkpIHtcblxuICAgICAgICAgICAgICAgICAgICBpZiAoY2hlY2tlZFJlcXVpcmVkKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoY2hlY2tlZC5sZW5ndGggPiAwKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2hlY2tlZEZpbmFsID0gdHJ1ZTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzU3RlcC5maW5kKCcuZm9ybUNvbW1vbl9faW5wdXQtbXNnJykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpc1N0ZXAuZmluZCgnLmZvcm1Db21tb25fX3NlY3Rpb24nKS5jc3MoJ2JvcmRlci10b3AnLCAnMCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjaGVja2VkRmluYWwgPSBmYWxzZTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgICAgIGlmIChhcklucHV0VGV4dFJlcXVpcmVkLmxlbmd0aCA9PT0gMCAmJiBjaGVja2VkRmluYWwpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHN0ZXBOZXh0QnRuID0gZWwuYXR0cignZGF0YS1zdGVwLW5leHQnKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgZm9ybVRoaXMuZmluZChcIi5mb3JtQ29tbW9uX19zdGVwW2RhdGEtc3RlcD1cIiArIHN0ZXAgKyBcIl1cIikuaGlkZSgpO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoc3RlcE5leHRCdG4gPT09ICdlbmQnKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgYm9keS5oaWRlKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgb2suc2hvdygpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGZvcm1UaGlzLmZpbmQoXCIuZm9ybUNvbW1vbl9fc3RlcFtkYXRhLXN0ZXA9JzEnXVwiKS5zaG93KCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZm9ybVRoaXMuZmluZChcIi5mb3JtQ29tbW9uX19zdGVwW2RhdGEtc3RlcD1cIiArIHBhcnNlSW50KHN0ZXBOZXh0QnRuKSArIFwiXVwiKS5zaG93KCk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgIH0gZWxzZSB7XG5cbiAgICAgICAgICAgIGlucHV0UGFzc3dvcmQgPSBmb3JtVGhpcy5maW5kKCdpbnB1dFt0eXBlPXBhc3N3b3JkXScpLFxuICAgICAgICAgICAgaW5wdXRQVGV4dCA9IGZvcm1UaGlzLmZpbmQoJ2lucHV0W3R5cGU9dGV4dF0nKSxcbiAgICAgICAgICAgIGlucHV0Q2hlY2tCb3ggPSBmb3JtVGhpcy5maW5kKCdpbnB1dFt0eXBlPWNoZWNrYm94XScpLFxuICAgICAgICAgICAgc3RlcElucHV0ID0gJC5tZXJnZShpbnB1dFBhc3N3b3JkLCBpbnB1dFBUZXh0KSxcbiAgICAgICAgICAgIHN0ZXBJbnB1dCA9ICQubWVyZ2Uoc3RlcElucHV0LCBpbnB1dENoZWNrQm94KTtcblxuICAgICAgICBzdGVwSW5wdXQuZWFjaChmdW5jdGlvbiAoaSkge1xuICAgICAgICAgICAgdmFyXG4gICAgICAgICAgICAgICAgJHRoaXMgPSAkKHRoaXMpLFxuICAgICAgICAgICAgICAgIGlucHV0V3JhcCA9ICR0aGlzLmNsb3Nlc3QoJy5mb3JtQ29tbW9uX19pbnB1dCcpO1xuXG4gICAgICAgICAgICBpbnB1dFdyYXAubmV4dCgpLnJlbW92ZSgpO1xuXG4gICAgICAgICAgICBpZiAoJHRoaXMucHJvcCgncmVxdWlyZWQnKSAmJiAkdGhpcy52YWwoKSA9PT0gXCJcIikge1xuXG4gICAgICAgICAgICAgICAgaWYgKCR0aGlzLmhhc0NsYXNzKCdlbWFpbCcpKSB7XG4gICAgICAgICAgICAgICAgICAgIGlmIChpc1ZhbGlkRW1haWxBZGRyZXNzKCR0aGlzLnZhbCgpKSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgaW5wdXRXcmFwLmNzcygnYm9yZGVyLWJvdHRvbScsICcxcHggc29saWQgIzYxNjE2MScpO1xuICAgICAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAgICAgaW5wdXRXcmFwLmNzcygnYm9yZGVyLWJvdHRvbScsICcxcHggc29saWQgIzhCMDAwMCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgaW5wdXRXcmFwLmFmdGVyKCc8ZGl2IGNsYXNzPVwiZm9ybUNvbW1vbl9faW5wdXQtbXNnXCI+0K3RgtC+INC/0L7Qu9C1INC+0LHRj9C30LDRgtC10LvRjNC90L4g0LTQu9GPINC30LDQv9C+0LvQvdC10L3QuNGPPC9kaXY+Jyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBhcklucHV0VGV4dFJlcXVpcmVkLnB1c2goJHRoaXMpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgaW5wdXRXcmFwLmNzcygnYm9yZGVyLWJvdHRvbScsICcxcHggc29saWQgIzhCMDAwMCcpO1xuICAgICAgICAgICAgICAgICAgICBpbnB1dFdyYXAuYWZ0ZXIoJzxkaXYgY2xhc3M9XCJmb3JtQ29tbW9uX19pbnB1dC1tc2dcIj7QrdGC0L4g0L/QvtC70LUg0L7QsdGP0LfQsNGC0LXQu9GM0L3QviDQtNC70Y8g0LfQsNC/0L7Qu9C90LXQvdC40Y88L2Rpdj4nKTtcblxuICAgICAgICAgICAgICAgICAgICBhcklucHV0VGV4dFJlcXVpcmVkLnB1c2goJHRoaXMpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gZWxzZSB7XG5cbiAgICAgICAgICAgICAgICBpZiAoJHRoaXMuaGFzQ2xhc3MoJ2VtYWlsJykpIHtcbiAgICAgICAgICAgICAgICAgICAgaWYgKGlzVmFsaWRFbWFpbEFkZHJlc3MoJHRoaXMudmFsKCkpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBpbnB1dFdyYXAuY3NzKCdib3JkZXItYm90dG9tJywgJzFweCBzb2xpZCAjNjE2MTYxJyk7XG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBpbnB1dFdyYXAuY3NzKCdib3JkZXItYm90dG9tJywgJzFweCBzb2xpZCAjOEIwMDAwJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBpbnB1dFdyYXAuYWZ0ZXIoJzxkaXYgY2xhc3M9XCJmb3JtQ29tbW9uX19pbnB1dC1tc2dcIj7QktCy0LXQtNC40YLQtSDQtNC10LnRgdGC0LLQuNGC0LXQu9GM0L3Ri9C5IGVtYWlsPC9kaXY+Jyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBhcklucHV0VGV4dFJlcXVpcmVkLnB1c2goJHRoaXMpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgaW5wdXRXcmFwLmNzcygnYm9yZGVyLWJvdHRvbScsICcxcHggc29saWQgIzYxNjE2MScpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBpZiAoc3RlcElucHV0Lmxlbmd0aCAtMSA9PT0gaSkge1xuICAgICAgICAgICAgICAgIGlmIChhcklucHV0VGV4dFJlcXVpcmVkLmxlbmd0aCA9PT0gMCkge1xuXG4gICAgICAgICAgICAgICAgICAgIGlmIChlbC5oYXNDbGFzcygnbXNnX24nKSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgZm9ybS5oaWRlKCk7XG4gICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBib2R5LmhpZGUoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIG9rLmZpbmQoJy5mb3JtQ29tbW9uX19vay10ZXh0IHAnKS5odG1sKGVsLmF0dHIoXCJkYXRhLW9rX21zZ1wiKSk7XG4gICAgICAgICAgICAgICAgICAgICAgICBvay5zaG93KCk7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgIH1cbn1cblxuLy8g0JLRgdC/0LvRi9Cy0LDRjtGJ0LDRjyDRhNC+0YDQvNCwINC+0LHRidCw0Y9cbmZ1bmN0aW9uIHBvcHVwRm9ybUNvbW1vbihlbCkge1xuICAgIHZhclxuICAgICAgICBmb3JtID0gJChlbC5hdHRyKCdkYXRhLWlkLWZvcm0nKSksXG4gICAgICAgIGZvcm1XcmFwID0gZWwuY2xvc2VzdCgnLmZvcm1Db21tb24nKSxcbiAgICAgICAgb2sgPSBmb3JtLmZpbmQoJy5mb3JtLWxlYXZlUmVxdWVzdF9fb2snKSxcbiAgICAgICAgYm9keSA9IGZvcm0uZmluZCgnLmZvcm0tbGVhdmVSZXF1ZXN0X19ib2R5JyksXG4gICAgICAgIGlucHV0ID0gZm9ybVdyYXAuZmluZCgnaW5wdXRbdHlwZT10ZXh0XScpLFxuICAgICAgICBhclJlcXVpcmVkID0gW107XG5cbiAgICBpZiAoaW5wdXQubGVuZ3RoID4gMCkge1xuICAgICAgICBpbnB1dC5lYWNoKGZ1bmN0aW9uIChpKSB7XG4gICAgICAgICAgICB2YXJcbiAgICAgICAgICAgICAgICAkdGhpcyA9ICQodGhpcyk7XG5cbiAgICAgICAgICAgIGlmICgkdGhpcy5wcm9wKCdyZXF1aXJlZCcpICYmICR0aGlzLnZhbCgpID09PSBcIlwiKSB7XG4gICAgICAgICAgICAgICAgYXJSZXF1aXJlZC5wdXNoKCR0aGlzKTtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgaWYgKGlucHV0Lmxlbmd0aCAtIDEgPT09IGkpIHtcbiAgICAgICAgICAgICAgICBpZiAoYXJSZXF1aXJlZC5sZW5ndGggPT09IDApIHtcbiAgICAgICAgICAgICAgICAgICAgYm9keS5zaG93KCk7XG4gICAgICAgICAgICAgICAgICAgIG9rLmhpZGUoKTtcbiAgICAgICAgICAgICAgICAgICAgZm9ybS5zaG93KCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9IGVsc2Uge1xuICAgICAgICBib2R5LnNob3coKTtcbiAgICAgICAgb2suaGlkZSgpO1xuICAgICAgICBmb3JtLnNob3coKTtcbiAgICB9XG5cbn1cblxuLy8g0KDQsNGB0LrRgNGL0YLQuNGPINGC0LXQutGB0YLQsCDQvdCwINGB0YLRgNCw0L3QuNGG0LUg0JDQutGG0LjQuFxuZnVuY3Rpb24gcGFnZVN0b2NrVG9nZ2xlVGV4dChlbCkge1xuICAgIHZhclxuICAgICAgICBibG9jayA9IGVsLmNsb3Nlc3QoJy5wU3RvY2tfX2l0ZW0nKSxcbiAgICAgICAgbGluayA9IGJsb2NrLmZpbmQoJy5wU3RvY2tfX3RvZ2dsZScpLFxuICAgICAgICBuYW1lID0gYmxvY2suZmluZCgnLnBTdG9ja19fbmFtZScpO1xuXG4gICAgbmFtZS50b2dnbGVDbGFzcygnYWN0aXZlJyk7XG4gICAgbGluay50b2dnbGVDbGFzcygnYWN0aXZlJyk7XG5cbiAgICBpZiAobGluay5oYXNDbGFzcygnYWN0aXZlJykpIHtcbiAgICAgICAgbGluay50ZXh0KGxpbmsuYXR0cignZGF0YS1oaWRlJykpO1xuICAgIH0gZWxzZSB7XG4gICAgICAgIGxpbmsudGV4dChsaW5rLmF0dHIoJ2RhdGEtc2hvdycpKTtcbiAgICB9XG59XG5cbi8vINCg0LDRgdC60YDRi9GC0LjQtSDRgdC/0LjRgdC60LAg0YDQsNC30LTQtdC70L7QsiDQvdCwINGB0YLRgNCw0L3QuNGG0LUg0JHQu9C+0LNcbmZ1bmN0aW9uIHBhZ2VCbG9nVG9nZ2xlU2VjdGlvbnMoZWwpIHtcbiAgICB2YXJcbiAgICAgICAgd3JhcCA9ICQoJy5ibG9nTWVudV9fd3JhcCcpO1xuXG4gICAgZWwudG9nZ2xlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIHdyYXAudG9nZ2xlQ2xhc3MoJ2FjdGl2ZScpO1xuXG4gICAgaWYgKCFlbC5oYXNDbGFzcygnYWN0aXZlJykpIHtcbiAgICAgICAgZWwudGV4dChlbC5hdHRyKCdkYXRhLXNob3cnKSk7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgZWwudGV4dChlbC5hdHRyKCdkYXRhLWhpZGUnKSk7XG4gICAgfVxufVxuXG4vLyDQstGL0YHQvtGC0LAg0Y3Qu9C10LzQtdC90YLQvtCyINCyINGB0L/QuNGB0LrQtSDQuNC30LHRgNCw0L3QvdC+0LVcbmZ1bmN0aW9uIGZhdm91cml0ZXNIZWlnaHRJdGVtcygpIHtcbiAgICB2YXJcbiAgICAgICAgaXRlbXMgPSAkKCcuZmF2b3VyaXRlcy1pdGVtc19faXRlbScpLFxuICAgICAgICBuZXdpdGVtc0Jsb2NrID0gJCgnLmZhdm91cml0ZXMtaXRlbXMtbGlzdCcpLFxuICAgICAgICBjb3VudCA9IDA7XG5cbiAgICBpdGVtcy5lYWNoKGZ1bmN0aW9uIChpKSB7XG4gICAgICAgIHZhclxuICAgICAgICAgICAgJHRoaXMgPSAkKHRoaXMpLFxuICAgICAgICAgICAgbmV3QmxvY2sgPSAkdGhpcy5maW5kKCcuZmF2b3VyaXRlcy1pdGVtcy1saXN0Jyk7XG5cbiAgICAgICAgaWYgKG5ld0Jsb2NrLm91dGVySGVpZ2h0KCkgPiBjb3VudCkge1xuICAgICAgICAgICAgY291bnQgPSBuZXdCbG9jay5vdXRlckhlaWdodCgpO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKGl0ZW1zLmxlbmd0aCAtIDEgPT09IGkpIHtcbiAgICAgICAgICAgIG5ld2l0ZW1zQmxvY2suY3NzKCdoZWlnaHQnLCBjb3VudCArICdweCcpO1xuICAgICAgICB9XG4gICAgfSk7XG59XG5cbi8vINCh0LrRgNGL0YLRjCDRgNCw0YHQutGA0YvRgtGMINGB0L/QuNGB0L7QuiDQvdCwINGB0YLRgNCw0L3QuNGG0LUg0LjRgdGC0L7RgNC40Y8g0L/QvtC60YPQv9C+0LpcbmZ1bmN0aW9uIGhpc3RvcnlQdXJjaGFzZVRvZ2dsZUl0ZW1zKGVsKSB7XG4gICAgdmFyXG4gICAgICAgIHNlY3Rpb24gPSBlbC5jbG9zZXN0KCcuaGlzdG9yeVB1cmNoYXNlSXRlbScpLFxuICAgICAgICB3cmFwID0gc2VjdGlvbi5maW5kKCcuaGlzdG9yeVB1cmNoYXNlSXRlbV9fd3JhcCcpLFxuICAgICAgICBsaW5rID0gZWwuZmluZCgnLmhpc3RvcnlQdXJjaGFzZS10YWJfX3RvZ2dsZScpO1xuXG4gICAgd3JhcC50b2dnbGUoKTtcbiAgICBlbC5maW5kKCcuaGlzdG9yeVB1cmNoYXNlLXRhYl9fdG9nZ2xlJykudG9nZ2xlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIGVsLnRvZ2dsZUNsYXNzKCdhY3RpdmUnKTtcblxuICAgIGlmIChlbC5oYXNDbGFzcygnYWN0aXZlJykpIHtcbiAgICAgICAgbGluay50ZXh0KGxpbmsuYXR0cignZGF0YS1zaG93JykpXG4gICAgfSBlbHNlIHtcbiAgICAgICAgbGluay50ZXh0KGxpbmsuYXR0cignZGF0YS1oaWRlJykpXG4gICAgfVxufVxuXG4vLyDQmtC+0Lst0LLQviDRgtC+0LLQsNGA0LAg0LIg0LjQt9Cx0YDQsNC90L3QvtC8INGDINGC0L7QstCw0YDQvtCyXG5mdW5jdGlvbiBmYXZvdXJpdGVzUGx1c01pbnVzKGVsKSB7XG4gICAgdmFyXG4gICAgICAgIGJsb2NrID0gZWwuY2xvc2VzdCgnLmZhdm91cml0ZXMtcG9wdXAtY291bnQnKSxcbiAgICAgICAgaW5wdXQgPSBibG9jay5maW5kKCcuZmF2b3VyaXRlcy1wb3B1cC1jb3VudF9faW5wdXQtdGV4dCcpLFxuICAgICAgICBpbnB1dEludCA9IHBhcnNlSW50KGlucHV0LnZhbCgpKSxcbiAgICAgICAgdHlwZSA9IGVsLmF0dHIoJ2RhdGEtdHlwZScpLFxuICAgICAgICBjb3VudCA9IDA7XG5cbiAgICBpZiAodHlwZSA9PT0gJ21pbnVzJykge1xuICAgICAgICBpZiAoaW5wdXRJbnQgPiAxKSB7XG4gICAgICAgICAgICBpbnB1dC52YWwoaW5wdXRJbnQgLSAxKTtcbiAgICAgICAgfVxuICAgIH0gZWxzZSB7XG4gICAgICAgIGlucHV0LnZhbChpbnB1dEludCArIDEpO1xuICAgIH1cblxufVxuXG4vLyDQstGL0YDQsNCy0L3QuNCy0LDQtdC8INCx0LvQvtC60Lgg0YLQvtCy0LDRgNC+0LIs0Ycg0YLQvtCx0Ysg0LHRi9C70Lgg0L7QtNC40L3QsNC60L7QstC+0Lkg0LLRi9GB0L7RgtGLIGNhdGFsb2dfc2VjdGlvbnMuaHRtbFxuZnVuY3Rpb24gY2F0YWxvZ1NlY3Rpb25zSGVpZ2h0QmxvY2soKSB7XG4gICAgdmFyXG4gICAgICAgIGJvZHkgPSAkKCdib2R5JyksXG4gICAgICAgIGl0ZW1zID0gYm9keS5maW5kKCcuc2VjdGlvbkNhdGFsb2dMaXN0LWl0ZW1zX19pdGVtJyksXG4gICAgICAgIGNvdW50ID0gMDtcblxuICAgIGl0ZW1zLmVhY2goZnVuY3Rpb24gKGkpIHtcbiAgICAgICAgdmFyXG4gICAgICAgICAgICAkdGhpcyA9ICQodGhpcyk7XG5cbiAgICAgICAgaWYgKCR0aGlzLmhlaWdodCgpID4gY291bnQpIHtcbiAgICAgICAgICAgIGNvdW50ID0gJHRoaXMub3V0ZXJIZWlnaHQoKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmKGl0ZW1zLmxlbmd0aCAtIDEgPT09IGkpIHtcbiAgICAgICAgICAgIGl0ZW1zLmNzcygnaGVpZ2h0JywgY291bnQgKyAncHgnKTtcbiAgICAgICAgfVxuICAgIH0pO1xuICAgIFxuXG59XG5cbi8vINCf0LvQsNCy0YPRjtGJ0LjQuSDQsdC70L7QuiDQt9Cw0LPQvtC70L7QstC60L7QsiDQtNC70Y8g0YHRgtGA0LDQvdC40YbRiyDRgdGA0LDQstC90LXQvdC40Y9cbmZ1bmN0aW9uIGNvbXBhcmlzb25UZEhpZGUoKSB7XG4gICAgaWYoJCh3aW5kb3cpLnNjcm9sbFRvcCgpID4gMzgyKSB7XG4gICAgICAgICQoJy5jb21wYXJpc29uLXRhYmxlLXRoJykuY3NzKCdkaXNwbGF5JywgJ3RhYmxlJyk7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgJCgnLmNvbXBhcmlzb24tdGFibGUtdGgnKS5oaWRlKCk7XG4gICAgfVxufVxuXG4vLyDQktGL0YHQvtGC0LAg0L3QvtCy0LjQvdC60LgsINC90LAg0LfQsNC60LDQtyDQuCDRgi7QtC4g0LTQu9GPINGB0L/QuNGB0LrQsCDQsiDRgNCw0LfQtNC10LvQtSDRgtC+0LLQsNGA0L7QslxuZnVuY3Rpb24gY2F0YWxvZ1NlY3Rpb25BaHV0b0hlaWdodFByb3AoKSB7XG4gICAgdmFyXG4gICAgICAgIGl0ZW1zID0gJCgnLmNhdGFsb2dTZWN0aW9uUHJvcEhlaWdodCcpLFxuICAgICAgICBoZWlnaHQgPSAwO1xuXG4gICAgaXRlbXMuZWFjaChmdW5jdGlvbiAoaSkge1xuICAgICAgICB2YXJcbiAgICAgICAgICAgICR0aGlzID0gJCh0aGlzKSxcbiAgICAgICAgICAgICR0aGlzSGVpZ2h0ID0gJHRoaXMuaGVpZ2h0KCk7XG5cbiAgICAgICAgaWYgKCR0aGlzSGVpZ2h0ID4gaGVpZ2h0KSB7XG4gICAgICAgICAgICBoZWlnaHQgPSAkdGhpc0hlaWdodDtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmKGl0ZW1zLmxlbmd0aCAtIDEgPT09IGkpIHtcbiAgICAgICAgICAgIGl0ZW1zLmNzcygnaGVpZ2h0JywgaGVpZ2h0ICsgJ3B4Jyk7XG4gICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBjYXRhbG9nU2VjdGlvbnNIZWlnaHRCbG9jaygpO1xuICAgICAgICAgICAgfSwgMzAwKTtcbiAgICAgICAgfVxuICAgIH0pO1xufVxuXG4vLyDQldGB0LvQuCDRgdGC0L7Rj9GCINCz0LDQu9C+0YfQutC4INGC0L4g0YLQtdC60YHRgiDQtNC+0LvQttC10L0g0LHRi9GC0Ywg0LbQuNGA0L3Ri9C8XG5mdW5jdGlvbiBmb250Qm9sZENoZWNrKGVsKSB7XG4gICAgdmFyXG4gICAgICAgIGJvZHkgPSAkKCdib2R5JyksXG4gICAgICAgIGl0ZW1zID0gYm9keS5maW5kKCcuZm9ybUNvbW1vbkNoZWNrX19jaGVja2JveC10eXBlJyk7XG5cbiAgICBpdGVtcy5lYWNoKGZ1bmN0aW9uIChpKSB7XG4gICAgICAgIHZhclxuICAgICAgICAgICAgJHRoaXMgPSAkKHRoaXMpLFxuICAgICAgICAgICAgc2VjdGlvbnMgPSAkdGhpcy5jbG9zZXN0KCcuZm9ybUNvbW1vbkRlbGl2ZXJ5Jyk7XG5cbiAgICAgICAgc2VjdGlvbnMucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgICAgICAkdGhpcy5wcm9wKCdjaGVja2VkJywgJycpO1xuXG4gICAgICAgIGlmIChpdGVtcy5sZW5ndGggLTEgPT09IGkpIHtcbiAgICAgICAgICAgIGVsLnByb3AoJ2NoZWNrZWQnLCAnY2hlY2tlZCcpO1xuICAgICAgICAgICAgZWwuY2xvc2VzdCgnLmZvcm1Db21tb25EZWxpdmVyeScpLmFkZENsYXNzKCdhY3RpdmUnKTtcblxuXG4gICAgICAgICAgICBpZiAoZWwuY2xvc2VzdCgnLmZvcm1Db21tb25EZWxpdmVyeScpLmF0dHIoJ2lkJykgPT09ICdQaWNrdXAnKSB7XG4gICAgICAgICAgICAgICAgZWwuY2xvc2VzdCgnLmZvcm1Db21tb24nKS5uZXh0KCkuaGlkZSgpO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICBlbC5jbG9zZXN0KCcuZm9ybUNvbW1vbicpLm5leHQoKS5zaG93KCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9KTtcbn1cblxuLy8g0JXRgdC70Lgg0YHRgtC+0Y/RgiDQs9Cw0LvQvtGH0LrQuCDRgtC+INGC0LXQutGB0YIg0LTQvtC70LbQtdC9INCx0YvRgtGMINC20LjRgNC90YvQvCwg0LTQu9GPINC/0L7QtNGC0LLQtdGA0LbQtNC10L3QuNGPINC/0L7Qu9C40YLQuNC60LhcbmZ1bmN0aW9uIGNoZWNrZWREZWxpdmVyeSgpIHtcbiAgICB2YXJcbiAgICAgICAgYm9keSA9ICQoJ2JvZHknKSxcbiAgICAgICAgaXRlbXMgPSBib2R5LmZpbmQoJy5mb3JtQ29tbW9uQ2hlY2snKTtcblxuICAgIGl0ZW1zLmVhY2goZnVuY3Rpb24gKGkpIHtcbiAgICAgICAgdmFyXG4gICAgICAgICAgICAkdGhpcyA9ICQodGhpcyksXG4gICAgICAgICAgICBpbnB1dENoZWNrYm94ID0gJHRoaXMuZmluZCgnLmZvcm1Db21tb25DaGVja19fY2hlY2tib3gtdHlwZScpLFxuICAgICAgICAgICAgdGV4dCA9ICR0aGlzLmZpbmQoJy5mb3JtQ29tbW9uQ2hlY2tfX3RleHQnKTtcblxuICAgICAgICBpZihpbnB1dENoZWNrYm94LnByb3AoJ2NoZWNrZWQnKSkge1xuICAgICAgICAgICAgdGV4dC5hZGRDbGFzcygnYWN0aXZlJyk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICB0ZXh0LnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbiAgICAgICAgfVxuICAgIH0pO1xufVxuXG4vLyDQn9GA0L7RhtC10L3RgiDQvtGCINGH0LjRgdC70LBcbmZ1bmN0aW9uIHByb2NlbnRJbnQoc3VtbSwgcHIpIHtcbiAgICByZXR1cm4gIHN1bW0gLSAoc3VtbSAvIDEwMCAqIHByKTtcbn1cblxuLy8g0J/Qu9GO0YEgLSDQvNC40L3Rg9GBLCDQstGL0YHRh9C40YLRi9Cy0LDQvdC40LUg0YbQtdC90Ysg0Lgg0YHQutC40LTQutC4INC00LvRjyDQutC+0YDQt9C40L3Ri1xuZnVuY3Rpb24gY2FydENvdW50TG9hZCgpIHtcbiAgICB2YXJcbiAgICAgICAgYm9keSA9ICQoJ2JvZHknKSxcbiAgICAgICAgY291bnRCbG9jayA9ICQoJyNjYXJ0Q291bnQnKSxcbiAgICAgICAgY291bnRUb3RhbCA9ICQoJyNjb3VudFRvdGFsJyksXG4gICAgICAgIHRvdGFsUHJpY2UgPSAkKCcjdG90YWxQcmljZScpLFxuICAgICAgICBjb3VudCA9IDAsXG4gICAgICAgIHRvdGFsU3VtbSA9IDAsXG4gICAgICAgIHByID0gMzAsXG4gICAgICAgIGl0ZW1zID0gYm9keS5maW5kKCcuY2FydFN0ZXAxLXRhYmxlLWNvdW50X19pbnB1dC10ZXh0Jyk7XG5cbiAgICBpdGVtcy5lYWNoKGZ1bmN0aW9uIChpKSB7XG4gICAgICAgIHZhclxuICAgICAgICAgICAgJHRoaXMgPSAkKHRoaXMpLFxuICAgICAgICAgICAgc2VjdGlvbiA9ICR0aGlzLmNsb3Nlc3QoJy5jYXJ0U3RlcDEtdGFibGVfX3RyJyksXG4gICAgICAgICAgICBzdW1tID0gcGFyc2VJbnQoc2VjdGlvbi5maW5kKCcuY2FydFN0ZXAxLXRhYmxlX190b3RhbCcpLmF0dHIoJ2RhdGEtdG90YWwnKSksXG4gICAgICAgICAgICBzYWxlID0gcGFyc2VJbnQoc2VjdGlvbi5maW5kKCcuY2FydFN0ZXAxLXRhYmxlX190b3RhbC1vbGQnKS5hdHRyKCdkYXRhLXNhbGUnKSksXG4gICAgICAgICAgICBpbnB1dENvdW50ID0gcGFyc2VJbnQoJHRoaXMudmFsKCkpO1xuXG4gICAgICAgIGNvdW50ICs9IGlucHV0Q291bnQ7XG5cbiAgICAgICAgdG90YWxTdW1tICs9IChzdW1tICogaW5wdXRDb3VudCk7XG5cbiAgICAgICAgaWYgKGl0ZW1zLmxlbmd0aCAtIDEgPT09IGkpIHtcbiAgICAgICAgICAgIGNvdW50QmxvY2suaHRtbChjb3VudCk7XG4gICAgICAgICAgICBjb3VudFRvdGFsLmh0bWwoY291bnQpO1xuICAgICAgICAgICAgdG90YWxQcmljZS5odG1sKHByaWNlU2V0KHRvdGFsU3VtbSkpO1xuICAgICAgICB9XG4gICAgfSk7XG59XG5cbi8vINCk0L7RgNC80LDRgiDRh9C40YHQu9CwXG52YXIgcHJpY2VTZXQgPSBmdW5jdGlvbihkYXRhKXtcbiAgICB2YXIgcHJpY2UgICAgICAgPSBOdW1iZXIucHJvdG90eXBlLnRvRml4ZWQuY2FsbChwYXJzZUZsb2F0KGRhdGEpIHx8IDAsIDApLFxuICAgICAgICBwcmljZV9zZXAgICA9IHByaWNlLnJlcGxhY2UoLyhcXEQpL2csIFwiLFwiKSxcbiAgICAgICAgcHJpY2Vfc2VwICAgPSBwcmljZV9zZXAucmVwbGFjZSgvKFxcZCkoPz0oXFxkezN9KSsoPyFcXGQpKS9nLCBcIiQxIFwiKTtcblxuICAgIHJldHVybiBwcmljZV9zZXAgKyAnINGA0YPQsS4nO1xufTtcblxuLy8g0J/QtdGA0LXRgdGH0LXRgiDRhtC10L0g0LIg0LrQvtGA0LfQuNC90LUg0L/RgNC4INC60LvQuNC60LUg0L3QsCDQv9C70Y7RgSDQvNC40L3Rg9GBXG5mdW5jdGlvbiBwYWdlQ2FydENvdW50VG90YWwoZWwsIGNvdW50LCBzYWxlKSB7XG4gICAgdmFyXG4gICAgICAgIHJvd0JMb2NrID0gZWwuY2xvc2VzdCgnLmNhcnRTdGVwMS10YWJsZV9fdHInKSxcbiAgICAgICAgdG90YWxCTG9jayA9IHJvd0JMb2NrLmZpbmQoJy5jYXJ0U3RlcDEtdGFibGVfX3RkLmZpdmUgLmNhcnRTdGVwMS10YWJsZV9fdG90YWwnKSxcbiAgICAgICAgc2FsZUJMb2NrID0gcm93QkxvY2suZmluZCgnLmNhcnRTdGVwMS10YWJsZV9fdGQuZml2ZSAuY2FydFN0ZXAxLXRhYmxlX190b3RhbC1vbGQnKSxcbiAgICAgICAgc2FsZVN1bW0gPSBwYXJzZUludChzYWxlQkxvY2suYXR0cignZGF0YS10b3RhbCcpKSxcbiAgICAgICAgdG90YWxTdW1tID0gcGFyc2VJbnQodG90YWxCTG9jay5hdHRyKCdkYXRhLXRvdGFsJykpO1xuXG4gICAgaWYgKHNhbGUpIHtcbiAgICAgICAgc2FsZUJMb2NrLnRleHQocHJpY2VTZXQoc2FsZSAqIGNvdW50KSk7XG4gICAgfVxuXG4gICAgdG90YWxCTG9jay50ZXh0KHByaWNlU2V0KHRvdGFsU3VtbSAqIGNvdW50KSk7XG59XG5cbi8vINCf0LvRjtGBINC80LjQvdC40YPRgSDQsiDQutC+0YDQt9C40L3QtVxuZnVuY3Rpb24gcGFnZUNhcnRDb3VudChlbCkge1xuICAgIHZhclxuICAgICAgICBjb3VudFJvdyA9IGVsLmNsb3Nlc3QoJy5jYXJ0U3RlcDEtdGFibGVfX3RyJyksXG4gICAgICAgIGNvdW50QmxvY2sgPSBlbC5jbG9zZXN0KCcuY2FydFN0ZXAxLXRhYmxlLWNvdW50JyksXG4gICAgICAgIHR5cGUgPSBlbC5hdHRyKCdkYXRhLXR5cGUnKSxcbiAgICAgICAgaW5wdXQgPSBjb3VudEJsb2NrLmZpbmQoJy5jYXJ0U3RlcDEtdGFibGUtY291bnRfX2lucHV0LXRleHQnKSxcbiAgICAgICAgc2FsZSA9IGNvdW50Um93LmZpbmQoJy5jYXJ0U3RlcDEtdGFibGVfX3RvdGFsLW9sZCcpLFxuICAgICAgICBzYWxlUHJpY2UgPSBwYXJzZUludChzYWxlLmF0dHIoJ2RhdGEtc2FsZScpKSxcbiAgICAgICAgY291bnRJbnB1dCA9IHBhcnNlSW50KGlucHV0LnZhbCgpKSxcbiAgICAgICAgY291bnROZXc7XG5cbiAgICBpZiAoZWwuYXR0cigndHlwZScpID09PSAndGV4dCcpIHtcbiAgICAgICAgaWYgKGNvdW50SW5wdXQgPCAxKSB7XG4gICAgICAgICAgICBwYWdlQ2FydENvdW50VG90YWwoZWwsIDEsIHNhbGVQcmljZSk7XG4gICAgICAgICAgICBjYXJ0Q291bnRMb2FkKCk7XG4gICAgICAgICAgICBlbC52YWwoMSk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBwYWdlQ2FydENvdW50VG90YWwoZWwsIGNvdW50SW5wdXQsIHNhbGVQcmljZSk7XG4gICAgICAgICAgICBjYXJ0Q291bnRMb2FkKCk7XG4gICAgICAgIH1cbiAgICB9IGVsc2Uge1xuICAgICAgICBpZiAodHlwZSA9PT0gJ21pbnVzJykge1xuICAgICAgICAgICAgaWYgKGNvdW50SW5wdXQgPiAxKSB7XG4gICAgICAgICAgICAgICAgY291bnROZXcgPSBwYXJzZUludChjb3VudElucHV0IC0gMSk7XG4gICAgICAgICAgICAgICAgaW5wdXQudmFsKGNvdW50TmV3KTtcbiAgICAgICAgICAgICAgICBwYWdlQ2FydENvdW50VG90YWwoZWwsIGNvdW50TmV3LCBzYWxlUHJpY2UpO1xuICAgICAgICAgICAgICAgIGNhcnRDb3VudExvYWQoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIGNvdW50TmV3ID0gcGFyc2VJbnQoY291bnRJbnB1dCArIDEpO1xuICAgICAgICAgICAgaW5wdXQudmFsKGNvdW50TmV3KTtcbiAgICAgICAgICAgIHBhZ2VDYXJ0Q291bnRUb3RhbChlbCwgY291bnROZXcsIHNhbGVQcmljZSk7XG4gICAgICAgICAgICBjYXJ0Q291bnRMb2FkKCk7XG4gICAgICAgIH1cbiAgICB9XG59XG5cbmZ1bmN0aW9uIHBhZ2VDYXJ0U3lzdGVtU2xpZGVyKCkge1xuICAgICQoJy5jYXJ0LXN5c3RlbXMtaGVyby1waG90by1iaWcnKS5zbGljayh7XG4gICAgICAgIHNsaWRlc1RvU2hvdzogMSxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDEsXG4gICAgICAgIGFycm93czogZmFsc2UsXG4gICAgICAgIGZhZGU6IHRydWUsXG4gICAgICAgIGFzTmF2Rm9yOiAnLmNhcnQtc3lzdGVtcy1oZXJvLXBob3RvLW1pbmknXG4gICAgfSk7XG4gICAgJCgnLmNhcnQtc3lzdGVtcy1oZXJvLXBob3RvLW1pbmknKS5zbGljayh7XG4gICAgICAgIHNsaWRlc1RvU2hvdzogMyxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDEsXG4gICAgICAgIGFzTmF2Rm9yOiAnLmNhcnQtc3lzdGVtcy1oZXJvLXBob3RvLWJpZycsXG4gICAgICAgIHZlcnRpY2FsOiB0cnVlLFxuICAgICAgICBkb3RzOiBmYWxzZSxcbiAgICAgICAgYXJyb3dzOiB0cnVlLFxuICAgICAgICBmb2N1c09uU2VsZWN0OiB0cnVlLFxuICAgICAgICBwcmV2QXJyb3c6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNhcnQtc3lzdGVtcy1oZXJvLXBob3RvLW1pbmlfX2J0biBjYXJ0LXN5c3RlbXMtaGVyby1waG90by1taW5pX19idG4tbGVmdFwiPjxkaXYgY2xhc3M9XCJsbnIgbG5yLWNoZXZyb24tbGVmdFwiPjwvZGl2PjwvYnV0dG9uPicsXG4gICAgICAgIG5leHRBcnJvdzogJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2FydC1zeXN0ZW1zLWhlcm8tcGhvdG8tbWluaV9fYnRuIGNhcnQtc3lzdGVtcy1oZXJvLXBob3RvLW1pbmlfX2J0bi1yaWdodFwiPjxkaXYgY2xhc3M9XCJsbnIgbG5yLWNoZXZyb24tcmlnaHRcIj48L2Rpdj48L2J1dHRvbj4nXG4gICAgfSk7XG59XG5cbmZ1bmN0aW9uIHBhZ2VDYXRhbG9nU2VjdGlvbnNJdGVtU0xpZGVyKCkge1xuXG4gICAgJCgnLnNlY3Rpb25DYXRhbG9nTGlzdC1pdGVtcy1wcmV2LXNsaWRlcicpLnNsaWNrKHtcbiAgICAgICAgaW5maW5pdGU6IHRydWUsXG4gICAgICAgIHNsaWRlc1RvU2hvdzogMSxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDEsXG4gICAgICAgIGFycm93czogdHJ1ZSxcbiAgICAgICAgZG90czogZmFsc2UsXG4gICAgICAgIHByZXZBcnJvdzogJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwic2VjdGlvbkNhdGFsb2dMaXN0LWl0ZW1zLXByZXYtc2xpZGVyX19idG4gc2VjdGlvbkNhdGFsb2dMaXN0LWl0ZW1zLXByZXYtc2xpZGVyX19idG4tbGVmdFwiPjxkaXYgY2xhc3M9XCJsbnIgbG5yLWNoZXZyb24tbGVmdFwiPjwvZGl2PjwvYnV0dG9uPicsXG4gICAgICAgIG5leHRBcnJvdzogJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwic2VjdGlvbkNhdGFsb2dMaXN0LWl0ZW1zLXByZXYtc2xpZGVyX19idG4gc2VjdGlvbkNhdGFsb2dMaXN0LWl0ZW1zLXByZXYtc2xpZGVyX19idG4tcmlnaHRcIj48ZGl2IGNsYXNzPVwibG5yIGxuci1jaGV2cm9uLXJpZ2h0XCI+PC9kaXY+PC9idXR0b24+J1xuICAgIH0pO1xuXG4gICAgJCgnLmZhdm91cml0ZXMtcG9wdXAtc2xpZGVyX19pdGVtcycpLnNsaWNrKHtcbiAgICAgICAgaW5maW5pdGU6IHRydWUsXG4gICAgICAgIHNsaWRlc1RvU2hvdzogMSxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDEsXG4gICAgICAgIGFycm93czogdHJ1ZSxcbiAgICAgICAgZG90czogZmFsc2UsXG4gICAgICAgIHByZXZBcnJvdzogJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiZmF2b3VyaXRlcy1wb3B1cC1zbGlkZXJfX2J0biBmYXZvdXJpdGVzLXBvcHVwLXNsaWRlcl9fYnRuLWxlZnRcIj48ZGl2IGNsYXNzPVwibG5yIGxuci1jaGV2cm9uLWxlZnRcIj48L2Rpdj48L2J1dHRvbj4nLFxuICAgICAgICBuZXh0QXJyb3c6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImZhdm91cml0ZXMtcG9wdXAtc2xpZGVyX19idG4gZmF2b3VyaXRlcy1wb3B1cC1zbGlkZXJfX2J0bi1yaWdodFwiPjxkaXYgY2xhc3M9XCJsbnIgbG5yLWNoZXZyb24tcmlnaHRcIj48L2Rpdj48L2J1dHRvbj4nXG4gICAgfSk7XG5cbiAgICAkKCcuc2VjdGlvbkNhdGFsb2dMaXN0LWl0ZW1zX19pdGVtJykub24oJ21vdXNlZW50ZXInLGZ1bmN0aW9uICgpIHtcbiAgICAgICAgJCh0aGlzKS5maW5kKFwiLnNlY3Rpb25DYXRhbG9nTGlzdC1pdGVtcy1wcmV2LXNsaWRlclwiKS5zbGljaygncmVmcmVzaCcpO1xuICAgIH0pO1xufVxuXG5mdW5jdGlvbiBwYWdlQ2F0YWxvZ1NlY3Rpb25zQ291bnQoZWwpIHtcbiAgICB2YXJcbiAgICAgICAgc2VjdGlvbiA9IGVsLmNsb3Nlc3QoJy5zZWN0aW9uQ2F0YWxvZ0xpc3QtaXRlbXNfX2l0ZW0nKSxcbiAgICAgICAgYmxvY2sgPSBlbC5jbG9zZXN0KCcuc2VjdGlvbkNhdGFsb2dMaXN0LWl0ZW1zLWNvdW50JyksXG4gICAgICAgIGlucHV0ID0gYmxvY2suZmluZCgnLnNlY3Rpb25DYXRhbG9nTGlzdC1pdGVtcy1jb3VudF9faW5wdXQtdGV4dCcpLFxuICAgICAgICBpbnB1dElubmVyID0gc2VjdGlvbi5maW5kKCcuc2VjdGlvbkNhdGFsb2dMaXN0LWl0ZW1zLWNvdW50X19pbnB1dC10ZXh0JyksXG4gICAgICAgIGNvdW50ID0gcGFyc2VJbnQoaW5wdXQudmFsKCkpO1xuXG4gICAgaWYgKGVsLmhhc0NsYXNzKCdtaW51cycpKSB7XG4gICAgICAgIGlmIChjb3VudCA+IDEpIHtcbiAgICAgICAgICAgIGlucHV0LnZhbChjb3VudCAtIDEpO1xuICAgICAgICAgICAgaW5wdXRJbm5lci52YWwoY291bnQgLSAxKTtcbiAgICAgICAgfVxuICAgIH0gZWxzZSB7XG4gICAgICAgIGlucHV0LnZhbChjb3VudCArIDEpO1xuICAgICAgICBpbnB1dElubmVyLnZhbChjb3VudCArIDEpO1xuICAgIH1cbn1cblxuZnVuY3Rpb24gIHBhZ2VDYXRhbG9nU2VjdGlvbnNHZXRTZWxlY3RlZEZpbHRlcihlbCkge1xuICAgIHZhclxuICAgICAgICBzZWxlY3QgPSBlbC5jbG9zZXN0KCcuc2VjdGlvbkNhdGFsb2dGaWx0ZXItc2VsZWN0ZWQnKSxcbiAgICAgICAgdmFsdWUgPSBzZWxlY3QuZmluZCgnLnNlY3Rpb25DYXRhbG9nRmlsdGVyLXNlbGVjdGVkX192YWx1ZScpLFxuICAgICAgICB0ZXh0ID0gZWwuZmluZCgnLnNlY3Rpb25DYXRhbG9nRmlsdGVyLXNlbGVjdGVkX190ZXh0Jyk7XG5cbiAgICBlbC5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKS5lbmQoKS5hZGRDbGFzcygnYWN0aXZlJyk7XG5cbiAgICB2YWx1ZS50ZXh0KHRleHQudGV4dCgpKTtcblxuICAgIHNlbGVjdC5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG59XG5cbmZ1bmN0aW9uIHBhZ2VDYXRhbG9nU2VjdGlvbnNUb2dnbGVTZWxlY3RlZEZpbHRlcihlbCkge1xuICAgIHZhclxuICAgICAgICBzZWxlY3QgPSBlbC5jbG9zZXN0KCcuc2VjdGlvbkNhdGFsb2dGaWx0ZXItc2VsZWN0ZWQnKTtcblxuICAgIHNlbGVjdC50b2dnbGVDbGFzcygnYWN0aXZlJykuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG59XG5cbmZ1bmN0aW9uIGNhdGFsb2dEZXRhaWxQcm9wU2VsZWN0SXRlbShlbCkge1xuICAgIHZhclxuICAgICAgICBzZWxlY3QgPSBlbC5jbG9zZXN0KCcuY2F0YWxvZ0RldGFpbEluZm8tcHJvcC1zZWxlY3QnKSxcbiAgICAgICAgaXRlbXMgPSBzZWxlY3QuZmluZCgnLmNhdGFsb2dEZXRhaWxJbmZvLXByb3Atc2VsZWN0X19pdGVtcycpLFxuICAgICAgICB0aXRsZSA9IHNlbGVjdC5maW5kKCcuY2F0YWxvZ0RldGFpbEluZm8tcHJvcC1zZWxlY3RfX3ZhbHVlJyk7XG5cbiAgICBlbC5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKS5lbmQoKS5hZGRDbGFzcygnYWN0aXZlJyk7XG5cbiAgICB0aXRsZS50ZXh0KGVsLnRleHQoKSk7XG5cbiAgICBpdGVtcy50b2dnbGUoKTtcbn1cblxuZnVuY3Rpb24gY2F0YWxvZ0RldGFpbFByb3BTZWxlY3QoZWwpIHtcbiAgICB2YXJcbiAgICAgICAgc2VsZWN0ID0gZWwuY2xvc2VzdCgnLmNhdGFsb2dEZXRhaWxJbmZvLXByb3Atc2VsZWN0JyksXG4gICAgICAgIGl0ZW1zID0gc2VsZWN0LmZpbmQoJy5jYXRhbG9nRGV0YWlsSW5mby1wcm9wLXNlbGVjdF9faXRlbXMnKTtcblxuICAgIGl0ZW1zLnRvZ2dsZSgpO1xufVxuXG5mdW5jdGlvbiBjYXRhbG9nRGV0YWlsQ291bnQoZWwpIHtcbiAgICB2YXJcbiAgICAgICAgc2VjdGlvbiA9IGVsLmNsb3Nlc3QoJy5jYXRhbG9nRGV0YWlsSW5mby1idXktY291bnQnKSxcbiAgICAgICAgaW5wdXQgPSBzZWN0aW9uLmZpbmQoJy5jYXRhbG9nRGV0YWlsSW5mby1idXktY291bnQtaW5wdXRfX3RleHQnKSxcbiAgICAgICAgY291bnQgPSBwYXJzZUludChpbnB1dC52YWwoKSksXG4gICAgICAgIHR5cGUgPSBlbC5hdHRyKCdkYXRhLXR5cGUnKTtcblxuICAgIGlmICh0eXBlID09PSAnbWludXMnKSB7XG4gICAgICAgIGlmIChjb3VudCA+IDEpIHtcbiAgICAgICAgICAgIGlucHV0LnZhbChjb3VudCAtIDEpO1xuICAgICAgICB9XG4gICAgfSBlbHNlIHtcbiAgICAgICAgaW5wdXQudmFsKGNvdW50ICsgMSk7XG4gICAgfVxufVxuXG5mdW5jdGlvbiBjYXRhbG9nRGV0YWlsU2xpZGVyMigpIHtcbiAgICAkKCcuY2F0YWxvZ0RldGFpbFByb2R1a3RzLXNsaWRlcl9faXRlbXMnKS5zbGljayh7XG4gICAgICAgIGluZmluaXRlOiB0cnVlLFxuICAgICAgICBzbGlkZXNUb1Nob3c6IDUsXG4gICAgICAgIHNsaWRlc1RvU2Nyb2xsOiAxLFxuICAgICAgICBhcnJvd3M6IHRydWUsXG4gICAgICAgIGRvdHM6IGZhbHNlLFxuICAgICAgICBwcmV2QXJyb3c6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNhdGFsb2dEZXRhaWxQcm9kdWt0cy1zbGlkZXJfX2J0biBjYXRhbG9nRGV0YWlsUHJvZHVrdHMtc2xpZGVyX19idG4tbGVmdFwiPjxkaXYgY2xhc3M9XCJsbnIgbG5yLWNoZXZyb24tbGVmdFwiPjwvZGl2PjwvYnV0dG9uPicsXG4gICAgICAgIG5leHRBcnJvdzogJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2F0YWxvZ0RldGFpbFByb2R1a3RzLXNsaWRlcl9fYnRuIGNhdGFsb2dEZXRhaWxQcm9kdWt0cy1zbGlkZXJfX2J0bi1yaWdodFwiPjxkaXYgY2xhc3M9XCJsbnIgbG5yLWNoZXZyb24tcmlnaHRcIj48L2Rpdj48L2J1dHRvbj4nXG4gICAgfSk7XG5cbiAgICAkKCcuY2F0YWxvZ0RldGFpbFByb2R1a3RzLXNsaWRlci1taW5pJykuc2xpY2soe1xuICAgICAgICBpbmZpbml0ZTogdHJ1ZSxcbiAgICAgICAgc2xpZGVzVG9TaG93OiAxLFxuICAgICAgICBzbGlkZXNUb1Njcm9sbDogMSxcbiAgICAgICAgYXJyb3dzOiB0cnVlLFxuICAgICAgICBkb3RzOiBmYWxzZSxcbiAgICAgICAgcHJldkFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjYXRhbG9nRGV0YWlsUHJvZHVrdHMtc2xpZGVyLW1pbmlfX2J0biBjYXRhbG9nRGV0YWlsUHJvZHVrdHMtc2xpZGVyLW1pbmlfX2J0bi1sZWZ0XCI+PGRpdiBjbGFzcz1cImxuciBsbnItY2hldnJvbi1sZWZ0XCI+PC9kaXY+PC9idXR0b24+JyxcbiAgICAgICAgbmV4dEFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjYXRhbG9nRGV0YWlsUHJvZHVrdHMtc2xpZGVyLW1pbmlfX2J0biBjYXRhbG9nRGV0YWlsUHJvZHVrdHMtc2xpZGVyLW1pbmlfX2J0bi1yaWdodFwiPjxkaXYgY2xhc3M9XCJsbnIgbG5yLWNoZXZyb24tcmlnaHRcIj48L2Rpdj48L2J1dHRvbj4nXG4gICAgfSk7XG59XG5cbmZ1bmN0aW9uIGNhdGFsb2dEZXRhaWxTbGlkZXIoKSB7XG4gICAgJCgnLmNhdGFsb2dEZXRhaWwtc2xpZGVyX19pdGVtcycpLnNsaWNrKHtcbiAgICAgICAgaW5maW5pdGU6IHRydWUsXG4gICAgICAgIHNsaWRlc1RvU2hvdzogNCxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDEsXG4gICAgICAgIGFycm93czogdHJ1ZSxcbiAgICAgICAgZG90czogZmFsc2UsXG4gICAgICAgIHByZXZBcnJvdzogJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2F0YWxvZ0RldGFpbC1zbGlkZXJfX2J0biBjYXRhbG9nRGV0YWlsLXNsaWRlcl9fYnRuLWxlZnRcIj48ZGl2IGNsYXNzPVwibG5yIGxuci1jaGV2cm9uLWxlZnRcIj48L2Rpdj48L2J1dHRvbj4nLFxuICAgICAgICBuZXh0QXJyb3c6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNhdGFsb2dEZXRhaWwtc2xpZGVyX19idG4gY2F0YWxvZ0RldGFpbC1zbGlkZXJfX2J0bi1yaWdodFwiPjxkaXYgY2xhc3M9XCJsbnIgbG5yLWNoZXZyb24tcmlnaHRcIj48L2Rpdj48L2J1dHRvbj4nXG4gICAgfSk7XG59XG5cbmZ1bmN0aW9uIGNhdGFsb2dEZXRhaWxUYWJzKGVsKSB7XG4gICAgdmFyXG4gICAgICAgIHRhYiA9ICQoJy5jYXRhbG9nRGV0YWlsLXRhYnMtdGFiX19pdGVtJyk7XG5cbiAgICBlbC5zaWJsaW5ncygpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKS5lbmQoKS5hZGRDbGFzcygnYWN0aXZlJyk7XG5cbiAgICB0YWIucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIHRhYi5lcShlbC5pbmRleCgpKS5hZGRDbGFzcygnYWN0aXZlJyk7XG59XG5cbmZ1bmN0aW9uIGNhdGFsb2dEZXRhaWxQaG90bygpIHtcbiAgICAkKCcuY2F0YWxvZ0RldGFpbFBob3RvLWJpZ19faXRlbXMnKS5zbGljayh7XG4gICAgICAgIHNsaWRlc1RvU2hvdzogMSxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDEsXG4gICAgICAgIGFycm93czogZmFsc2UsXG4gICAgICAgIGZhZGU6IHRydWUsXG4gICAgICAgIGFzTmF2Rm9yOiAnLmNhdGFsb2dEZXRhaWxQaG90by1taW5pX19pdGVtcydcbiAgICB9KTtcbiAgICAkKCcuY2F0YWxvZ0RldGFpbFBob3RvLW1pbmlfX2l0ZW1zJykuc2xpY2soe1xuICAgICAgICBzbGlkZXNUb1Nob3c6IDQsXG4gICAgICAgIHNsaWRlc1RvU2Nyb2xsOiAxLFxuICAgICAgICBhc05hdkZvcjogJy5jYXRhbG9nRGV0YWlsUGhvdG8tYmlnX19pdGVtcycsXG4gICAgICAgIHZlcnRpY2FsOiB0cnVlLFxuICAgICAgICBkb3RzOiBmYWxzZSxcbiAgICAgICAgYXJyb3dzOiB0cnVlLFxuICAgICAgICBmb2N1c09uU2VsZWN0OiB0cnVlLFxuICAgICAgICBlYXNpbmc6ICdub25lJyxcbiAgICAgICAgcHJldkFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjYXRhbG9nRGV0YWlsUGhvdG8tbWluaV9fYnRuIGNhdGFsb2dEZXRhaWxQaG90by1taW5pX19idG4tbGVmdFwiPjxkaXYgY2xhc3M9XCJsbnIgbG5yLWNoZXZyb24tbGVmdFwiPjwvZGl2PjwvYnV0dG9uPicsXG4gICAgICAgIG5leHRBcnJvdzogJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2F0YWxvZ0RldGFpbFBob3RvLW1pbmlfX2J0biBjYXRhbG9nRGV0YWlsUGhvdG8tbWluaV9fYnRuLXJpZ2h0XCI+PGRpdiBjbGFzcz1cImxuciBsbnItY2hldnJvbi1yaWdodFwiPjwvZGl2PjwvYnV0dG9uPidcbiAgICB9KTtcblxuICAgICQoJy5mYXN0U2VlU2xpZGVyQmlnJykuc2xpY2soe1xuICAgICAgICBzbGlkZXNUb1Nob3c6IDEsXG4gICAgICAgIHNsaWRlc1RvU2Nyb2xsOiAxLFxuICAgICAgICBhcnJvd3M6IGZhbHNlLFxuICAgICAgICBmYWRlOiB0cnVlLFxuICAgICAgICBhc05hdkZvcjogJy5mYXN0U2VlU2xpZGVyTWluaSdcbiAgICB9KTtcbiAgICAkKCcuZmFzdFNlZVNsaWRlck1pbmknKS5zbGljayh7XG4gICAgICAgIHNsaWRlc1RvU2hvdzogNCxcbiAgICAgICAgc2xpZGVzVG9TY3JvbGw6IDEsXG4gICAgICAgIGFzTmF2Rm9yOiAnLmZhc3RTZWVTbGlkZXJCaWcnLFxuICAgICAgICB2ZXJ0aWNhbDogdHJ1ZSxcbiAgICAgICAgZG90czogZmFsc2UsXG4gICAgICAgIGFycm93czogdHJ1ZSxcbiAgICAgICAgZm9jdXNPblNlbGVjdDogdHJ1ZSxcbiAgICAgICAgcHJldkFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjYXRhbG9nRGV0YWlsUGhvdG8tbWluaV9fYnRuIGNhdGFsb2dEZXRhaWxQaG90by1taW5pX19idG4tbGVmdFwiPjxkaXYgY2xhc3M9XCJpY29uLWRldGFpbC1zbGlkZXItbWluaS1zbGlkZXItYXJyb3ctdG9wXCI+PC9kaXY+PC9idXR0b24+JyxcbiAgICAgICAgbmV4dEFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjYXRhbG9nRGV0YWlsUGhvdG8tbWluaV9fYnRuIGNhdGFsb2dEZXRhaWxQaG90by1taW5pX19idG4tcmlnaHRcIj48ZGl2IGNsYXNzPVwiaWNvbi1kZXRhaWwtc2xpZGVyLW1pbmktc2xpZGVyLWFycm93LWJvdHRvbVwiPjwvZGl2PjwvYnV0dG9uPidcbiAgICB9KTtcblxuICAgICQoJy5mYXN0U2VlUGx1c01pbnVzX19idG4nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIHBsdXNNaW51c0Zhc3RTZWUoJCh0aGlzKSk7XG4gICAgfSk7XG5cbiAgICAkKCcuZmFzdFNlZVRvcE5hdl9fY2xvc2UnKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICQoJy5mYXN0U2VlJykuaGlkZSgpO1xuICAgIH0pO1xuXG4gICAgJCgnLmZhc3RTZWVTaG93Jykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICB2YXJcbiAgICAgICAgICAgIGJsb2NrID0gJCgnLmRldGFpbENhdGFsb2dIZXJvUG9wdXAnKTtcblxuICAgICAgICBibG9jay5zaG93KCk7XG4gICAgICAgIGJsb2NrLmZpbmQoJy5jYXRhbG9nRGV0YWlsUGhvdG8tbWluaV9faXRlbXMnKS5zbGljaygnc2V0UG9zaXRpb24nLCAwKTtcbiAgICAgICAgYmxvY2suZmluZCgnLmNhdGFsb2dEZXRhaWxQaG90by1iaWdfX2l0ZW1zJykuc2xpY2soJ3NldFBvc2l0aW9uJywgMCk7XG4gICAgfSk7XG59XG5cbi8vINCf0LvRjtGBINC80LjQvdGD0YEg0LIg0LHRi9GB0YLRgNC+0Lwg0L/RgNC+0YHQvNC+0YLRgNC1XG5mdW5jdGlvbiBwbHVzTWludXNGYXN0U2VlKGVsKSB7XG4gICAgdmFyXG4gICAgICAgIHNlY3Rpb24gPSBlbC5jbG9zZXN0KCcuZmFzdFNlZVBsdXNNaW51cycpLFxuICAgICAgICBpbnB1dCA9IHNlY3Rpb24uZmluZCgnLmZhc3RTZWVQbHVzTWludXNfX2lucHV0JyksXG4gICAgICAgIGNvdW50ID0gcGFyc2VJbnQoaW5wdXQudmFsKCkpLFxuICAgICAgICB0eXBlID0gZWwuYXR0cignZGF0YS10eXBlJyk7XG5cbiAgICBpZiAodHlwZSA9PT0gJ21pbnVzJykge1xuICAgICAgICBpZiAoY291bnQgPiAxKSB7XG4gICAgICAgICAgICBpbnB1dC5hdHRyKCd2YWx1ZScsIGNvdW50IC0gMSk7XG4gICAgICAgIH1cbiAgICB9IGVsc2Uge1xuICAgICAgICBpbnB1dC5hdHRyKCd2YWx1ZScsIGNvdW50ICsgMSk7XG4gICAgfVxufVxuXG5mdW5jdGlvbiBzY3JvbGxUb3BCb3R0b21TdHlsZSgpIHtcbiAgICBpZiAoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJmb290ZXJcIikuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkudG9wIDwgMTAwMCkge1xuICAgICAgICAkKCcuc2Nyb2xsVG9wJykuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH0gZWxzZSB7XG4gICAgICAgICQoJy5zY3JvbGxUb3AnKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgfVxufVxuXG5mdW5jdGlvbiB0b2dnbGVUaXRsZSgpIHtcbiAgICAkKFwiLnRvZ2dsZVRpdGxlXCIpLmhvdmVyKGZ1bmN0aW9uKCl7XG4gICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH0sZnVuY3Rpb24oKXtcbiAgICAgICAgJCh0aGlzKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgfSk7XG59XG5cbmZ1bmN0aW9uIHBhZ2VJbmRleENhdGFsb2dIZWlnaHRJdGVtKCkge1xuICAgIHZhclxuICAgICAgICBpdGVtcyA9ICQoJy5pbmRleC1jYXRhbG9nX19pdGVtJyksXG4gICAgICAgIGhlaWdodE1heCA9IDA7XG5cbiAgICBpdGVtcy5lYWNoKGZ1bmN0aW9uIChpKSB7XG5cbiAgICAgICAgdmFyICR0aGlzID0gJCh0aGlzKTtcblxuICAgICAgICBpZiAoaGVpZ2h0TWF4IDwgJHRoaXMub3V0ZXJIZWlnaHQoKSkge1xuICAgICAgICAgICAgaGVpZ2h0TWF4ID0gJHRoaXMuaGVpZ2h0KCk7XG4gICAgICAgIH1cblxuICAgICAgICBpZiAoaXRlbXMubGVuZ3RoIC0gMSA9PT0gaSkge1xuICAgICAgICAgICAgaXRlbXMuY3NzKCdoZWlnaHQnLCBoZWlnaHRNYXggKyAncHgnKTtcbiAgICAgICAgfVxuICAgIH0pO1xufVxuXG5mdW5jdGlvbiBwYWdlSW5kZXhDYXRhbG9nT3BlbkhpZGVFbGVtZW50KCkge1xuICAgIHZhclxuICAgICAgICBjYXRhbG9nID0gJCgnLmluZGV4LWNhdGFsb2dfX2l0ZW1zJyk7XG5cbiAgICBpZiAoY2F0YWxvZy5oYXNDbGFzcygnYWN0aXZlJykpIHtcbiAgICAgICAgJCgnLmluZGV4LWNhdGFsb2dfX2l0ZW1zJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgICAgICAkKCcuaW5kZXgtY2F0YWxvZy1jb250cm9sX19idG4nKS50ZXh0KCfQldGJ0LUg0LrQsNGC0LXQs9C+0YDQuNC4Jyk7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgJCgnLmluZGV4LWNhdGFsb2dfX2l0ZW1zJykuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgICAgICAkKCcuaW5kZXgtY2F0YWxvZy1jb250cm9sX19idG4nKS50ZXh0KCfQodCy0LXRgNC90YPRgtGMJyk7XG4gICAgfVxufSJdfQ==
