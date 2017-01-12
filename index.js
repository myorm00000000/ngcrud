function createProject(){
    var data = {
        action: 'create',
        projectName: $('#projectName').val(),
        directoryUrl: $('#directoryUrl').val(),
        dbName: $('#dbName').val(),
        dbUserName: $('#dbUserName').val(),
        dbPassword: $('#dbPassword').val(),
        dbPrefixTable: $('#dbPrefixTable').val()
    }
    swal({
        title:" ",
        text:" ",
        html:"<i class='fa fa-spinner fa-spin fa-fw fa-5x'></i>",
        showConfirmButton:false,
    })
    $.ajax({
        url:'create.php',
        method: 'post',
        data: data,
        success: function(response){
            location.href="done.php";
            swal.close();
        }
    })
}