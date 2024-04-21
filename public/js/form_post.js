$('form:not([manuel])').submit(function(e){
    e.preventDefault();
    
    var this_form = $(this);
    var url = this_form.attr('action');
    var submit_btn = this_form.find('button[type="submit"]');
    var data = new FormData(this);

    submit_btn.prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ');
    submit_btn.attr('disabled','');
/*
    $.each(tinyMCE.editors,function(key,input){
        if(this_form.find(input.targetElm).length > 0) data.append(input.targetElm.name, input.getContent());
    });
*/
    this_form.find('input[money],input[type="tel"],input[yuzde]').each(function(key,val){
        val = $(this);
        var name = val.attr('name');
        data.append(name, val.inputmask('unmaskedvalue'));
    });

    $('[err-name]').html('');
    if($.isFunction(window.loading_page)) loading_page();

    $.ajax({
        url: url,
        type: "post",
        dataType: "json",
        data: data,
        processData: false,
        contentType: false,
        success:function(response){
            submit_btn.find('.spinner-border').remove();
            submit_btn.removeAttr('disabled');

            if(typeof response.success_text != "undefined")
            {
                this_form.find('[success-text]').html('<div class="alert alert-success">'+response.success_text+'</div>');
            }

            var not_reload = this_form.attr('not_reload');
            if(typeof response.redirect != "undefined" && typeof not_reload == "undefined") location.href = response.redirect;

            if(typeof not_reload != "undefined")
            {
                this_form.find('[err-name]').html('');
                this_form.find('input[type!="hidden"][type!="checkbox"][type!="radio"]').val('');
                this_form.find('textarea').val('');
                /*$.each(tinyMCE.editors,function(key,input){
                    if(this_form.find(input.targetElm).length > 0) tinyMCE.editors[key].setContent('');
                });*/

                this_form.find('select:not([not_clear]) option').prop('selected',false);
                this_form.find('select:not([not_clear])').trigger('change');
                this_form.find('input[type="checkbox"]').prop('checked',false);

                if(typeof response.data_table != "undefined" && typeof (data_tables[response.data_table]) != "undefined") data_tables[response.data_table].ajax.reload();
                if(typeof response.success_text != "undefined")
                {
                    setTimeout(() => {
                        this_form.find('[success-text]').html('');
                        this_form.parents('.modal').first().modal('hide');
                    }, 1000);
                } else
                {
                    this_form.parents('.modal').first().modal('hide');
                }
                if($.isFunction(window.loading_page)) loading_page();
            }
        },
        error:function(err){
            if($.isFunction(window.loading_page)) loading_page();

            console.log(err.responseText);
            if (err.status == 422)
            {
                $('[err-name]').html('');
                var focused = false;
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $('[err-name="'+i+'"]');
                    el.html('<div class="alert alert-danger m-2">'+error[0]+'</div>');

                    var tab =el.parents('.tab-pane').attr('id');
                    if(!focused && typeof tab != "undefined")
                    {
                        $('#'+tab+'-tab').click();
                        focused = true;
                    }

                });
            }
            submit_btn.find('.spinner-border').remove();
            submit_btn.removeAttr('disabled');
        },
        complete: function(){
            
        }
    });

});