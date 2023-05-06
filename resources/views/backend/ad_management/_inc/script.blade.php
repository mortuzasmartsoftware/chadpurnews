<script>
    //Function of load image size serial wise
    function loadSerialWiseImageSizes() {

        let image = $('#image-size')
        image.empty()
        // image.append('Maximum image size: ')
        let sl = document.getElementById('sl-no').value;
        console.log(sl);
        sl = sl - 1;
        $.get("/get-serial-num", function (data) {
            $(data).each(function (index, item) {
                switch (item.ads_serial[sl]) {
                    case 1:
                    case 2:
                        image.append('<span> *Input image size must be 390 X 150 </span>')
                        break;
                    case 3:
                    case 4:
                    case 5:
                        image.append('<span> *Input image size must be 360 X 260 </span>')
                        break;
                    case 6:
                    case 9:
                    case 10:
                        image.append('<span> *Input image size must be 750 X 100 </span>')
                        break;
                    case 7:
                    case 8:
                        image.append('<span> *Input image size must be 360 X 280 </span>')
                        break;
                    default:
                        image.append("<span>*Input image size must be (Acording to the Position of this Ads)</span>")
                        break;
                }
            })
        })
    }

    // Funtion of get Serial Position/Page name wise from placements table
    function loadPositionSerialId(object) {

        let positionId = $(object).val();
        // console.log(positionId);

        let sl_name = $('.filter-serial');
        sl_name.empty();
        sl_name.append('<option value="">-Select a Serial-</option>');

        $.get("/get-serial-id", {position_id: positionId}, function (data, status) {
            // console.log(data);
            $(data).each(function (index, item) {
                sl_name.append('<option value="' + item.ads_serial.id + '">' + item.ads_serial.serial_name + '</option>')

            });
        });
    }

</script>
