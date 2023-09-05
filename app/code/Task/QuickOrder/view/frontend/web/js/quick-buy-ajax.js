require([
    "jquery",
    "Magento_Ui/js/modal/modal"
],function($, modal) {
    $(document).ready(function () {
        var options = {
            type: 'popup',
            responsive: true,
            title: 'Enter phone number',
            buttons: [{
                text: $.mage.__('Ok'),
                class: '',
                click: function (e) {
                    var phoneNumber = $("#quickBuyPhoneNumber").val();
                    var validPhoneNumber = validatePhoneNumber(phoneNumber)

                    function validatePhoneNumber(phoneNumber) {
                        var re = /^[\+]\d{2}[-]\d{3}[-]\d{3}[-]\d{2}[-]\d{2}/;
                        return re.test(phoneNumber);
                    }

                    let formData = new FormData($('form#product_addtocart_form')[0]);
                    formData.append('phoneNumber', $("#quickBuyPhoneNumber").val());
                    let url = $("#quickBuyPhoneNumber").attr('action');
                    if (validPhoneNumber) {
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: formData,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                        }).done(function (data) {
                            console.log(data);
                        });
                        this.closeModal();
                    } else {
                        $('strong').remove()
                        $('.modal-footer button').before('<strong>Please check if phone number is correct  </strong>')
                    }
                }
            }]
        };
        modal(options, $('#quick-buy-modal'));
        $("#quick-buy").click(function () {
            $('#quick-buy-modal').modal('openModal');
        });
    });
});
