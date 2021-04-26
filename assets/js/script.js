$(function () {

	$('.tombolEditBus').on('click', function () {
		const id = $(this).data('id');

		$.ajax({
			url: base + '/admin/getubah',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#name').val(data.name);
				$('#description').val(data.description);
				$('#image').attr('src', base + '/assets/img/' + data.image);
				$('#id').val(data.id);
			}
		})
	});

	$('.tombolTambahMenu').on('click', function () {
		$('#NewMenuModalLabel').html('Add New Menu');
		$('.modal-footer button[type=submit]').html('Add');
		$('.modal-body form').attr('action', base + '/menu');

	});

	$('.TampilEditSubmenu').on('click', function () {
		$('#NewSubmenuModalLabel').html('Edit Submenu');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + '/menu/editsub');

		const id = $(this).data('id');

		$.ajax({
			url: base + '/menu/getubahsub',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#title').val(data.title);
				$('#menu_id').val(data.menu_id);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
				$('#is_active').val(data.is_active);
				$('#id').val(data.id);
			}
		})
	});

	$('.tombolTambahSubmenu').on('click', function () {
		$('#NewSubmenuModalLabel').html('Add New Submenu');
		$('.modal-footer button[type=submit]').html('Add');
		$('.modal-body form').attr('action', base + '/menu/submenu');

	});

	$('.TampilEditRole').on('click', function () {
		$('#NewRoleModalLabel').html('Edit Role');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + '/admin/editrole');

		const id = $(this).data('id');

		$.ajax({
			url: base + '/admin/getubahrole',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#role').val(data.role);
				$('#id').val(data.id);
			}
		})
	});

	$('.tombolTambahRole').on('click', function () {
		$('#NewRoleModalLabel').html('Add New Role');
		$('.modal-footer button[type=submit]').html('Add');
		$('.modal-body form').attr('action', base + '/admin/role');

	});

	$('.addModul').on('click', function () {
		$('#modulEditLabel').html('Tambah Modul Praktikum');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', base + '/koordinator/addmodul');
		$("#filepraktikum").prop('required', true);
		$("#status").prop('checked', true).attr('checked', 'checked');
		$("#targetcheck").html('On');
	});

	$('.editModul').on('click', function () {
		$('#modulEditLabel').html('Edit Modul Praktikum');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + '/koordinator/editmodul');
		$("#filepraktikum").prop('required', false);

		const id = $(this).data('id');

		$.ajax({
			url: base + 'koordinator/geteditmodul',
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.praktikumID);
				$("#modul").val(data.name);
				$("#title").val(data.title);
				$("#desc").val(data.description);
				if (data.status == 1) {
					$("#status").prop('checked', true).attr('checked', 'checked');
					$("#targetcheck").html('On');
				} else {
					$("#status").prop('checked', false).removeAttr('checked');
					$("#targetcheck").html('Off');
				}
			}
		});

		$('#status').on('change', function () {
			if ($("#status").is(":checked")) {
				$("#targetcheck").html('On');
			} else {
				$("#targetcheck").html('Off');
			}
		});
	});

	$('.tambahFileBuku').on('click', function () {
		$('#fileBukuEditLabel').html('Tambah Kelengkapan Buku');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', base + '/koordinator/addfilebuku');
	});

	$('.editFileBuku').on('click', function () {
		$('#fileBukuEditLabel').html('Edit Kelengkapan Buku');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + '/koordinator/editfilebuku');

		const id = $(this).data('id');

		$.ajax({
			url: base + 'koordinator/geteditfilebuku',
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$('#namafile').val(data.name);
				$('#id').val(data.id);
			}
		});
	});

	$('.tambahkelompok').on('click', function () {
		$('#kelompokEditLabel').html('Tambah Kelompok');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', base + '/koordinator/addkelompok');
	});

	$('#kelompok').on('keyup', function () {
		let namakelompok = $(this);
		$.ajax({
			url: base + 'koordinator/checknamakelompok',
			data: {
				namakelompok: namakelompok.val()
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				if (data === 'ada') {
					namakelompok.addClass('is-invalid');
					namakelompok.removeClass('is-valid');
					$('#submit').prop('disabled', true);
				} else {
					namakelompok.removeClass('is-invalid');
					namakelompok.addClass('is-valid');
					$('#submit').prop('disabled', false);
				}
			},
		});
	});

	$('.editkelompok').on('click', function () {
		$('#kelompokEditLabel').html('Detail Kelompok');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + '/koordinator/editkelompok');
		$("#submitKelompok").prop('disabled', false);

		const id = $(this).data('id');
		const list = listpraktikan();

		$.ajax({
			url: base + 'koordinator/getdetailkelompok',
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$('#kelompok').val(data[0].kelompok);
				$('#id').val(data[0].kelompokID);
				$('#year').val(data[0].year);
				$('#term').val(data[0].term);
				$('#status').val(data[0].status);
				let html = "";
				$.each(data, function (i, data) {
					if (data.name == null) {
						return true;
					}
					html += '<div class="form-row mt-2" id="anggota[' + i + ']">';
					html += '<div class="col-11 jumlah">';

					html += '<select class="form-control selectpicker" onchange="cekanggota(' + i + ')" name="nrp[' + i + ']" id="nrp[' + i + ']" data-live-search="true" required>';
					$.each(list, function (key, data2) {
						html += '<option data-tokens="' + data2.nrp + '" value="' + data2.nrp + '"';
						if (data.nrp == data2.nrp) {
							html += 'selected';
						}
						html += '>' + data2.nrp + ' - ' + data2.name + '</option>';
					});
					html += '</select>';
					html += '<small id="valid-feedback[' + i + ']" class="text-success" hidden>Praktikan tersedia</small>';
					html += '<small id="invalid-feedback[' + i + ']" class="text-danger invalid" hidden>Praktikan sudah menjadi anggota kelompok lain</small>';
					html += '</div>';
					html += '<div class="col">';
					html += '<a href="#" class="btn btn-danger align-middle" onclick="hapus(' + i + ')"><i class="fas fa-trash-alt"></i></a>';
					html += '</div>';
					html += '</div>';
				});
				$("#anggota").html(html);
				$('.selectpicker').selectpicker();
			},
		});
	});

	$('#addAnggota').on('click', function () {
		const list = listpraktikan();
		const jumlahanggota = $("#anggota .jumlah").length;
		let html = '';
		html += '<div class="form-row mt-2 " id="anggota[' + jumlahanggota + ']">';

		html += '<div class="col-11 jumlah">';

		html += '<select class="form-control selectAsistenFP selectpicker" onchange="cekanggota(' + jumlahanggota + ')" name="nrp[' + jumlahanggota + ']" id="nrp[' + jumlahanggota + ']" data-live-search="true" required>';
		html += '<option data-tokens="" value=""></option>';
		$.each(list, function (i, data) {
			html += '<option data-tokens="' + data.nrp + '" value="' + data.nrp + '">' + data.nrp + ' - ' + data.name + '</option>';
		});
		html += '</select>';
		html += '<small id="valid-feedback[' + jumlahanggota + ']" class="text-success" hidden>Praktikan tersedia</small>';
		html += '<small id="invalid-feedback[' + jumlahanggota + ']" class="text-danger invalid" hidden>Praktikan sudah menjadi anggota kelompok lain</small>';
		html += '</div>';
		html += '<div class="col">';
		html += '<a href="#" class="btn btn-danger align-middle" onclick="hapus(' + jumlahanggota + ')"><i class="fas fa-trash-alt"></i></a>';
		html += '</div>';
		html += '</div>';
		$("#anggota").append(html);
		$('.selectpicker').selectpicker();
	});

	$('.editAsisten').on('click', function () {
		const kelompok = $(this).data('kelompok');
		const modul = $(this).data('modul');
		$("#finalproject").hide();
		$("#praktikum").show();
		$(".selectAsistenFP").prop('required', false);
		$("#nrp_asisten").prop('required', true);
		$('.modal-body form').attr('action', base + '/koordinator/editasisten');

		const list = listasisten();
		console.log(list);
		let html = '';
		html += '<div class="form-group mt-2">';
		html += '<select class="form-control selectpicker" name="nrp" id="nrp_asisten" data-live-search="true" required>';
		html += '<option data-tokens=""></option>'
		$.each(list, function (i, data) {
			html += '<option data-tokens="' + data.nrp + '" value="' + data.nrp + '">' + data.nrp + ' - ' + data.name + '</option>';
		});
		$("#praktikum").html(html);

		$.ajax({
			url: base + 'koordinator/getdetailkelompok_asisten',
			data: {
				kelompok: kelompok,
				modul: modul
			},
			method: "post",
			dataType: "json",
			async: false,
			success: function (data) {
				console.log(data);
				$("#id").val(data.praktikumID);
				$("#modul").val(data.modul);
				$("#kelompok").val(data.kelompok);
				if (data.asisten) {
					$("#nrp_asisten").val(data.nrp);
					console.log($("#nrp_asisten").val());
				} else {
					$("#nrp_asisten").val("");
				}
			},
			error: function (data) {
				console.log(data);
			}
		});
		$(".selectpicker").selectpicker();
	});

	$('.editAsistenFP').on('click', function () {
		const kelompok = $(this).data('kelompok');
		const modul = $(this).data('modul');
		$("#finalproject").show();
		$("#praktikum").hide();
		$(".selectAsistenFP").prop('required', true);
		$("#nrp_asisten").prop('required', false);
		$('.modal-body form').attr('action', base + '/koordinator/editasistenFP');
		const asisten = listasisten();
		let html = '';
		for (let i = 0; i < 3; i++) {
			html += '<div class="form-group mt-2">';
			html += '<select class="form-control selectAsistenFP selectpicker" name="nrpAsisten[' + i + ']" id="nrpAsisten[' + i + ']" data-live-search="true" required>';
			html += '<option data-tokens=""></option>';
			$.each(asisten, function (key, value) {
				html += '<option data-tokens="' + value.nrp + '" value="' + value.nrp + '">' + value.name + '</option>';
			});
			html += '</select>';
			html += '</div>';
		}
		$("#finalproject").html(html);
		$.ajax({
			url: base + 'koordinator/getdetailkelompok_asistenFP',
			data: {
				kelompok: kelompok,
				modul: modul
			},
			method: "post",
			dataType: "json",
			async: false,
			success: function (data) {
				if (data.length == undefined) {
					$("#id").val(data.praktikumID);
					$("#modul").val(data.modul);
					$("#kelompok").val(data.kelompok);
					$("#nrp_asisten").val("");
					$("#nama").val("");
					if (data.asisten) {
						$.each(data, function (i, data) {
							let target = document.getElementById("nrpAsisten[" + i + "]");
							$(target).val(data.nrp);
						});
					}
				} else {
					$("#id").val(data[0].praktikumID);
					$("#modul").val(data[0].modul);
					$("#kelompok").val(data[0].kelompok);
					$("#nrp_asisten").val("");
					$("#nama").val("");
					if (data[0].asisten) {
						$.each(data, function (i, data) {
							let target = document.getElementById("nrpAsisten[" + i + "]");
							$(target).val(data.nrp);
						});
					}
				}
			},
			error: function (data) {
				console.log(data);
			}
		});
		$(".selectpicker").selectpicker();
	});


	$(".tambahSesi").on('click', function () {
		$('#sesiEditLabel').html('Tambah Jadwal');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', base + '/koordinator/addsesi');
		$("#praktikumID").prop('disabled', false);
		$("#praktikumID2").prop('disabled', true);
	});

	$(".editSesi").on('click', function () {
		$('#sesiEditLabel').html('Edit Jadwal');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + '/koordinator/editsesi');
		$("#praktikumID").prop('disabled', true);
		$("#praktikumID2").prop('disabled', false);

		const id = $(this).data('id');
		$.ajax({
			url: base + '/koordinator/geteditsesi',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$("#id").val(data.dateID);
				$("#praktikumID2").val(data.praktikumID);
				$("#praktikumID").val(data.praktikumID);

				$("#date").val(data.date.replace(" ", "T"));
				$("#ket").val(data.ket);
			}
		});
	});

	$(".showtable").on('change', function () {
		const show = $(this).val();
		$(".showed").hide();
		$("#" + show).show();
		$('.showtable').val(show);
	});

	$(".tambahJadwalKelompok").on('click', function () {
		$('#jadwalKelompokEditLabel').html('Tambah Jadwal Kelompok');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', base + '/koordinator/addjadwalkelompok');
		$("#kelompokID").prop('disabled', false);
		$("#jadwalkelompokID").prop('disabled', true);
		$("#IDpraktikum").prop('disabled', false);
		let cek = cekjadwal($("#IDpraktikum").val(), $("#kelompokID").val());
		if (cek == "Sudah") {
			$("#IDpraktikum").addClass('is-invalid');
			$(".invalidModul").html('Kelompok sudah mempunyai jadwal.');
			$("#submitJadwal").prop('disabled', true);
			$("#dateID").removeClass('is-invalid');
			$("#dateID").removeClass('is-valid');
			$("#dateID").html('');
		} else {
			$("#IDpraktikum").removeClass('is-invalid');
			$("#submitJadwal").prop('disabled', false);
			let cekjadwal = jadwal($("#IDpraktikum").val());
			if (cekjadwal == "Belum") {
				$("#dateID").addClass('is-invalid');
				$("#dateID").removeClass('is-valid');
				$(".invalidDate").html('Sesi belum tersedia.');
				$("#submitJadwal").prop('disabled', true);
				$("#dateID").html("");
			} else {
				$("#dateID").removeClass('is-invalid');
				$("#dateID").addClass('is-valid');
				$(".validDate").html('Sesi tersedia.');
				$("#submitJadwal").prop('disabled', false);

				let html = "";
				$.each(cekjadwal, function (i, data) {
					html += '<option value="' + data.dateID + '">' + data.ket + ' -  [ ' + data.date + ' ]</option>';
				});
				$("#dateID").html(html);
			}
		}
	});

	$("#IDpraktikum").on('change', function () {
		const modul = $(this).val();
		const kelompok = $("#kelompokID").val();
		let cek = cekjadwal(modul, kelompok);
		if (cek == "Sudah") {
			$("#IDpraktikum").addClass('is-invalid');
			$(".invalidModul").html('Kelompok sudah mempunyai jadwal.');
			$("#submitJadwal").prop('disabled', true);
			$("#dateID").removeClass('is-invalid');
			$("#dateID").removeClass('is-valid');
			$("#dateID").html('');
		} else {
			$("#IDpraktikum").removeClass('is-invalid');
			$("#submitJadwal").prop('disabled', false);
			let cekjadwal = jadwal($("#IDpraktikum").val());
			if (cekjadwal == "Belum") {
				$("#dateID").addClass('is-invalid');
				$("#dateID").removeClass('is-valid');
				$(".invalidDate").html('Sesi belum tersedia.');
				$("#submitJadwal").prop('disabled', true);
				$("#dateID").html("");
			} else {
				$("#dateID").removeClass('is-invalid');
				$("#dateID").addClass('is-valid');
				$(".validDate").html('Sesi tersedia.');
				$("#submitJadwal").prop('disabled', false);

				let html = "";
				$.each(cekjadwal, function (i, data) {
					html += '<option value="' + data.dateID + '">' + data.ket + ' -  [ ' + data.date + ' ]</option>';
				});
				$("#dateID").html(html);
			}
		}
	});

	$(".editJadwalKelompok").on('click', function () {
		$('#jadwalKelompokEditLabel').html('Edit Jadwal Kelompok');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + 'koordinator/editjadwalkelompok');
		$("#kelompokID").prop('disabled', true);
		$("#jadwalkelompokID").prop('disabled', false);
		$("#IDpraktikum").prop('disabled', true);
		$("#dateID").removeClass('is-invalid');
		$("#dateID").removeClass('is-valid');
		$("#IDpraktikum").removeClass('is-invalid');
		const id = $(this).data('id');

		$.ajax({
			url: base + 'koordinator/getdetailjadwalkelompok',
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			async: false,
			success: function (data) {
				let cekjadwal = jadwal(data.praktikumID);
				if (cekjadwal == "Belum") {
					$("#dateID").addClass('is-invalid');
					$("#dateID").removeClass('is-valid');
					$(".invalidDate").html('Sesi belum tersedia.');
					$("#submitJadwal").prop('disabled', true);
					$("#dateID").html("");
				} else {
					$("#dateID").removeClass('is-invalid');
					$("#dateID").addClass('is-valid');
					$(".validDate").html('Sesi tersedia.');
					$("#submitJadwal").prop('disabled', false);
					let html = "";
					$.each(cekjadwal, function (i, data) {
						html += '<option value="' + data.dateID + '">' + data.ket + ' -  [ ' + data.date + ' ]</option>';
					});
					$("#dateID").html(html);
				}
				$("#kelompokID").val(data.kelompokID);
				$("#jadwalkelompokID").val(id);
				$("#IDpraktikum").val(data.praktikumID);
				$("#dateID").val(data.dateID);
				$("#IDModul").val(data.praktikumID);
			}
		});
	});

	$(".tambahJadwalPraktikan").on('click', function () {
		$('#jadwalPraktikanLabel').html('Tambah Jadwal Praktikan');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', base + '/koordinator/addjadwalpraktikan');
		$("#modulPraktikanID").prop('disabled', false);
		$("#nrp").prop('disabled', false);
		$("#IDpraktikum").prop('disabled', false);
		cekpraktikan($("#kelompokPraktikanID").val());
		let cekjadwal = cekjadwalpraktikan($("#modulPraktikanID").val(), $("#nrp").val());
		if (cekjadwal == "Sudah") {
			$("#modulPraktikanID").addClass("is-invalid");
			$("#datePraktikanID").removeClass("is-invalid");
			$("#datePraktikanID").html("");
			$(".invalidModulPraktikan").html('Praktikan sudah mempunyai jadwal.')
			$("#submitPraktikan").prop('disabled', true);
		} else {
			let cek = jadwal($("#modulPraktikanID").val());
			if (cek == "Belum") {
				$("#datePraktikanID").addClass("is-invalid");
				$("#datePraktikanID").html("");
				$(".invalidDatePraktikan").html('Sesi belum tersedia.')
				$("#submitPraktikan").prop('disabled', true);
			} else {
				$("#modulPraktikanID").removeClass("is-invalid");
				$("#submitPraktikan").prop('disabled', false);

				let html = "";
				$.each(cek, function (i, data) {
					html += '<option value="' + data.dateID + '">' + data.ket + ' -  [ ' + data.date + ' ]</option>';
				});
				$("#datePraktikanID").html(html);
			}
		}
	});

	$(".editJadwalPraktikan").on('click', function () {
		$('#jadwalPraktikanLabel').html('Edit Jadwal Praktikan');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + 'koordinator/editjadwalpraktikan');
		$("#modulPraktikanID").prop('disabled', true);
		$("#kelompokPraktikanID").prop('disabled', true);
		$("#IDpraktikum").prop('disabled', true);
		$("#nrp").prop('disabled', true);
		$("#modulPraktikanID").removeClass('is-invalid');
		$(".invalidModulPraktikan").html('');

		const id = $(this).data('id');

		$.ajax({
			url: base + 'koordinator/getdetailjadwalpraktikan',
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#kelompokPraktikanID").val(data.kelompokID);
				$("#nrp").html('<option value="' + data.nrp + '">' + data.nrp + ' - ' + data.praktikan + '</option>');
				$("nrp").val(data.nrp);
				$("#modulPraktikanID").val(data.praktikumID);
				const j = jadwal(data.praktikumID);
				let html = "";
				$.each(j, function (i, data) {
					html += '<option value="' + data.dateID + '">' + data.ket + ' -  [ ' + data.date + ' ]</option>';
				});
				$("#datePraktikanID").html(html);
				$("#datePraktikanID").val(data.dateID);
				$("#keterangan").val(data.absen);
				$("#jadwalID").val(data.id);
			}
		});
	});

	$("#modulPraktikanID").on('change', function () {
		let cekjadwal = cekjadwalpraktikan($(this).val(), $("#nrp").val());
		if (cekjadwal == "Sudah") {
			$("#modulPraktikanID").addClass("is-invalid");
			$("#datePraktikanID").removeClass("is-invalid");
			$("#datePraktikanID").html("");
			$(".invalidModulPraktikan").html('Praktikan sudah mempunyai jadwal.')
			$("#submitPraktikan").prop('disabled', true);
		} else {
			$("#modulPraktikanID").removeClass("is-invalid");
			let cek = jadwal($("#modulPraktikanID").val());
			if (cek == "Belum") {
				$("#datePraktikanID").addClass("is-invalid");
				$("#datePraktikanID").html("");
				$(".invalidDatePraktikan").html('Sesi belum tersedia.')
				$("#submitPraktikan").prop('disabled', true);
			} else {
				$("#datePraktikanID").removeClass("is-invalid");
				$("#submitPraktikan").prop('disabled', false);

				let html = "";
				$.each(cek, function (i, data) {
					html += '<option value="' + data.dateID + '">' + data.ket + ' -  [ ' + data.date + ' ]</option>';
				});
				$("#datePraktikanID").html(html);
			}
		}
	});

	$("#kelompokID").on('change', function () {
		let cek = cekjadwal($("#IDpraktikum").val(), $(this).val());
		if (cek == "Sudah") {
			$("#IDpraktikum").addClass('is-invalid');
			$(".invalidModul").html('Kelompok sudah mempunyai jadwal.');
			$("#submitJadwal").prop('disabled', true);
			$("#dateID").removeClass('is-invalid');
			$("#dateID").removeClass('is-valid');
			$("#dateID").html('');
		} else {
			$("#IDpraktikum").removeClass('is-invalid');
			$("#submitJadwal").prop('disabled', false);
			let cekjadwal = jadwal($("#IDpraktikum").val());
			if (cekjadwal == "Belum") {
				$("#dateID").addClass('is-invalid');
				$("#dateID").removeClass('is-valid');
				$(".invalidDate").html('Sesi belum tersedia.');
				$("#submitJadwal").prop('disabled', true);
				$("#dateID").html("");
			} else {
				$("#dateID").removeClass('is-invalid');
				$("#dateID").addClass('is-valid');
				$(".validDate").html('Sesi tersedia.');
				$("#submitJadwal").prop('disabled', false);

				let html = "";
				$.each(cekjadwal, function (i, data) {
					html += '<option value="' + data.dateID + '">' + data.ket + ' -  [ ' + data.date + ' ]</option>';
				});
				$("#dateID").html(html);
			}
		}
	});

	$("#kelompokPraktikanID").on('change', function () {
		cekpraktikan($(this).val());
	});

	$(".editJaga").on('click', function () {
		$('#jagaEditLabel').html('Edit Jadwal Jaga Praktikum');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + '/koordinator/editjaga');
		const id = $(this).data('id');
		const modul = $(this).data('modul');
		const date = $(this).data('date');
		const ket = $(this).data('ket');
		$.ajax({
			url: base + 'koordinator/getdetailjaga',
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#modulID").val(modul);
				$("#jadwalSesi").val(date);
				$("#idSesi").val(id);
				$("#ketSesi").val(ket);
				if (data != "Tidak") {
					let html = "";
					$.each(data, function (i, data) {
						html += '<div class="form-row mt-2" id="asisten[' + i + ']">';
						html += '<div class="col-8 my-1 cekAsisten">';
						html += '<select class="form-control selectpicker asistenList" onchange="appendRadioValue(' + i + ')" data-live-search="true" id="nama[' + i + ']" name="asisten[' + i + ']" required></select>';
						html += '</div>';
						html += '<div class="col-auto my-1">';
						html += '<div class="form-check">';
						html += '<input class="form-check-input" type="radio" id="pj[' + i + ']" style="margin-top:12px;" name="pj" value="' + data.nrp + '" required ';
						if (data.pj == '1') {
							html += 'checked';
						}
						html += '>';
						html += '</div>';
						html += '</div>';
						html += '<div class="col my-1">';
						html += '<a href="#" class="btn btn-danger align-middle" onclick="hapusAsisten(' + i + ')"><i class="fas fa-trash-alt"></i></a>';
						html += '</div>';
						html += '</div>';
					});
					$("#asisten").html(html);
					$.ajax({
						url: base + 'koordinator/getlistasisten',
						method: "post",
						dataType: "json",
						async: false,
						success: function (data) {
							let html = "";
							$.each(data, function (i, data) {
								html += "<option data-tokens=" + data.nrp + " value=" + data.nrp + ">" + data.name + "</option>";
							});
							$(".asistenList").html(html);
						},
					});
					$.each(data, function (i, data) {
						$(document.getElementById("nama[" + i + "]")).val(data.nrp);
					});
					$(".selectpicker").selectpicker();
				}
			}
		});
	});

	$(".tambahFP").on('click', function () {
		$("#addFPLabel").html('Tambah Final Project');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', base + '/koordinator/addfp');
	});

	$(".editFP").on('click', function () {
		$("#addFPLabel").html('Edit Final Project');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action', base + '/koordinator/editfp');

		const id = $(this).data('id');
		$.ajax({
			url: base + 'koordinator/getdetailfp',
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#rangkaian").val(data.name);
				$("#id").val(data.id);
				$("#type").val(data.type);
				$("#input").val(data.input);
				$("#output").val(data.output);
				$("#selector").val(data.selector);
				$("#status").val(data.status);
				$("#enable").val(data.enable);
				$("#gate").val(data.gate);
			}
		});
	});

	listpraktikan = function () {
		let list = 0;
		$.ajax({
			url: base + 'koordinator/getallpraktikan',
			method: "post",
			dataType: "json",
			async: false,
			success: function (data) {
				list = data;
			}
		});
		return list;
	}

	listasisten = function () {
		let list = 0;
		$.ajax({
			url: base + 'koordinator/getallasisten',
			method: "post",
			dataType: "json",
			async: false,
			success: function (data) {
				list = data;
			}
		});
		return list;
	}

	cekanggota = function (id) {
		const target = document.getElementById("nrp[" + id + "]");
		const nrp = $(target).val();
		$.ajax({
			url: base + 'koordinator/getpraktikan',
			data: {
				nrp: nrp
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				const invalid = document.getElementById("invalid-feedback[" + id + "]");
				const valid = document.getElementById("valid-feedback[" + id + "]");
				if (data > 0) {
					$(invalid).attr('hidden', false);
					$(valid).attr('hidden', true);
					$(document.getElementById("submitKelompok")).prop('disabled', true);
				} else {
					$(invalid).attr('hidden', true);
					$(valid).attr('hidden', false);
					$(document.getElementById("submitKelompok")).prop('disabled', false);
				}
			}
		});
	}

	cekpraktikan = function (id) {
		$.ajax({
			url: base + 'koordinator/getdetailkelompok',
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			async: false,
			success: function (data) {
				let html = "";
				$.each(data, function (i, data) {
					html += '<option value="' + data.nrp + '">' + data.nrp + ' - ' + data.name + '</option>';
				})
				$("#nrp").html(html);
			}
		});
	}

	cekjadwalpraktikan = function (modul, nrp) {
		let result = false;
		$.ajax({
			url: base + 'koordinator/cekjadwalpraktikan',
			data: {
				modul: modul,
				nrp: nrp
			},
			method: "post",
			dataType: "json",
			async: false,
			success: function (data) {
				result = data;
			}
		});
		return result;
	}

	cekjadwal = function (modul, kelompok) {
		let result = false;
		$.ajax({
			url: base + 'koordinator/cekjadwalkelompok',
			data: {
				modul: modul,
				kelompok: kelompok
			},
			method: "post",
			dataType: "json",
			async: false,
			success: function (data) {
				result = data;
			}
		});
		return result;
	}

	jadwal = function (id) {
		let result = false;
		$.ajax({
			url: base + "koordinator/getlistjadwal",
			data: {
				modul: id
			},
			method: "post",
			dataType: "json",
			async: false,
			success: function (data) {
				result = data;
			}
		});
		return result;
	}

	appendRadioValue = function (id) {
		const target = document.getElementById("nama[" + id + "]");
		const radio = document.getElementById("pj[" + id + "]");
		$(radio).val($(target).val());
	}

	$('#addAsisten').on('click', function () {
		const jumlahasisten = $("#asisten .cekAsisten").length;
		let html = '';
		html += '<div class="form-row mt-2 " id="asisten[' + jumlahasisten + ']">';
		html += '<div class="col-8 my-1 cekAsisten">';
		html += '<select class="form-control selectpicker" onchange="appendRadioValue(' + jumlahasisten + ')" data-live-search="true" id="nama[' + jumlahasisten + ']" name="asisten[' + jumlahasisten + ']" required></select>';
		html += '<div class="valid-feedback feedback[' + jumlahasisten + ']"></div>';
		html += '<div class="invalid-feedback feedback[' + jumlahasisten + ']"></div>';
		html += '</div>';
		html += '<div class="col-auto my-1">';
		html += '<div class="form-check">';
		html += '<input class="form-check-input" type="radio" id="pj[' + jumlahasisten + ']" style="margin-top:12px;" name="pj" required>'
		html += '</div>';
		html += '</div>';
		html += '<div class="col">';
		html += '<a href="#" class="btn btn-danger align-middle" onclick="hapusAsisten(' + jumlahasisten + ')"><i class="fas fa-trash-alt"></i></a>';
		html += '</div>';
		html += '</div>';
		$("#asisten").append(html);
		$.ajax({
			url: base + 'koordinator/getlistasisten',
			method: "post",
			dataType: "json",
			success: function (data) {
				let html = "";
				html += "<option value=''></option>";
				$.each(data, function (i, data) {
					html += "<option value=" + data.nrp + ">" + data.name + "</option>";
				});
				const select = document.getElementById('nama[' + jumlahasisten + ']');
				$(select).html(html);
				const target = document.getElementsByClassName('selectpicker');
				$(target).selectpicker();
			},
		});
	});

});


$('#kelompokEdit').on('hidden.bs.modal', function () {
	$("#anggota").html("");
});

$("#jagaEdit").on('hidden.bs.modal', function () {
	$("#asisten").html("");
});

function hapus(id) {
	document.getElementById("anggota[" + id + "]").remove();
	let cek = document.getElementsByClassName("invalid");
	let ada = 0;
	$.each(cek, function (i, data) {
		if (!data.hasAttribute('hidden')) {
			ada = 1;
		}
	});
	if (ada == 0) {
		$(document.getElementById("submitKelompok")).prop('disabled', false);
	} else {
		$(document.getElementById("submitKelompok")).prop('disabled', true);
	}
}

function hapusAsisten(id) {
	document.getElementById("asisten[" + id + "]").remove();
}
