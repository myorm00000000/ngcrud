$("#loadspin").hide();
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
    $("#loadspin").show();
    $.ajax({
        url:'create.php',
        method: 'post',
        data: data,
        success: function(response){
            window.open('done.php');
            $("#loadspin").hide();
        }
    })
}