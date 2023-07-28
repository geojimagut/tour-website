if(document.readyState=='loading'){
    document.addEventListener('DOMContentLoaded',ready)
}else{
    ready()
}
function ready(){

    //searching a destination
    $('#searchdest').on('change',function(){
        var ledata=$('#frmsearchdest').serialize()

        $.ajax({
        url:'searchdest.php',
        type:"POST",
        data:ledata,
        success:function(data){
            $('#dest-table-id').html(data)
        }
    })
    })
 //updating package
 $('.btn-update-package').on('click',function(){
    var packtable=document.getElementById('pack-table-id');
    var package=document.getElementById('add-package-id');
    var btn=document.getElementById('btn-add-package');
    var addpackagebtn=document.getElementById('add-pack-btn');
    var updatepackagebtn=document.getElementById('update-pack-btn');
    var btncancel=document.getElementById('btn-cancel-package');
    if(packtable.style.display='block'){
        packtable.style.display='none';
        package.style.display='flex';
        btn.style.display='none';
        addpackagebtn.style.display='none';
        updatepackagebtn.style.display='block';
        btncancel.style.display='block';
        document.getElementById('dduration').style.display='none'
        document.getElementById('ttype').style.display='none'

        var row=$(this).closest('tr');
        var rowone=row.find('td:eq(0)').text().trim();
        var rowtwo=row.find('td:eq(9)').text().trim();
        var rowthree=row.find('td:eq(2)').text().trim()
        var rowseven=row.find('td:eq(8)').text().trim()
        var txtpname=rowone;
        var txtpprice=rowtwo;
        var txtduration=rowthree;
        var activity=rowseven
        $('#txtpname').html(txtpname);
        $('#prevname').val(txtpname);
        $('#prevprice').val(txtpprice);
        $('#txtduration').val(txtduration);
        CKEDITOR.instances['txtactivity'].setData(activity)
    }
})
//updating applications
$('.btn-update-application').on('click',function(){
    var toshow=document.getElementById('application-form')
        var tohide=document.getElementById('view-application')
        var buttontoshow=document.getElementById('bookupdate')
        var buttontohide=document.getElementById('finalbook')
        toshow.style.display='block'
        tohide.style.display='none'
        buttontoshow.style.display='block'
        buttontohide.style.display='none'
        //get the details
        var row=$(this).closest('tr')
        var appid=row.find('td:eq(0)').text().trim()
    
        //$('#').html();
        $('#txtid').val(appid)
        $('#txtname').val($(this).closest('tr').find('.app_name').text().trim())
        $('#txtemail').val($(this).closest('tr').find('.app_email').text().trim())
        $('#txtphone').val($(this).closest('tr').find('.app_phone').text().trim())
        $('#txtpeople').val($(this).closest('tr').find('.app_people').text().trim())
        $('#txtfrom').val($(this).closest('tr').find('.app_day').text().trim())
        $('#txtcomment').val($(this).closest('tr').find('.app_comment').text().trim())
})
//updating inclusives
$('.btn-update-inclusive').on('click',function(){
   var row=$(this).closest('tr')
   var rowone=row.find('td:eq(0)').text().trim()
   var rowtwo=row.find('td:eq(1)').text().trim()
   $('#txtinclusive').val(rowtwo)
   $('#txtid').val(rowone)
   var btn=document.getElementById('updateinclusive')
   var btna=document.getElementById('addinclusive')
   var toshow=document.getElementById('show-inclusive')
    var tohide=document.getElementById('add-inclusive-panel')
    toshow.style.display='none'
    tohide.style.display='block'
    btn.style.display='block'
    btna.style.display='none'

})
//adding activities to the package
$('#addactivity').on('click',function(){
    var data=$('#frmactivity').serialize()+ '&addactivity = addactivity';
    var title=$('#txtaname').val()
    var text=$('#txtdayactivity').val()
    if(title==""){
        $('#activitymess').html('Please enter the day')
        setTimeout(function(){
            $('#activitymess').html(" ");
        }, 2000)
    }else if(text==""){
        $('#activitymess').html('Please enter the activity')
        setTimeout(function(){
            $('#activitymess').html(" ");
        }, 2000)
    }else{
        $.ajax({
        url:"addactivity.php",
        type:'POST',
        data:data,
        success:function(data){
            $('#activitymess').html(data)

            setTimeout(function(){
                $('#activitymess').html(" ");
                $('#txtaname').val(" ");
                $('#txtdayactivity').val(" ");
            }, 2000)
        }
    })
}
})
//deleting inclusive
$('.btn-delete-inclusive').on('click',function(){
    var row=$(this).closest('tr')
   var rowone=row.find('td:eq(0)').text().trim()
   var state=confirm('Delete?')
   if(state==true){
        $.ajax({
            url:'delinclusive.php',
            type:'POST',
            data:{rowone:rowone},
            success:function(data){
                location.href="website.php"
                $('#mess').html(data)
            }
        })
   }else{
    //do nothing
   }
})
//deleting application
$('.btn-delete-application').on('click',function(){
    var row=$(this).closest('tr')
    var leid=row.find('td:eq(0)').text().trim()
    var thedata=leid
    var state=confirm("Delete this application?")
    if(state==true){
        $.ajax({
            url:'delapplication.php',
            type:"POST",
            data:{thedata:thedata},
            success:function(data){
                location.href='application.php'
                $('#result').html(data)
            }
        })
    }else{
        //do nothing
    }
    
})


//deleting slider image
$('.btn-del-slide-img').on('click', function(){
  
    var row=$(this).closest('tr');
    var rowone=row.find('td:eq(0)').text().trim();
    var state=confirm('Delete this image?');
    if(state==true){

        $.ajax({
            url:'delslide.php',
            type:'POST',
            data:{rowone:rowone},
            success:function(data){
                location.href='website.php'
                $('#mess').html(data)
            }
            
        })
    }else{
        //do nothing
    }
    
})
//viewing more images
$('.button-more').on('click', function(){
    var row=$(this).closest('tr');
    var rowone=row.find('td:eq(3)').text().trim();
    var data=rowone;
    $.ajax({
        url:'view.php',
        type:'POST',
        data:{data:data},
        success:function(data){
            $('#dest-table-id').html(data)
        }
    })
})
//deleting destination images
$('.btn-del-dest-img').on('click',function(){
    var row=$(this).closest('tr')
    var id=row.find('td:eq(0)').text().trim()
    var state=confirm('Delete this image?')
    if(state==true){
        $.ajax({
            url:'deldestimage.php',
            type:'POST',
            data:{id:id},
            success:function(data){
                location.href="destination.php"
                $('#destresult').html(data)
            }
        })
    }
})
//viewing package images
$('.btn-pack-img').on('click', function(){
    var row=$(this).closest('tr');
    var rowone=row.find('td:eq(9)').text().trim();
    var data=rowone;
    $.ajax({
        url:'viewpackage.php',
        type:'POST',
        data:{data:data},
        success:function(data){
            $('#package-holder').html(data)
        }
    })
})
//search packages
$('#selpackage').on('change',function(){
var packagedata=$('#frmpackage').serialize() + '&selpackage = selpackage'
$.ajax({
    url:'handler.php',
    type:'POST',
    data:packagedata,
    success:function (data) {
        $('#pack-table-id').html(data)
    }
})
})
//view package details
$('.btn-view-package').on('click',function () {
    var row=$(this).closest('tr');
    var packageid=row.find('td:eq(9)').text().trim()

    $.ajax({
        url:'packagedetails.php',
        type:'POST',
        data:{packageid:packageid},
            success:function(data){
            $('#pack-table-id').html(data)
        }

    })

})



 //end of function ready   
}
   