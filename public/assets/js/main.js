<script type="text/javascript">
      var i = 0;
      $('#add').click(function () {
          ++i;
          $('#table').append('<tr><td><input type="text" name="inuts['+i+'][namaClub]" placeholder="Enter subject" class="form-control" /></td><td><input type="number" name="inuts['+i+'][skor]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-input-field">Delete</button></td></tr>');
      });

      $(document).on('click', '.remove-input-field', function () {
          $(this).parents('tr').remove();
      });
  </script>