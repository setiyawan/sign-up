<?php include ('script/script.php');  ?>
<script>

    function goEdit(elem) {
       var id = elem.id;
        $.ajax({
            url: url + '/provinsi/detail/' + id,
            dataType: 'json',
            method: 'POST'
        }).success(function(response) {
            $.each(response.data[0], function(index, el) {
                $('#formUpdate')
                    .find('[name="' + index + '"]').val(el).end();
            });
        });
    }

    function goDelete(elem) {
       var id = elem.id;
       if (confirm("Apakah anda ingin menghapus data ini?") == true) {
            $.ajax({
                url: url + '/provinsi/delete/' + id,
                dataType: 'json',
                method: 'POST'
            }).success(function(response) {
                top.location.href="getall";
            });
        }
    }

</script>