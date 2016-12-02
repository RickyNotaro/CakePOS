var OutletApp = {};

(function(){
  OutletApp.getoutlets = function() { $.get('sales-outlets/get.json', function(response) {
    $label = $('#incomplete-label');
    $incompleteDiv = $('#incomplete-outlets');
    $incompleteDiv.empty();
    if (response.salesOutlet.length === 0) {
      $label.hide();
      $incompleteDiv.append('<div class="incomplete-outlet">All done. Have a nice day (or add a new to-do above).</div>');
    } else {
      $label.show();
      $.each(response.salesOutlet, function(key, value) {
        $incompleteDiv.append('<div class="incomplete-outlet" id="incomplete-' + value.id + '">' +
                            '<input id="outletText_' + value.id + '" class="form-control no-border" value="' + value.sales_outlet_name + '" type="text" readonly> ' +
                            '<button name="edit" id="outletEdit_' + value.id + '" class="form-control btn-xs" type="button">Edit</button>' +
                            '<button name="delete" id="outletDelete_' + value.id + '" class="form-control btn-xs" type="button">Delete</button>' +
                            '</label></div>');
        $incompleteDiv.show('highlight');
      });
    }
  });
};

OutletApp.editTask = function (id) {
        var btnLabel = $("#outletEdit_" + id).html();
        if (btnLabel == "Edit") {
            $("#outletText_" + id).attr("readOnly", false);
            $("#outletEdit_" + id).text("Ok");
        } else {
            $("#outletText_" + id).attr("readOnly", true);
            $("#outletEdit_" + id).text("Edit");

            sales_outlet_name = $("#outletText_" + id).val();

            var posting = $.post('sales-outlets/edit.json', {
                sales_outlet_name: sales_outlet_name,
                id: id
            });
            posting.done(function (response) {
                if (response.response.result == 'success') {
                    $('#incomplete-outlets').empty();
                    $('#inputLarge').val('');
                    OutletApp.getoutlets();
                } else if (response.response.result == 'fail') {
                    $('.form-group').addClass('has-error');
                    $('#task-input').append('<div class="error" id="outlet-error">' + response.response.error.salesOutlet + '</div>');
                }
            });
        }

    };

    OutletApp.deleteTask = function (id) {
            var btnLabel = $("#outletDelete" + id).html();
            if (btnLabel == "Delete") {
                $("#outletText_" + id).attr("readOnly", false);
                $("#outletDelete_" + id).text("Ok");
            } else {
                $("#outletText_" + id).attr("readOnly", true);
                $("#outletDelete_" + id).text("Delete");

                sales_outlet_name = $("#outletText_" + id).val();

                var posting = $.post('sales-outlets/delete.json', {
                    id: id,
                    sales_outlet_name: sales_outlet_name
                });
                posting.done(function (response) {
                    if (response.response.result == 'success') {
                        $('#incomplete-outlets').empty();
                        $('#inputLarge').val('');
                        OutletApp.getoutlets();
                    } else if (response.response.result == 'fail') {
                        $('.form-group').addClass('has-error');
                        $('#task-input').append('<div class="error" id="outlet-error">' + response.response.error.salesOutlet + '</div>');
                    }
                });
            }

        };


})();

(function($) {
  $("#add-to-do").submit(function(event) {
    $('#outlet-error').remove();
    $('.form-group').removeClass('has-error');
    var $form = $(this),
      sales_outlet_name = $form.find("input[name='sales_outlet_name']").val(),
      url = $form.attr('action');

    var posting = $.post( url, { sales_outlet_name : sales_outlet_name } );
    posting.done(function( response ) {
      if (response.response.result == 'success') {
        $('#incomplete-outlets').empty();
        $('#inputLarge').val('');
        OutletApp.getoutlets();
      } else if (response.response.result == 'fail') {
        $('.form-group').addClass('has-error');
        $('#task-input').append('<div class="error" id="outlet-error">' + response.response.error.outlet + '</div>');
      }
    });
    event.preventDefault();
  });


  $(document).on('click', ':button', function () {
          if ($(this).attr('name') === 'edit') {
              var id = $(this).attr('id').replace('outletEdit_', '');
                OutletApp.editTask(id);
          } else if ($(this).attr('name') === 'delete') {
            var id = $(this).attr('id').replace('outletDelete_', '');
              OutletApp.deleteTask(id);
          }


      });
  OutletApp.getoutlets();
})(jQuery);
