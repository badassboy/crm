        $(document).ready(function(){

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

        });

        // creating an array-like based of child nodes on a specified class name
        var links = document.getElementsByClassName("test");

     //attach click handler to each
        for (var i = 0; i < links.length; i++) {
            links[i].onclick = toggleVisible;
        }

        function toggleVisible(){
                //hide currently shown item
               document.getElementsByClassName('show')[0].classList.remove('show');
               // getting info from custom data-target  set on the element
               var id = this.dataset.target;
               // showing div
               document.getElementById(id).classList.add('show');
        }

       

    var button = document.getElementById("upload");
    button.addEventListener("click", function(){

        online = window.navigator.onLine;


        if (navigator.onLine) {
          // console("onLine");
        } else {
          alert("offline");
        }


    });


   

    

    
