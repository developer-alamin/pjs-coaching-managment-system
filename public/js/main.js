$(document).ready(function(){
  $(".bx-menu").click(function() {
    $(".sitebar").toggleClass("hide");
  })
})

$(document).ready(()=>{
  $('#img').change(function(){
    const file = this.files[0];
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        console.log(event.target.result);
        $('.previewImg').attr('src',event.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
});


$(document).ready(()=>{
  $('#upimg').change(function(){
    const file = this.files[0];
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        console.log(event.target.result);
        $('.updatePreview').attr('src',event.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
});
