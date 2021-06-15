<div class="main-content">
    <h1>Ứng dụng xem giờ hiện tại của các thành phố trên thế giới</h1>
    <label for="select-city"></label>
    <select name="" id="select-city">
        <option value="">Choose City</option>
        <option value="America-Chihuahua">Chihuahua, Mexico</option>
        <option value="America-Costa_Rica">Costa Rica</option>
        <option value="America-Havana">La Habana, Cuba</option>
        <option value="Asia-Hong_Kong">HongKong</option>
        <option value="Asia-Tokyo">Tokyo, Japan</option>
        <option value="Asia-Seoul">Seoul, Korea</option>

    </select>
</div>
<script>
    document.getElementById("select-city").onchange = function (){
        ChooseCity();
    };
    function ChooseCity(){
        let time_zone = document.getElementById("select-city");
        window.location.href=time_zone.value;
        //(window.location.href) = URL
    }
</script>
