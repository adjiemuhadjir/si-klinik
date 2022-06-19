// $(".modal-agenda").on("click", function () {
//   var id = $(this).data("id");
//   // console.log("ID: " + id);
//   $.ajax({
//     type: "GET",
//     url: "/agenda/selengkapnya/" + id,
//     dataType: "JSON",
//     success: function (data) {
//       // var result = JSON.parse(data);
//       // console.log(data);
//       $("#exampleModalLongTitle").text(data.judul);
//       $("#agenda-img").attr("src", "foto_agenda/" + data.foto);
//       $("#body-agenda").text(data.body);
//       // $("#tanggal-agenda").text("Tanggal : " + data.tanggal);
//       $("#lokasi-agenda").text("Lokasi : " + data.lokasi);
//       //   $("#exampleModal").modal("show");
//       $("#exampleModal").modal("toggle");
//     },
//     error: function (data) {
//       alert("error");
//     },
//   });
// });

$(".close").on("click", function () {
  $("#exampleModal").modal("toggle");
});

// Detail Agenda
$(".agenda-admin").on("click", function () {
  var id = $(this).data("id");
  // console.log("ID: " + id);
  $.ajax({
    type: "GET",
    url: "/agenda/selengkapnya/" + id,
    dataType: "JSON",
    success: function (data) {
      // var result = JSON.parse(data);
      var wrapper = document.createElement("div");
      wrapper.innerHTML = data.body;
      $("#body-agenda").text("");
      document.getElementById("body-agenda").appendChild(wrapper);
      $("#exampleModalLongTitle").text(data.judul);
      $("#agenda-img").attr("src", "foto_agenda/" + data.foto);
      // $("#tanggal-agenda").text("Tanggal : " + data.tanggal);
      $("#lokasi-agenda").text("Lokasi : " + data.lokasi);
      //   $("#exampleModal").modal("show");
      $("#modalAgendaAdmin").modal("toggle");
    },
    error: function (data) {
      alert("error");
    },
  });
});

$(".closeAgenda").on("click", function () {
  $("#modalAgendaAdmin").modal("toggle");
});
// End Detail Agenda

// Modal Edit Agenda
$(".edit-agenda").on("click", function () {
  var id = $(this).data("id");
  // console.log("ID: " + id);
  $.ajax({
    type: "GET",
    url: "/agenda/selengkapnya/" + id,
    dataType: "JSON",
    success: function (data) {
      // var result = JSON.parse(data);
      var m = new Date(data.tanggal.toString().split("GMT")[0] + " UTC")
        .toISOString()
        .split(".")[0];
      // console.log(data.body);
      $("#edit_agenda").attr("action", "/agenda/" + data.id);
      $("#edit-judul").attr("value", data.judul);
      $("#edit-img").attr("src", "foto_agenda/" + data.foto);
      $("#edit-deskripsi").attr("value", data.body);
      $("#edit-tanggal").attr("value", m);
      $("#edit-lokasi").attr("value", data.lokasi);
      // $("#exampleModal").modal("show");
      $("#modalEditAgenda").modal("toggle");
    },
    error: function (data) {
      alert("error");
    },
  });
});

$(".closeEdit").on("click", function () {
  $("#modalEditAgenda").modal("toggle");
});
// End Modal Edit Agenda

// Detail Berita
$(".berita-admin").on("click", function () {
  var id = $(this).data("id");
  // console.log("ID: " + id);
  $.ajax({
    type: "GET",
    url: "/berita/selengkapnya/" + id,
    dataType: "JSON",
    success: function (data) {
      // var result = JSON.parse(data);
      var wrapper = document.createElement("div");
      wrapper.innerHTML = data.body;
      $("#body-berita").text("");
      document.getElementById("body-berita").appendChild(wrapper);
      var tanggal = new Date(data.updated_at);
      $("#exampleModalLongTitle").text(data.judul);
      $("#berita-img").attr("src", "foto_berita/" + data.foto);
      // $("#body-berita").text(data.body);
      $("#tanggal-berita").text("Tanggal Update: " + tanggal.toLocaleString());
      $("#lokasi-berita").text("Lokasi : " + data.lokasi);
      //   $("#exampleModal").modal("show");
      $("#modalBeritaAdmin").modal("toggle");
    },
    error: function (data) {
      alert("error");
    },
  });
});

$(".closeBerita").on("click", function () {
  $("#modalBeritaAdmin").modal("toggle");
});
// End Detail Agenda

// Modal Edit Berita
$(".edit-berita").on("click", function () {
  var id = $(this).data("id");
  // console.log("ID: " + id);
  $.ajax({
    type: "GET",
    url: "/berita/selengkapnya/" + id,
    dataType: "JSON",
    success: function (data) {
      // var result = JSON.parse(data);
      // var m = new Date(data.tanggal.toString().split("GMT")[0] + " UTC")
      //   .toISOString()
      //   .split(".")[0];
      // console.log(data);
      $("#edit_berita").attr("action", "/berita/" + data.id);
      $("#edit-judul").attr("value", data.judul);
      $("#edit-img").attr("src", "foto_berita/" + data.foto);
      $("#edit-deskripsi").text(data.body);
      // $("#edit-tanggal").attr("value", m);
      $("#edit-lokasi").attr("value", data.lokasi);
      // $("#exampleModal").modal("show");
      $("#modalEditBerita").modal("toggle");
    },
    error: function (data) {
      alert("error");
    },
  });
});

$(".closeEdit").on("click", function () {
  $("#modalEditBerita").modal("toggle");
});
// End Modal Edit Agenda

$(".detail-anggota").on("click", function () {
  var id = $(this).data("id");
  // console.log("ID: " + id);
  $.ajax({
    type: "GET",
    url: "user/" + id + ")",
    dataType: "JSON",
    success: function (data) {
      // var result = JSON.parse(data);
      var jk = "";
      if (data.jenis_kelamin == "L") {
        var jk = "Laki-laki";
      } else {
        var jk = "Perempuan";
      }

      var foto = "default.png";
      if (data.foto) {
        var foto = data.foto;
      } else {
      }

      // console.log(data);
      //validasi pendaftar
      $("#validasi_pendaftar").attr(
        "action",
        "/update/" + data.id + "/validasi"
      );
      //end

      $("#namaAnggota").text(": " + data.nama);
      $("#nikAnggota").text(": " + data.nik);
      $("#jenisKelaminAnggota").text(": " + jk);
      $("#noHpAnggota").text(": " + data.no_hp);
      $("#emailAnggota").text(": " + data.email);
      $("#alamatAnggota").text(": " + data.alamat);
      $("#rtAnggota").text(": " + data.rt);
      $("#rwAnggota").text(": " + data.rw);
      $("#kotaAnggota").text(": " + data.kota);
      $("#kecamatanAnggota").text(": " + data.kecamatan);
      $("#desaAnggota").text(": " + data.desa);
      $("#kegiatanSosialAnggota").text(": " + data.kegiatan_sosial);
      $("#pekerjaanAnggota").text(": " + data.pekerjaan);
      $("#hobiAnggota").text(": " + data.hobi);
      $("#fotoAnggota").attr("src", "foto_user/" + foto);
      // $("#body-agenda").text(data.body);
      // $("#tanggal-agenda").text("Tanggal : " + data.tanggal);
      // $("#lokasi-agenda").text("Lokasi : " + data.lokasi);
      //   $("#exampleModal").modal("show");
      $("#modalDetailAnggota").modal("toggle");
    },
    error: function (data) {
      alert("error");
    },
  });
});

$(".closeAnggota").on("click", function () {
  $("#modalDetailAnggota").modal("toggle");
});
// End Detail Agenda

$(".detail-gallery").on("click", function () {
  var id = $(this).data("id");
  //   console.log("ID: " + id);
  $.ajax({
    type: "GET",
    url: "/gallery/selengkapnya/" + id,
    dataType: "JSON",
    success: function (data) {
      //   var result = JSON.parse(data);
      //   console.log(data);

      $("#fotoGallery").attr("src", "foto_gallery/" + data.foto);
      $("#modalDetailGallery").modal("toggle");
    },
    error: function (data) {
      alert("error");
    },
  });
});

$(".closeGallery").on("click", function () {
  $("#modalDetailGallery").modal("toggle");
});
