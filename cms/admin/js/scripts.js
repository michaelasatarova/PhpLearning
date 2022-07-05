
$(document).ready(function() {
    $('#summernote').summernote({
        height:200
    });
  });


  $(document).ready(function(){

 
    $('#selectAllBoxes').click(function(event){
        if(this.checked){
            $('.checkBoxes').each(function(){
                this.checked = true;
            })
        }
        else{
            $('.checkBoxes').each(function(){
                this.checked = false;
            })
        }
    })

  })

  //Function CONFIRM DELETE
  function deleteConfirm(){
    return confirm("Are you sure you want to delete?");
}

