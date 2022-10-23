window.onload = function() {

    var jqueryfun;

    $(function() {
        $(".git_logo").mouseenter(function() {
            $(this).animate({
                width: "60px",
                height: "60px"
            });
        }).mouseleave(function() {
            $(this).animate({
                width: "50px",
                height: "50px"
            });
        });

        jqueryfun = function slide()
        {

if ( $(".error").is(":hidden") ) {
    $(".error").slideDown( "slow" );
  } 

  $(".error").click(function() {
    $(this).slideUp("slow");
  });

        }
    });

    function clear_result()
    {
    document.querySelector(".result").innerHTML = str = "";
    document.querySelector(".result").style.fontSize = "25px";
    }

    function alert_length()
    {
        jqueryfun();
        clear_result();
    }

    function new_line()
    {
        if(str.length > 19)
        {
            document.querySelector(".result").style.fontSize = "20px";
        }
        if(str.length > 25)
        {
            document.querySelector(".result").style.fontSize = "15px";
        }
        if(str.length >= 33)
        {
            alert_length();
        }
        console.log(str.length);
    }


    const clear = document.querySelector(".ce");
    const buttons = document.querySelectorAll(".number");
    const operations = document.querySelectorAll(".operation");
    const equal = document.querySelector(".equal");
    var str = "";
    var result;
  

        buttons.forEach(el =>{
            el.addEventListener("click", () =>{
           document.querySelector(".result").innerHTML = str+=el.value;
           new_line();
            });
        });

        operations.forEach(el =>{
            el.addEventListener("click", () =>{
                document.querySelector(".result").innerHTML = str+=el.value;
                new_line();
            });
        });

        clear.addEventListener("click", () =>{
            clear_result();
        });

        equal.addEventListener("click", () =>{
            if(str.includes("+") == true)
            {
                result = str.split("+");
                let parsed1 = parseFloat(result[0]);
                let parsed2 = parseFloat(result[1]);
                let equal = parsed1 + parsed2;
                document.querySelector(".result").innerHTML = equal;
            }
            if(str.includes("-") == true)
            {
                result = str.split("-");
                let parsed1 = parseFloat(result[0]);
                let parsed2 = parseFloat(result[1]);
                let equal = parsed1 - parsed2;
                document.querySelector(".result").innerHTML = equal;
            }
            if(str.includes("*") == true)
            {
                result = str.split("*");
                let parsed1 = parseFloat(result[0]);
                let parsed2 = parseFloat(result[1]);
                let equal = parsed1 * parsed2;
                document.querySelector(".result").innerHTML = equal;
            }
            if(str.includes("/") == true)
            {
                result = str.split("/");
                let parsed1 = parseFloat(result[0]);
                let parsed2 = parseFloat(result[1]);
                let equal = parsed1 / parsed2;
                document.querySelector(".result").innerHTML = equal;
            }
            if(str.includes("%") == true)
            {
                result = str.split("%");
                let parsed1 = parseFloat(result[0]);
                let parsed2 = parseFloat(result[1]);
                let equal = parsed1 % parsed2;
                document.querySelector(".result").innerHTML = equal;
            }
            new_line();
        });


            
}