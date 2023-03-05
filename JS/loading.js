$(window)
  .load(function () {
      setTimeout(function () {
          $('.loading-container')
              .addClass('loading-inactive');
              /*in production, remove this line*/
              $("#loading-text").addClass('text-success').html('page loaded');
      }, 8000);//in production change 8000 to 0
  }); 