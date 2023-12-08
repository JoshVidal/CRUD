



        // JavaScript para ajustar la posición de los cubos al desplazarse
        window.addEventListener('scroll', function () {
            const cubes = document.querySelectorAll('.cube');
            cubes.forEach((cube, index) => {
                const scrollPercentage = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
                const offset = (scrollPercentage + index * 300) % 100; // Ajusta el valor '15' para controlar la distancia entre los cubos
                cube.style.top = `${offset}vh`;
            });
        });




        const menuBtn = document.querySelector('.menu-btn');
        const navegacion = document.querySelector('.navegacion ul');

        menuBtn.addEventListener('click', () => {
            navegacion.classList.toggle('active');
            menuBtn.classList.toggle('active');
        });