const menuHamburger = document.querySelector(".checkbtn")
            const navLinks = document.querySelector(".menu")
     
            menuHamburger.addEventListener('click',()=>{
            navLinks.classList.toggle('mobile-menu')
            }
        );