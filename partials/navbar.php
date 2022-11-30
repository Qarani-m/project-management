<link rel="stylesheet" href="../css/dash.css">
<nav class="navbar" id = "navbar__"> 
        <ul>
            <div>
                <a href="dash.php"><li class="nav_item">Overview</li></a>
                <a id="t" href="upload.php"><li class="nav_item">Upload</li></a>
            </div>
            
            <a href="../inc/logout.php" class="logout"><li>logout</li></a>
        </ul>
</nav>
<style>
    #navbar__{
        transition:background 1s ease;
    }
</style>
<script>
    window.addEventListener("scroll",()=>{
        if(window.pageYOffset> 70){
            var ff= document.getElementById("navbar__")
            ff.style.background= "gainsboro"
        }
        if(window.pageYOffset<70){
var ff= document.getElementById("navbar__")
ff.style.background= "none"
}
    })
</script>
