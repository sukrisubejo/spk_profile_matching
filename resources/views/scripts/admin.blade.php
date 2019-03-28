<script type="text/javascript">
    $('select[name="negara"]').change(function () {
        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: "GET",
                url: "{{url('state')}}?id_aspek=" + countryID,
                success: function (res) {
                    if (res) {
                        $("#provinsi").empty();
                        $("#provinsi").append('<option>State List</option>');
                        $.each(res, function (key, value) {
                            $("#provinsi").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        $("#provinsi").empty();
                    }
                }
            });
        } else {
            $("#provinsi").empty();
            $("#kabupaten").empty();
            $("#kecamatan").empty();
        }
    });
    $('#provinsi').on('change', function () {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "GET",
                url: "{{url('admin/city')}}?state_id=" + stateID,
                success: function (res) {
                    if (res) {
                        $("#kabupaten").empty();
                        $("#kabupaten").append('<option>City List</option>');
                        $.each(res, function (key, value) {
                            $("#kabupaten").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        $("#kabupaten").empty();
                    }
                }
            });
        } else {
            $("#kabupaten").empty();
            $("#kecamatan").empty();
        }
    });
    $('#kabupaten').on('change', function () {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "GET",
                url: "{{url('admin/subcity')}}?city_id=" + stateID,
                success: function (res) {
                    if (res) {
                        $("#kecamatan").empty();
                        $("#kecamatan").append('<option>Sub City List</option>');
                        $.each(res, function (key, value) {
                            $("#kecamatan").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        $("#kecamatan").empty();
                    }
                }
            });
        } else {
            $("#kecamatan").empty();
        }
    });
</script>