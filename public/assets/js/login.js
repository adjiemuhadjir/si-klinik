$("#provinsi").change(function () {
    const provinsi = $(this).val();
    // console.log(provinsi);
    if (provinsi !== "") {
        $.ajax({
            type: "GET",
            url: "/kota/" + provinsi,
            dataType: "JSON",
            success: function (result) {
                $("#kota").prop("disabled", false);
                $("#kota").html("<option></option>");
                const data = $.map(result, (datas) => ({
                    id: datas.id,
                    text: datas.nama,
                }));

                $("#kota").select2({
                    placeholder: "Pilih Kota",
                    data: data,
                });
            },
            error: function (result) {
                alert("error");
            },
        });
    }
});

$("#kota").change(function () {
    const kota = $(this).val();
    console.log(kota);
    if (kota !== "") {
        $.ajax({
            type: "GET",
            url: "/kecamatan/" + kota,
            dataType: "JSON",
            success: function (result) {
                console.log(result);
                $("#kecamatan").prop("disabled", false);
                $("#kecamatan").html("<option></option>");
                const data = $.map(result, (datas) => ({
                    id: datas.id,
                    text: datas.nama,
                }));

                $("#kecamatan").select2({
                    placeholder: "Pilih Kecamatan",
                    data: data,
                });
            },
            error: function (result) {
                alert("error");
            },
        });
    }
});

$("#kecamatan").change(function () {
    const kecamatan = $(this).val();
    console.log(kecamatan);
    if (kecamatan !== "") {
        $.ajax({
            type: "GET",
            url: "/desa/" + kecamatan,
            dataType: "JSON",
            success: function (result) {
                console.log(result);
                $("#desa").prop("disabled", false);
                $("#desa").html("<option></option>");
                const data = $.map(result, (datas) => ({
                    id: datas.id,
                    text: datas.nama,
                }));

                $("#desa").select2({
                    placeholder: "Pilih Desa",
                    data: data,
                });
            },
            error: function (result) {
                alert("error");
            },
        });
    }
});

$(".form-check label,.form-radio label").append('<i class="input-helper"></i>');
