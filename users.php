<?php 
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php include_once "php/header.php"?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>ChatSkoot</header>
            <?php 
            include_once "php/configfile.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
               $row = mysqli_fetch_assoc($sql);
            }
            
            ?>
            <div class="use-details">
            <div class="content">
                <img src="php/image/<?php echo $row['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname']?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </div>
            <a href="#" class="logout">Logout</a>
        </div>
              <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
              </div>
              <div class="users-list">
              <!--  -->
              </div>
        </section>
    </div>
    <script>
        const searchInput = document.querySelector(".users .search input"),
     searchBtn = document.querySelector(".users .search button"),
     userList = document.querySelector(".users .users-list");
      

 searchBtn.onclick = () => {
    searchInput.classList.toggle("active");
    searchInput.focus();
    searchBtn.classList.toggle("active");
    searchInput.value = "";
}


// search bar 
searchInput.onkeyup = () => {
     let searchTerm = searchInput.value;
     if(searchTerm != ""){
        searchInput.classList.add("active");
     }else{ //if search input is blank so it will remove acitve class and if it is not blank so it will be add active class and if it is not active then the setinterval ajax code is run.

        searchInput.classList.remove("active");
     }
     let xhr = new XMLHttpRequest(); //creating xml objeect
     xhr.open("POST", "php/search.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm); //send user search data to php file with ajax.
}


   setInterval(()=>{
     // ajax code - here we will get all responses or messegages
     let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("GET", "php/users.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchInput.classList.contains("active")){ //if active class is not contain then showing this data
                    userList.innerHTML = data;
                }
               
            }
        }
    }
    xhr.send();
   },500);//this function will run frequently after 500ms
    </script>
</body>
</html>