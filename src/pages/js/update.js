$(document).ready(function () {
  if ($.fn.DataTable.isDataTable('#dataTable')) {
      $('#dataTable').DataTable().clear().destroy();
  }

  const table = $('#dataTable').DataTable({
      ajax: {
          url: '../pages/control/get_courses.php?mode=datatable',
          dataSrc: 'data'
      },
      columns: [
          { data: 'id' },
          { data: 'name' },
          { data: 'level' },
          { data: 'price' },
          {
              data: null,
              render: function (data, type, row) {
                  return `<button class="btn btn-warning btn-sm edit-btn" data-id="${row.id}">Sửa</button>`;
              }
          }
      ]
  });

  $('#dataTable').on('click', '.edit-btn', function () {
      const rowData = table.row($(this).parents('tr')).data();

      if (!rowData) {
          alert('Không tìm thấy dữ liệu để sửa');
          return;
      }

      $('#id').val(rowData.id);
      $('#name').val(rowData.name);
      $('#level').val(rowData.level);
      $('#price').val(rowData.price);
      $('#img').val(rowData.img);
      $('#videoID').val(rowData.videoID);
      $('#description').val(rowData.description);
      $('#exp').val(rowData.exp);
  });

  $('#updateForm').on('submit', function (e) {
      e.preventDefault();

      const formData = {};
      const id = $('#id').val();
      if (!id) {
          alert('Vui lòng nhập ID!');
          return;
      }

      formData.id = id;
      if ($('#name').val()) formData.name = $('#name').val();
      if ($('#level').val()) formData.level = $('#level').val();
      if ($('#price').val()) formData.price = $('#price').val();
      if ($('#img').val()) formData.img = $('#img').val();
      if ($('#videoID').val()) formData.videoID = $('#videoID').val();
      if ($('#description').val()) formData.description = $('#description').val();
      if ($('#exp').val()) formData.exp = $('#exp').val();

      fetch('../pages/control/update_courses.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(formData)
      })
      .then(res => res.json())
      .then(data => {
          alert(data.message);
          if (data.success) location.reload();
      });
  });
});
