$(document).ready(function () {
  'use strict';
  if ($(window).width() > 300) {

    $('#body').each(function () {

      var themeOption = $(`<div class="theme-option">
			<div class="right-sidebar-2">
			<div class="tools-sidebar-overlay"></div>
        <div class="right-sidebar-container-2">
          <div class="slim-scroll-right-sidebar-2">

            <div class="right-sidebar-2-header">
              <h2>SETTINGS</h2>
              <p>Layout Preview Settings</p>
              <div class="btn-close-right-sidebar-2">
                <i class="mdi mdi-window-close"></i>
              </div>
            </div>

            <div class="right-sidebar-2-body" data-simplebar>
              <span class="right-sidebar-2-subtitle">Header Layout</span>
              <div class="no-col-space">
                <a href="javascript:void(0);" class="btn-right-sidebar-2 header-fixed-to btn-right-sidebar-2-active">Fixed</a>
                <a href="javascript:void(0);" class="btn-right-sidebar-2 header-static-to">Static</a>
              </div>

              <span class="right-sidebar-2-subtitle">Sidebar Layout</span>
              <div class="no-col-space">
                <select class="right-sidebar-2-select" id="sidebar-option-select">
                  <option value="sidebar-fixed">Fixed Default</option>
                  <option value="sidebar-fixed-minified">Fixed Minified</option>
                  <option value="sidebar-fixed-offcanvas">Fixed Offcanvas</option>
                  <option value="sidebar-static">Static Default</option>
                  <option value="sidebar-static-minified">Static Minified</option>
                  <option value="sidebar-static-offcanvas">Static Offcanvas</option>
                </select>
              </div>

              <span class="right-sidebar-2-subtitle">Header Background</span>
              <div class="no-col-space">
                <a href="javascript:void(0);" class="btn-right-sidebar-2 btn-right-sidebar-2-active header-light-to">Light</a>
                <a href="javascript:void(0);" class="btn-right-sidebar-2 header-dark-to">Dark</a>
              </div>

              <span class="right-sidebar-2-subtitle">Navigation Background</span>
              <div class="no-col-space">
                <a href="javascript:void(0);" class="btn-right-sidebar-2 btn-right-sidebar-2-active sidebar-light-to">Light</a>
                <a href="javascript:void(0);" class="btn-right-sidebar-2 sidebar-dark-to">Dark</a>
              </div>

              <span class="right-sidebar-2-subtitle">Spacing Layout</span>
              <div class="no-col-space">
                <a href="javascript:void(0);" class="btn-right-sidebar-2 btn-right-sidebar-2-active default-spacing-to">Default</a>
                <a href="javascript:void(0);" class="btn-right-sidebar-2 compact-spacing-to">Compact</a>
              </div>
              <div class="d-flex justify-content-center">
                <div id="reset-options" style="width: auto; cursor: pointer" class="btn-right-sidebar-2 btn-reset">Reset
                  Settings</div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>`);
      $('#body').prepend(themeOption);
    });
  }

  // Store object for local storage data
  var activeModule = {
    headerType: "header-fixed",
    headerBackground: "header-light",
    navigationType: "sidebar-fixed",
    navigationBackground: "sidebar-light",
    direction: "ltr"
  }

  /**
   * Get local storage value
   */
  function getModule() {
    return JSON.parse(localStorage.getItem("optionsObject"))
  }

  /**
   * Set local storage property value
   */
  function setModule(propertyName, propertyValue) {

    //Store in local storage
    var optionsCopy = Object.assign({}, activeModule);
    optionsCopy[propertyName] = propertyValue

    //Store in local storage
    localStorage.setItem("optionsObject", JSON.stringify(optionsCopy));
  }

  if (getModule() != null) {
    activeModule = getModule()
  } else {
    localStorage.setItem("optionsObject", JSON.stringify(activeModule));
  }

  /**
   * Clear local storage
   */
  function resetModule() {
    localStorage.removeItem("optionsObject");
  }

  // Set localstorage value to variable
  if (getModule() != null) {
    activeModule = getModule()
  } else {
    localStorage.setItem("optionsObject", JSON.stringify(activeModule));
  }

  // Layout settings visible
  $(document).on("click", ".right-sidebar-in", function (e) {
    jQuery('.right-sidebar-container-2').addClass('right-sidebar-2-visible');
    $(".tools-sidebar-overlay").fadeIn();
  });

  // THEME OPTION CLOSE BUTTON
  $(document).on("click", ".btn-close-right-sidebar-2", function (e) {
    jQuery('.right-sidebar-container-2').removeClass('right-sidebar-2-visible');
    $(".tools-sidebar-overlay").fadeOut();
  })

  // THEME OPTION CLOSE with overlay
  $(document).on("click", ".tools-sidebar-overlay", function (e) {
    jQuery('.right-sidebar-container-2').removeClass('right-sidebar-2-visible');
    $(".tools-sidebar-overlay").fadeOut();
  })

  //VARIABLE
  var body = jQuery('#body');
  var header_static = jQuery('.header-static-to');
  var header_fixed = jQuery('.header-fixed-to');



  //NAVBAR OPTION
  header_static.click(function () {
    'use strict';
    jQuery(this).addClass('btn-right-sidebar-2-active');
    header_fixed.removeClass('btn-right-sidebar-2-active');
    body.removeClass('header-fixed')
    body.addClass('header-static')

    //Store in local storage
    setModule("headerType", "header-static")
  });

  //Click for current options
  if (activeModule.headerType === "header-static") {
    header_static.trigger("click")
  }

  header_fixed.click(function () {
    'use strict';
    jQuery(this).addClass('btn-right-sidebar-2-active');
    header_static.removeClass('btn-right-sidebar-2-active');
    body.removeClass('header-static')
    body.addClass('header-fixed')
    //Store in local storage
    setModule("headerType", "header-fixed")
  });

  //Click for current options
  if (activeModule.headerType === "header-fixed") {
    header_fixed.trigger("click")
  }

  // SIDEBAR OPTION

  if ($(window).width() > 300) {
    $('#sidebar-option-select').change(function () {
      'use strict';
      var optionSelected = $(this).find("option:selected");
      var valueSelected = optionSelected.val();

      if (valueSelected === "sidebar-fixed") {
        body.removeClass('sidebar-fixed-offcanvas sidebar-static sidebar-static-offcanvas sidebar-collapse sidebar-collapse-out sidebar-minified sidebar-minified-out').addClass('sidebar-fixed')
        window.isMinified = false; // Because It is not minified (aka it is opened)
        window.isCollapsed = false;

        //Store in local storage
        setModule("navigationType", "sidebar-fixed")
      }

      if (valueSelected === "sidebar-fixed-minified") {
        body.removeClass('sidebar-fixed-offcanvas sidebar-static sidebar-static-offcanvas sidebar-collapse sidebar-collapse-out sidebar-minified sidebar-minified-out').addClass('sidebar-fixed sidebar-minified')
        window.isMinified = true; // Because It is  minified
        window.isCollapsed = false;

        //Store in local storage
        setModule("navigationType", "sidebar-fixed-minified")
      }



      if (valueSelected === "sidebar-fixed-offcanvas") {
        body.removeClass('sidebar-static sidebar-static-offcanvas sidebar-collapse-out sidebar-minified sidebar-minified-out sidebar-fixed').addClass('sidebar-fixed-offcanvas sidebar-collapse')
        window.isCollapsed = true;
        window.isMinified = false;

        //Store in local storage
        setModule("navigationType", "sidebar-fixed-offcanvas")
      }

      if (valueSelected === "sidebar-static") {
        body.removeClass('sidebar-fixed-offcanvas sidebar-static-offcanvas sidebar-collapse sidebar-collapse-out sidebar-minified-out sidebar-fixed').addClass('sidebar-static')
        window.isMinified = false;
        window.isCollapsed = false;

        //Store in local storage
        setModule("navigationType", "sidebar-static")
      }

      if (valueSelected === "sidebar-static-minified") {
        body.removeClass('sidebar-fixed-offcanvas sidebar-static-offcanvas sidebar-collapse sidebar-collapse-out sidebar-minified-out sidebar-fixed').addClass('sidebar-static sidebar-minified')
        window.isMinified = true;
        window.isCollapsed = false;

        //Store in local storage
        setModule("navigationType", "sidebar-static-minified")
      }

      if (valueSelected === "sidebar-static-offcanvas") {
        body.removeClass('sidebar-fixed-offcanvas sidebar-static sidebar-collapse-out sidebar-minified sidebar-minified-out sidebar-fixed').addClass('sidebar-static-offcanvas sidebar-collapse');
        window.isCollapsed = true;
        window.isMinified = false;

        //Store in local storage
        setModule("navigationType", "sidebar-static-offcanvas")
      }
    });


    // Trigger Change for current options
    if (activeModule.navigationType === "sidebar-fixed") {
      $('#sidebar-option-select').val('sidebar-fixed').change();
    }
    if (activeModule.navigationType === "sidebar-fixed-minified") {
      $('#sidebar-option-select').val('sidebar-fixed-minified').change();
    }
    if (activeModule.navigationType === "sidebar-fixed-offcanvas") {
      $('#sidebar-option-select').val('sidebar-fixed-offcanvas').change();
    }
    if (activeModule.navigationType === "sidebar-static") {
      $('#sidebar-option-select').val('sidebar-static').change();
    }
    if (activeModule.navigationType === "sidebar-static-minified") {
      $('#sidebar-option-select').val('sidebar-static-minified').change();
    }
    if (activeModule.navigationType === "sidebar-static-offcanvas") {
      $('#sidebar-option-select').val('sidebar-static-offcanvas').change();
    }
  }



  // Header Background
  var header_dark = jQuery('.header-dark-to');
  var header_light = jQuery('.header-light-to');

  header_dark.click(function () {
    'use strict';
    jQuery(this).addClass('btn-right-sidebar-2-active');
    header_light.removeClass('btn-right-sidebar-2-active');
    body.removeClass('header-light').addClass('header-dark');

    //Store in local storage
    setModule("headerBackground", "header-dark")
  });

  //Click for current options
  if (activeModule.headerBackground === "header-dark") {
    header_dark.trigger("click");
  }

  header_light.click(function () {
    'use strict';
    jQuery(this).addClass('btn-right-sidebar-2-active');
    header_dark.removeClass('btn-right-sidebar-2-active');
    body.removeClass('header-dark').addClass('header-light');

    //Store in local storage
    setModule("headerBackground", "header-light")
  });

  //Click for current options
  if (activeModule.headerBackground === "header-light") {
    header_light.trigger("click")
  }

  // Sidebar Background
  var sidebar_dark = jQuery('.sidebar-dark-to');
  var sidebar_light = jQuery('.sidebar-light-to');

  sidebar_light.click(function () {
    'use strict';
    jQuery(this).addClass('btn-right-sidebar-2-active');
    sidebar_dark.removeClass('btn-right-sidebar-2-active');
    body.removeClass('sidebar-dark').addClass('sidebar-light');

    //Store in local storage
    setModule("navigationBackground", "sidebar-light")
  });

  //Click for current options
  if (activeModule.navigationBackground === "sidebar-light") {
    sidebar_light.trigger("click")
  }

  sidebar_dark.click(function () {
    'use strict';
    jQuery(this).addClass('btn-right-sidebar-2-active');
    sidebar_light.removeClass('btn-right-sidebar-2-active');
    body.removeClass('sidebar-light').addClass('sidebar-dark');

    //Store in local storage
    setModule("navigationBackground", "sidebar-dark")
  });

  //Click for current options
  if (activeModule.navigationBackground === "sidebar-dark") {
    sidebar_dark.trigger("click")
  }

  // Spacing Layout
  var default_spacing = jQuery('.default-spacing-to');
  var compact_spacing = jQuery('.compact-spacing-to');

  default_spacing.click(function () {
    'use strict';
    jQuery(this).addClass('btn-right-sidebar-2-active');
    compact_spacing.removeClass('btn-right-sidebar-2-active');
    body.removeClass('compact-spacing');

    //Store in local storage
    setModule("navigationSpacing", default_spacing)
  });

  //Click for current options
  if (activeModule.navigationSpacing === default_spacing) {
    default_spacing.trigger("click")
  }

  compact_spacing.click(function () {
    'use strict';
    jQuery(this).addClass('btn-right-sidebar-2-active');
    default_spacing.removeClass('btn-right-sidebar-2-active');
    body.addClass('compact-spacing');

    //Store in local storage
    setModule("navigationSpacing", "compact-spacing")
  });

  //Click for current options
  if (activeModule.navigationSpacing === "compact-spacing") {
    compact_spacing.trigger("click")
  }

  $('#reset-options').click(function () {
    resetModule();
    location.reload();
  });

});