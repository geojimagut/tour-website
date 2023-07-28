if(document.readyState=='loading'){
    document.addEventListener('DOMContentLoaded',ready)
}else{
    ready()
}
function ready(){
    $('#tbl-application').DataTable();
    $('#pack-table').DataTable();
    $('#dest-table').DataTable();

    //displaying and hiding divs
    $('#btn-add-package').on('click',function(){
        var packtable=document.getElementById('pack-table-id');
        var package=document.getElementById('add-package-id');
        var btn=document.getElementById('btn-add-package');
        var toshow=document.getElementById('add-pack-btn')
        var tohide=document.getElementById('update-pack-btn')
        var btncancel=document.getElementById('btn-cancel-package');
        if(packtable.style.display='block'){
            packtable.style.display='none';
            package.style.display='flex';
            btn.style.display='none';
            btncancel.style.display='block';
            toshow.style.display='block'
            tohide.style.display='none'
        }
    })
    //canceling the package
    $('#btn-cancel-package').on('click',function(){
        var packtable=document.getElementById('pack-table-id');
        var package=document.getElementById('add-package-id');
        var btn=document.getElementById('btn-add-package');
        var btncancel=document.getElementById('btn-cancel-package');
        if(packtable.style.display='none'){
            packtable.style.display='flex';
            package.style.display='none';
            btn.style.display='block';
            btncancel.style.display='none';
            document.getElementById('dduration').style.display='block'
        document.getElementById('ttype').style.display='block'
        }
    })
    //displaying booking panel
    $('#button-book').on('click',function () {
        var toshow=document.getElementById('application-form')
        var tohide=document.getElementById('view-application')
        toshow.style.display='block'
        tohide.style.display='none'
    })
//hiding the booking panel
$('#button-cancel-book').on('click',function () {
    var toshow=document.getElementById('view-application')
        var tohide=document.getElementById('application-form')
        toshow.style.display='block'
        tohide.style.display='none'
})
    //displaying and hiding divs
    $('#btn-add-dest').on('click',function(){
        var packtable=document.getElementById('dest-table-id');
        var package=document.getElementById('add-dest-id');
        var btn=document.getElementById('btn-add-dest');
        var btncancel=document.getElementById('btn-cancel-dest');
        var toshow=document.getElementById('add-dest-btn')
        var files=document.getElementById('files')
        var label=document.getElementById('hidden-label')
        var tohide=document.getElementById('update-dest-btn')
        if(packtable.style.display='block'){
            packtable.style.display='none';
            package.style.display='block';
            btn.style.display='none';
            btncancel.style.display='block';
            toshow.style.display='block'
            files.style.display='block'
            label.style.display='block'
            tohide.style.display='none'

            //empty textfields
            document.getElementById('txttitle').value=""
            document.getElementById('txtprofile').value=""
            document.getElementById('txtattraction').value=""
            document.getElementById('txtactivity').value=""

        }
    })
//displaying and hiding divs
$('.btn-update-dest').on('click',function(){
    var packtable=document.getElementById('dest-table-id');
    var package=document.getElementById('add-dest-id');
    var btn=document.getElementById('add-dest-btn');
    var btnupdate=document.getElementById('update-dest-btn')
    var files=document.getElementById('files')
    var label=document.getElementById('hidden-label')
    var btncancel=document.getElementById('btn-cancel-dest');
    //displaying the data to be updated
    var row=$(this).closest('tr')
    var name=row.find('td:eq(0)').text().trim()
    var id=row.find('td:eq(3)').text().trim()
    var profile=row.find('td:eq(6)').text().trim()
    var attraction=row.find('td:eq(8)').text().trim()
    // var activity=row.find('td:eq(10)').text().trim()
    
    $('#destination_id').val(id)
    $('#txttitle').val(name)
    
    CKEDITOR.instances['txtprofile'].setData(profile)
    CKEDITOR.instances['txtattraction'].setData(attraction)
    // CKEDITOR.instances['txtactivity'].setData(activity)
    
    if(packtable.style.display='block'){
        packtable.style.display='none';
        package.style.display='block';
        btn.style.display='none';
        btncancel.style.display='block';
        files.style.display='none'
        label.style.display='none'
        btnupdate.style.display='block'
    }
})




    
    //canceling the package
    $('#btn-cancel-dest').on('click',function(){
        var packtable=document.getElementById('dest-table-id');
        var package=document.getElementById('add-dest-id');
        var btn=document.getElementById('btn-add-dest');
        var btncancel=document.getElementById('btn-cancel-dest');
        if(packtable.style.display='none'){
            packtable.style.display='block';
            package.style.display='none';
            btn.style.display='block';
            btncancel.style.display='none';
        }
    })

//adding included
$('#btnaddincluded').on('click',function () {
    var toshow=document.getElementById('show-inclusive')
    var tohide=document.getElementById('add-inclusive-panel')
    var btn=document.getElementById('addinclusive')
    var btna=document.getElementById('updateinclusive')
    toshow.style.display='none'
    tohide.style.display='block'
    btn.style.display='block'
    btna.style.display='none'
    $('#txtinclusive').val(" ")
})
$('#btncancelincluded').on('click',function () {
    var toshow=document.getElementById('show-inclusive')
    var tohide=document.getElementById('add-inclusive-panel')
    toshow.style.display='block'
    tohide.style.display='none'
})
//displaying the change slider div
$('#btn-add-slide').on('click',function(){
    var shownimage=document.getElementById('shown-image');
    var addslide=document.getElementById('new-slide');
    var show=document.getElementById('btn-add-slide');
    var inclusive=document.getElementById('btn-add-inclusive')
    var hide=document.getElementById('btn-cancel-add');
    if(shownimage.style.display='block'){
        shownimage.style.display='none';
        show.style.display='none';
        hide.style.display='block';
        addslide.style.display='block';
        inclusive.style.display='none'
    }
})
//adding images to destinations
$('.btn-add-img').on('click',function () {
    var hidden=document.getElementById('dest-img')
    var shown=document.getElementById('add-img-div')
    if(hidden.style.display='block'){
        hidden.style.display='none';
        shown.style.display='block';
    }
})

$('#btn-cancel-add').on('click',function(){
    location.href='website.php'
})
//adding package inclusives
$('#btn-add-inclusive').on('click',function(){
    var shownimage=document.getElementById('shown-image');
    var addslide=document.getElementById('new-slide');
    var show=document.getElementById('btn-add-slide');
    var inclusive=document.getElementById('btn-add-inclusive')
    var hide=document.getElementById('btn-cancel-add');
    var divinclusive=document.getElementById('inclusive')
    if(divinclusive.style.display='none'){
        shownimage.style.display='none';
        show.style.display='none';
        hide.style.display='none';
        addslide.style.display='none';
        inclusive.style.display='none'
        divinclusive.style.display='block'
    }
})
$('#btn-cancel-inclusive').on('click',function(){
    location.href='website.php'
})
//changing passwored
$('#changepass').on('click',function(){
    var side=document.getElementById('form-side');
    var btnchange=document.getElementById('changepass')
    var btncancel=document.getElementById('cancelchange')
    var email=$('#le-email').val()
    var username=$('#le-user').val()
    if(side.style.display='none'){
        side.style.display='block';
        btnchange.style.display='none'
        btncancel.style.display='block'
        document.getElementById('txtemail').value=email
        document.getElementById('txtusername').value=username;
    } 
  })
  $('#cancelchange').on('click',function(){
    var side=document.getElementById('form-side');
    var btnchange=document.getElementById('changepass')
    var btncancel=document.getElementById('cancelchange')
    if(side.style.display='block'){
        side.style.display='none';
        btnchange.style.display='block'
        btncancel.style.display='none'
    } 
  })
//displaying the images before upload
document.querySelector('#packit').addEventListener('change', (e)=>{
    if(window.File && window.FileReader && window.FileList && window.Blob){
        const files=e.target.files;
        const output=document.querySelector('#pack-image');
        for(let i=0; i<files.length; i++){
            if(!files[i].type.match("image"))continue;
            const picReader=new FileReader();
            picReader.addEventListener("load", function(event){
                const picFile=event.target;
                const div=document.createElement("div") ;
                div.innerHTML=`<img class="packimage" src="${picFile.result}" title="${picFile.name}"/>`;
                output.appendChild(div);
            })
            picReader.readAsDataURL(files[i]);
        }
    }else{
        alert('Your browser does not support the File API');
    }
})



    
    /*BACK TO TOP*/
mybutton=document.getElementById('btn-back-to-top');
window.onscroll = function () {
    scrollFunction();
  };
  
  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  // When the user clicks on the button, scroll to the top of the document
  mybutton.addEventListener("click", backToTop);
  
  function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
//end of function ready  
}
