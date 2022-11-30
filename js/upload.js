var send  = document.getElementById("submit_")
var file  = document.getElementById("file_upload")
var label  = document.getElementById("label")

dropArea  = document.getElementById("main")

// document.getElementById('profile_label').style.display='none';
//select a file from files
file.onchange= function (){
    var inp = this.files[0]
    if (inp){
        label.style.display= "none"
        send.style.display= "block"
        send.style.marginLeft= "27vw"
    }else{
        alert("Please chose a file to upload....")
    }
}
//drag and drop files



dropArea.addEventListener("dragover",(e)=>{
    e.preventDefault()
    dropArea.classList.add("dragover")
})


dropArea.addEventListener("dragleave",(e)=>{
    e.preventDefault()
    dropArea.classList.remove("dragover")
})

dropArea.addEventListener("drop",async(e)=>{
    e.preventDefault()
    var files = e.dataTransfer.files
    console.log("stage 1")

    if(files.length > 0){
        console.log("files")
       var fileArray = [...files]
        console.log(fileArray)
        var formData = new FormData()
        console.log("stage 2")
  
        fileArray.forEach(item=>{
            formData.append("${item.name}",item)
            fetch("http://kali.kali/pr2/inc/upload.php",{
                method:"post",
                body:formData
            }).then(res => res.json()).then(data => console.log(data)).catch(err=>console.log(err))
        })


        label.style.display= "none"
        send.style.display= "block"
        send.style.marginLeft= "27vw"
    }
})


